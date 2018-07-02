<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include "inc_core/head.php"; 
          include './includes/config.php'; 
          include './includes/custom_functions.php'; 
          include './includes/functions.php';     
          $sortby=" order by timestart desc ";
if(isset($_GET['sortby'])){
	$s = explode("~",$_GET['sortby']);
	$sortby = " order by ".$s[0]." ".$s[1].", timestart desc";
}
          if(isset($_GET['search']))
          {
              $search=$_GET['search'];
              $sSQL="SELECT *,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop,(timestop-timestart) as responsetime FROM ce_transactions where (depth=0 AND funcname!='DBRequest' AND funcname!='LogEntry')"
                      . " AND (funcname like '%$search%' OR msgid like '%$search%' OR pid like '%$search%' OR threadid like '%$search%' OR inputargs like '%$search%' OR userid like '%$search%') $sortby limit 500";
          }elseif(isset($_GET['msgid']))
          {
              $sSQL="SELECT *,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop,(timestop-timestart) as responsetime FROM ce_transactions where depth=0 and msgid = ".$_GET['msgid']." AND  pid = ".$_GET['pid']." AND  threadid = ".$_GET['threadid']." $sortby";
          }
          else{
              $sSQL="SELECT *,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop,(timestop-timestart) as responsetime FROM ce_transactions where depth=0 AND funcname!='DBRequest' AND funcname!='LogEntry' $sortby limit 500";
          }

          $result = sql($sSQL, $dbh);        
          


          function getApplicationID($msgid, $pid, $threadid){
          		global $dbh;

          		$data = sql("select * from ce_transactions where funcname = 'jdeCallObject' and depth = 1 and msgid=".$msgid." and pid=".$pid." and threadid=".$threadid." limit 1", $dbh);
          		$d = explode("}{",$data[0]['inputargs']);
          		$p = json_decode($d[0]."}", true );
          		return $p['CallingApplicationName'];
          }
          function getEnvironment($msgid, $pid, $threadid){
          		global $dbh;

              $data = sql("select * from ce_transactions where funcname = 'jdeCallObject' and depth = 1 and msgid=".$msgid." and pid=".$pid." and threadid=".$threadid." limit 1", $dbh);
          		$d = explode("}{",$data[0]['inputargs']);
          		$p = json_decode($d[0]."}", true );
              print_r($p);
          		return $p['Environment'];
          }
    ?>

    <title>CatEye</title>
    <?php  if(@$_GET['refresh']>0){ ?>
    <meta http-equiv="refresh" content="<?=$_GET['refresh']*60?>;URL='<?php echo $_SERVER['PHP_SELF']?>'">
    <?php } ?>
</head>

