<!DOCTYPE html>
<html lang="en">
    <head>

        <?php
        include "inc_core/head.php";
        include './includes/config.php';
        include './includes/functions.php';
        ?>    

        <title>CatEye</title>
        <?php  if(@$_GET['refresh']>0){ ?>
        <meta http-equiv="refresh" content="<?=$_GET['refresh']*60?>;URL='<?php echo $_SERVER['PHP_SELF']?>'">
        <?php } ?>   
<?php

          $sortby=" order by timestart desc ";
if(isset($_GET['sortby'])){
	$s = explode("~",$_GET['sortby']);
	$sortby = " order by ".$s[0]." ".$s[1].", timestart desc";
}
?>
    </head>
    <body>

        <div class="dashboard-pages sql-page">
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
                                <a href="./database.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                            </button>
                            <button type="button btn-default" class="btn dropdown-toggle btn-refresh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>

                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="./database.php">Manual</a></li>
                                <li><a href="./database.php?refresh=5">Every 5 Minutes</a></li>
                                <li><a href="./database.php?refresh=15">Every 15 Minutes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dashboard-body-main">
                        <div class="table-responsive">                            
                            <table class="table table-bordered table-gradient log-errors-table table_sorter">
                                <thead>
                                    <tr>
                                        <th >SQL Query</th>
                                        <th><span>Timestamp</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='timestart')? 'desc' : 'asc')?> <?=@$s[0]=='timestart'?'active':''?>" href="/~cateyedashboard/database.php?sortby=timestart~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='timestart') ? 'DESC' : 'ASC')?>"></a></th>
                                        <th><span>Response Time</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='responsetime')? 'desc' : 'asc')?> <?=@$s[0]=='responsetime'?'active':''?>" href="/~cateyedashboard/database.php?sortby=responsetime~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='responsetime') ? 'DESC' : 'ASC')?>"></a></th>
                                        <th><span>Return</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='returnvalue')? 'desc' : 'asc')?> <?=@$s[0]=='returnvalue'?'active':''?>" href="/~cateyedashboard/database.php?sortby=returnvalue~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='returnvalue')? 'DESC' : 'ASC')?>"></a></th>                                        
                                        <th width="110">Go to <br>Transaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_GET['search']))
                                {
                                    $search=$_GET['search'];
                                    $sSQL="SELECT *,(timestop-timestart) as responsetime,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop FROM ce_transactions where funcname='DBRequest' "
                                            . " AND (funcname like '%$search%' OR msgid like '%$search%' OR pid like '%$search%' OR threadid like '%$search%' OR inputargs like '%$search%' OR userid like '%$search%') ".$sortby." limit 500";
                                }
                                else{
                                    $sSQL = "SELECT *,(timestop-timestart) as responsetime,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop FROM ce_transactions where funcname='DBRequest' ".$sortby." limit 500";
                                }
                                $result = sql($sSQL, $dbh);
                                if (count($result) > 0) {
                                    foreach ($result as $row) {
                                        $inputargs= json_decode($row['inputargs'], true);
                                        
                                        if($inputargs['SQLQuery']!=''){
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href="#detail_modal" data-toggle="modal" data-target="#detail_modal" onclick="detail_modal(<?=$row['id']?>)">
                                                        <code data-toggle='tooltip' title='<?=$inputargs['SQLQuery']?>' data-placement="bottom" >
                                                            <?=$inputargs['SQLQuery']?>
                                                        </code>
                                                    </a>
                                                </td>
                                                <td><?=$row['timestart']?></td>
                                                <td><?=$row['responsetime']?>ms</td>
                                                <td><?=$row['returnvalue']?></td>
                                            <td> <a href="index.php?msgid=<?=$row['msgid']?>&pid=<?=$row['pid']?>&threadid=<?=$row['threadid']?>"><i class="fa fa-share" aria-hidden="true"></i></a></td>
                                            </tr>                                          
                                        <?php }
                                         }
                                    } ?>
                                </tbody>
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
        function detail_modal(id)
        {            
        console.log(id);
//            $('#detail_modal').on('shown.bs.modal', function () {
//            	console.log('ajax/transactions_details.php?id='+id);
//                $('#detail_modal .modal-body').load('ajax/transactions_details.php?id='+id);
//            })
            $.post("ajax/transactions_details.php?id="+id, function(data, status){
                      $('#detail_modal .modal-body').html(data);
             });
        }
    </script>
    </body>
</html>

