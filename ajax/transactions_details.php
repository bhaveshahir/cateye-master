<?php
include '../includes/config.php'; 
include '../includes/custom_functions.php'; 
include '../includes/functions.php';

$sSQL="SELECT *,timestart as timestart_raw,timestop as timestop_raw,(timestop-timestart) as responsetime,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop FROM ce_transactions where id=".$_GET['id']. " order by timestart_raw asc";
$result = sql($sSQL, $dbh); 
if(count($result)>0)
{    
$row=  array_shift($result);

function getRunBusinessFunctionInput($msgid,$pid,$threadid){
    global $dbh;
    $row = sql("select * from ce_transactions where funcname= 'runBusinessFunction' and msgid = '".$msgid."' and pid = '".$pid."' and threadid = '".$threadid."'");
    $row = array_shift($row);
    return json_decode($row['inputargs'],true);
}
    $runargs = array();
    if($row['depth']=="0"){
$runargs = getRunBusinessFunctionInput($row['msgid'],$row['pid'],$row['threadid']);        
    }

    
if($row['funcname']=="jdeCallObject"){
	$d = parsejdeCallObject($row['inputargs']);

	//old code
	$json_array=explode('}{',$row['inputargs']);
	if(isset($json_array[1]))
	{
		$inputargs=json_decode($json_array[0]."}",true);
    	$inputargs2=json_decode("{".$json_array[1],true);    
	}else{
		$inputargs=json_decode($json_array[0],true);
	}
}else{
	$inputargs=json_decode($row['inputargs'],true);
}
?>
    <div class="transactions_details">
        <div class="table-responsive">
            <table class="table table-bordered table-gradient">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>PID</th>
                        <th>Thread ID</th>
                        <th>
                            <?php if($row['funcname']=="jdeCallObject"){?> Object Name

                            <?php } ?>
                        </th>
                        <th>
                            <?php if($row['funcname']<>"LogEntry"){?> Response Time
                            <?php } ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?=$row['userid']?>
                        </td>
                        <td>
                            <?=$row['pid']?>
                        </td>
                        <td>
                            <?=@$inputargs['JDEThreadID']?>
                        </td>
                        <td>
                            <?php if($row['funcname']=="jdeCallObject"){?>
                            <b>ASK BETH FOR DATA</b>

                            <?php } ?>
                        </td>
                        <td>
                            <?php if($row['funcname']<>"LogEntry"){?>
                            <?=$row['responsetime']?>ms
                                <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table function_table space30 ">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th>Return Value</th>
                        <th>Start Time</th>
                        <th>Stop Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?if($row['funcname']=="jdeCallObject"){
                                    	echo $d[0]['BSFN_Name'];
                                    }else{
                                    	echo $row['funcname'];
                                    }?>
                        </td>
                        <td>
                            <?=$row['returnvalue']?>
                        </td>
                        <td>
                            <?=$row['timestart']?>
                        </td>
                        <td>
                            <?=$row['timestop']?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="arguments_wrapper row">
            <div class="col-md-3">
                <h3 class="arguments_title">Arguments</h3>
            </div>
            <div class="col-md-9">
                <table class="table table-bordered table-gradient in_argument_table">
                    <tbody>
                        <?php 
    $inputargs = array_merge($runargs,$inputargs);

    foreach ($inputargs as $key=>$value){
                                    if($key == 'JDEThreadID'){
                                    continue;
                                    }
                                     ?>
                        <tr class="parent_<?=$row['id']?>">
                            <td>
                                <?=$key?>:</td>
                            <td>
                                <?=$value?>
                            </td>
                        </tr>
                        <?php }?>
                        <?php if(count(@$inputargs2)>0){ ?>
                        <tr class="parent_<?=$row['id']?>">
                            <td>Data</td>
                            <td><button id="collapse_btn_modal" type="button" onclick="hideRowsModal(this,<?=$row['id']?>);" class="btn btn-icon fa fa-plus collapse_btn_plus_modal"></button></td>
                        </tr>
                        <?php 

$alldata = explode(",",$inputargs2['AllData']);
                                      foreach ($d[1]['alldata'] as $k=>$v){
                                       ?>
                        <tr class="collapsible_tr_modal child_<?=$row['id']?>">
                            <td>
                                <?php echo $k?>
                            </td>
                            <td>
                                <?php echo $v?>
                            </td>
                        </tr>
                        <?php } ?>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php } ?>