<body>

    <div class="dashboard-pages user-transactions-page">
        <?php include "inc_core/header.php"; ?>
        <div class="dashboard-body-wrapp clearfix">
            <?php include "inc_core/left_sidebar.php"; ?>
            <div class="dashboad-body">
                <div class="dashboard-body-functions clearfix">
                    <form method="get" class="pull-left">
                        <div class="search_box">
                            <label>Search/Filter:</label>
                            <input type="text" class="form-control" name="search" value="<?=@$_GET['search']?>">
                        </div>
                        <div class="time_period_box">
                            <label>Time Period:</label>
                            <div id="reportrange" class="form-control dates">
                                <i class="fa fa-calendar"></i><span></span><i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    </form>
                    <div class="btn-group pull-right refresh-btn">
                        <button type="button" class="btn btn-refresh">
                            <a href="./index.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                        </button>
                        <button type="button btn-default" class="btn dropdown-toggle btn-refresh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                          
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="./index.php">Manual</a></li>
                            <li><a href="./?refresh=5">Every 5 Minutes</a></li>
                            <li><a href="./?refresh=15">Every 15 Minutes</a></li>
                        </ul>
                    </div>

                </div>
                <div class="dashboard-body-main">
                    <div class="table-responsive">
                        <table class="table table-bordered table-gradient table_sorter">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><span>User ID</span> <a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='userid')? 'desc' : 'asc')?> <?=@$s[0]=='userid'?'active':''?>" href="/~cateyedashboard/?sortby=userid~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='userid')? 'DESC' : 'ASC')?>"></a></th>
                                    <th><span>Environment</span></th>
                                    <th><span>Application ID</span></th>
                                    <th><span>PID</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='pid')? 'desc' : 'asc')?> <?=@$s[0]=='pid'?'active':''?>" href="/~cateyedashboard/?sortby=pid~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='pid') ? 'DESC' : 'ASC')?>"></a></th>
                                    <th>Business Function</th>
                                    <th><span>Start</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='timestart')? 'desc' : 'asc')?> <?=@$s[0]=='timestart'?'active':''?>" href="/~cateyedashboard/?sortby=timestart~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='timestart') ? 'DESC' : 'ASC')?>"></a></th>
                                    <th><span>Response<br>Time</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='responsetime')? 'desc' : 'asc')?> <?=@$s[0]=='responsetime'?'active':''?>" href="/~cateyedashboard/?sortby=responsetime~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='responsetime') ? 'DESC' : 'ASC')?>"></a></th>
                                    <th><span>Return<br>Value</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='returnvalue')? 'desc' : 'asc')?> <?=@$s[0]=='returnvalue'?'active':''?>" href="/~cateyedashboard/?sortby=returnvalue~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='returnvalue') ? 'DESC' : 'ASC')?>"></a></th>
                                </tr>
                            </thead>
                            <?php foreach ($result as $row){ 
                                    $inputargs= json_decode($row['inputargs'], true );
                                    $d = parsejdeCallObject($row['inputargs']);       
                                    ?>
                            <tbody class="parent_row_<?=$row['id']?>">
                                <tr class="parent_<?=$row['id']?>">
                                    <td>
                                        <button type="button" id="collapse_btn_<?=$row['id']?>" onclick="hideRows(this,<?=$row['id']?>);collapse_subdetails(this,<?=$row['id']?>)" class="btn btn-icon fa fa-plus-circle collapse_btn"></button>
                                        <?php if($row['responsetime']>300){?>
                                        <img src="img/icons/alart-notifiction.png" width="15px" style="margin-left:8px">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?=$row['userid']?>
                                    </td>
                                    <td>
                                        <?=@$d[0]['Environment']?>
                                    </td>
                                    <td>
                                        <?php echo @getApplicationID($row['msgid'],$row['pid'],$row['threadid'])?>
                                        <?=@$inputargs['CallingApplicationName']?>
                                    </td>
                                    <td>
                                        <?=$row['pid']?>
                                    </td>
                                    <td>
                                        <?php 

                                        if(isset($d[0]['TopLevelBSFN'])){
                                        	echo $d[0]['TopLevelBSFN'];
                                        }elseif(@$d[0]['BSFN_Name']){
                                        	echo $d[0]['BSFN_Name'];
                                        }else{
                                        	echo $row['funcname'];
                                        }
                                        ?> [
                                        <a href="#detail_modal" data-toggle="modal" data-target="#detail_modal" onclick="detail_modal(<?=$row['id']?>)">Details</a>]</td>

                                    <td>
                                        <?php 
                                        
                                        echo $row['timestart'];
                                        
										?>
                                    </td>
                                    <td>
                                        <?=$row['responsetime']?>ms</td>
                                    <td>
                                        <?=$row['returnvalue']?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-header dashboard-footer">
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade transaction_detail_modal" id="detail_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Details</h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <?php include "inc_core/footer_scripts.php"; ?>


    <script type="text/javascript">
        function hideRows(select, id) {
            $elm = $(select).closest('.parent_' + id).nextAll('.child_' + id);
            $elm2 = $(select).closest('.parent_' + id).siblings('.parent_2_2').nextAll('.child_2_2');

            if ($elm.is(":hidden")) {
                $elm.addClass('in');
                $elm2.removeClass('in');
                if ($elm.children('td').children('.collapse_btn_info').hasClass('fa-minus')) {
                    $elm.children('td').children('.collapse_btn_info').removeClass('fa-minus');
                    $elm.children('td').children('.collapse_btn_info').addClass('fa-plus');
                }
            } else if ($elm.is(":visible")) {
                $elm.removeClass('in');
                $elm2.removeClass('in');
                if ($elm.children('.collapse_btn_info').hasClass('fa-minus')) {
                    $elm.children('.collapse_btn_info').removeClass('fa-minus');
                    $elm.children('.collapse_btn_info').addClass('fa-plus');
                }
            }

            $(select).toggleClass('fa-plus-circle fa-minus-circle')
        }

        function hideRows_1(select, msgid, pid, threadid, depth, timestart, timestop) {
            $elm2 = $(select).closest('.parent_1_1').nextAll('.child_1_1');

            if ($elm2.is(":hidden")) {
                $elm2.addClass('in');
            } else if ($elm2.is(":visible")) {
                $elm2.removeClass('in');
            }

            $(select).toggleClass('fa-plus fa-minus')
        }

        function hideRowsModal(select, id) {
            $elm = $(select).closest('.parent_' + id).nextAll('.child_' + id);
            if ($elm.is(":hidden")) {
                $elm.addClass('in');
            } else if ($elm.is(":visible")) {
                $elm.removeClass('in');
            }
            $(select).toggleClass('fa-plus fa-minus')
        }

    </script>
    <script type="text/javascript">
        function collapse_subdetails(select, id) {
            if (!document.getElementById("transaction_child_" + id)) {
                $selectTbody = $(select).closest('.parent_' + id).parent('tbody');
                $.post('ajax/transactions.php?id=' + id, function(data) {
                    $selectTbody.append(data);
                }).done(function() {
                    hideRows($('#collapse_btn_' + id));
                    $('#collapse_btn_' + id).toggleClass('fa-plus-circle fa-minus-circle')
                });
            }
        }

        function collapse_subdetails1(select, id, msgid, pid, threadid, depth, timestart, timestop) {
            $selectTbody = $(select).closest('.child_' + msgid + '_' + pid + '_' + threadid + '_' + (depth - 1)).parent('tbody');
            if (depth == 2)
                $selectTbody.addClass('danger');
            else if (depth == 3)
                $selectTbody.addClass('success');
            $.post('ajax/transactions_subchild.php?id=' + id + '&msgid=' + msgid + '&pid=' + pid + '&threadid=' + threadid + '&depth=' + depth + '&timestart=' + timestart + '&timestop=' + timestop, function(data) {
                $(data).insertAfter($(select).closest('tr'));
                // $selectTbody.append(data);                
            }).done(function() {
                //hideRows($('#collapse_btn_'+id));
                //$('#collapse_btn_'+id).toggleClass('fa-plus-circle fa-minus-circle')
            });

        }

    </script>
    <script type="text/javascript">
        function detail_modal(id) {
            console.log(id);
            //            $('#detail_modal').on('shown.bs.modal', function () {
            //            	console.log('ajax/transactions_details.php?id='+id);
            //                $('#detail_modal .modal-body').load('ajax/transactions_details.php?id='+id);
            //            })
            $.post("ajax/transactions_details.php?id=" + id, function(data, status) {
                $('#detail_modal .modal-body').html(data);
            });
        }

    </script>
</body>

</html>
