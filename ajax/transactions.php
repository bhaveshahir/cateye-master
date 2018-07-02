<?php
include '../includes/config.php';
include '../includes/functions.php';
include '../includes/custom_functions.php';

$sSQL = "SELECT *,timestart as timestart_raw,timestop as timestop_raw, (FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop,(timestop-timestart) as responsetime FROM ce_transactions where id=" . $_GET['id']. " order by timestart_raw asc";

$result = sql($sSQL, $dbh);
if (count($result) > 0) {
    ?>
    <!-- Inner Row -->
    <?php
    $row = array_shift($result);

    $depth=$row['depth']+1;
    $child_details=get_transaction_depth($row['msgid'], $row['pid'], $row['threadid'], $depth,$row['timestart_raw'],$row['timestop_raw']);    

    foreach ($child_details as $child_row) {
        $inputargs = parsejdeCallObject($child_row['inputargs']);
        
        ?>
        <tr class="collapsible_tr child_<?= $row['msgid'].'_'.$row['pid'].'_'.$row['threadid'].'_'.$depth ?> child_<?= $row['id']?> in" data-color="second-level" id="transaction_child_<?= $row['id'] ?>"> 
            <td colspan="5"></td>
            <td><?php //print_r($child_row);
           if($child_row['funcname'] == "DBRequest"){
				echo 'SQL';
            }elseif($child_row['funcname'] == "jdeCallObject"){
                
           	 echo $inputargs[0]['BSFN_Name'];
            }else{
            	echo $child_row['funcname'];
            }
             ?> [<a href="#detail_modal" data-toggle="modal" data-target="#detail_modal" onclick="detail_modal(<?=$child_row['id']?>)">Details</a>]</td>
            <td><?= $child_row['timestart'] ?></td>
            <td>
            <?php if($child_row['funcname'] <> "LogEntry"){?>
            <?= $child_row['responsetime'] ?>ms
            <?php } ?>
            </td>
            <td><?= $child_row['returnvalue'] ?>
		<?php if($child_row['funcname'] <> "LogEntry" ){?>
            <?php 
           // if($child_row['funcname'] <> "LogEntry" or $child_row['funcname'] <> "DBRequest"){
            $data = getChildRecords($child_row['msgid'], $child_row['pid'], $child_row['threadid'], ($depth+1),$child_row['timestart_raw'],$row['timestop_raw']);            
            if($data['count']>0){
            ?>
            <button id="collapse_btn_<?=$depth?>_<?=$child_row['id']?>" type="button" onclick="hideRows_1(this,<?=$row['id']?>,<?=$row['msgid']?>, <?=$row['pid']?>, <?=$row['threadid']?>,<?= $depth?>);collapse_subdetails1(this,<?=$row['id']?>,<?=$row['msgid']?>, <?=$row['pid']?>, <?=$row['threadid']?>,<?= $depth+1?>,'<?=$row['timestart_raw']?>','<?=$row['timestop_raw']?>');" class="btn btn-icon fa fa-plus collapse_btn_plus"></button>
            <?php } ?>
               <?php } 
               
              // }
              ?>
</td>
        </tr>        
    <?php } ?>    
    <!-- / Inner Row -->

<?php } ?>