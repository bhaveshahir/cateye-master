<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include "inc_core/head.php"; 
          include './includes/config.php';
          include './includes/functions.php';
    ?>    

    <title>CatEye</title>
    <?php  if(@$_GET['refresh']>0){ ?>
    <meta http-equiv="refresh" content="<?=$_GET['refresh']*60?>;URL='<?php echo $_SERVER['PHP_SELF']?>'">
    <?php } ?>   
<?php 

          $sortby=" order by msgid desc, timestart desc ";
if(isset($_GET['sortby'])){
	$s = explode("~",$_GET['sortby']);
	$sortby = " order by msgid desc,".$s[0]." ".$s[1].", timestart desc";
}
?>
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
                                <a href="./log-errors.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                            </button>
                            <button type="button btn-default" class="btn dropdown-toggle btn-refresh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>

                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="./log-errors.php">Manual</a></li>
                                <li><a href="./log-errors.php?refresh=5">Every 5 Minutes</a></li>
                                <li><a href="./log-errors.php?refresh=15">Every 15 Minutes</a></li>
                            </ul>
                    </div>
                </div>
                <div class="dashboard-body-main">
                    <div class="table-responsive">
                        <table class="table table-bordered table-gradient log-errors-table table_sorter">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><span>Log File</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='pid')? 'desc' : 'asc')?> <?=@$s[0]=='pid'?'active':''?>" href="/~cateyedashboard/log-errors.php?sortby=pid~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='pid') ? 'DESC' : 'ASC')?>"></a></th>
                                    <th><span>Timestamp</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='timestart')? 'desc' : 'asc')?> <?=@$s[0]=='timestart'?'active':''?>" href="/~cateyedashboard/log-errors.php?sortby=timestart~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='timestart')? 'DESC' : 'ASC')?>"></a></th>
                                    <th style=" width: 500px;">Log String</th>
                                    <th>Class</th>
                                    <th><span>User ID</span> <a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='userid')? 'desc' : 'asc')?> <?=@$s[0]=='userid'?'active':''?>" href="/~cateyedashboard/log-errors.php?sortby=userid~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='userid') ? 'DESC' : 'ASC')?>"></a></th>
                                    <!--<th><span>Msg ID</span><a class="sort_icon <?=((@$s[1] == 'ASC' && @$s[0]=='msgid')? 'desc' : 'asc')?> <?=@$s[0]=='msgid'?'active':''?>" href="/~cateyedashboard/log-errors.php?sortby=msgid~<?php echo ((@$s[1] == 'ASC' && @$s[0]=='msgid') ? 'DESC' : 'ASC')?>"></a></th>-->
                                    <th width="110">Go to <br>Transaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php

                                    if(isset($_GET['search']))
                                    {
                                        $search=$_GET['search'];   
                                        $sSQL = "SELECT *,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop FROM ce_transactions where funcname='LogEntry' "
                                                . " AND (funcname like '%$search%' OR msgid like '%$search%' OR pid like '%$search%' OR threadid like '%$search%' OR inputargs like '%$search%' OR userid like '%$search%') ".$sortby." limit 500";
                                    }
                                    else{
                                        $sSQL = "SELECT *,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,(FROM_UNIXTIME(timestop * 0.001) + INTERVAL 4 HOUR) as timestop FROM ce_transactions where funcname='LogEntry' ".$sortby." limit 500";
                                    }
                                    $result = sql($sSQL, $dbh);
                                    if (count($result) > 0) {
                                        foreach ($result as $row) {
                                            $inputargs= json_decode($row['inputargs']);                                            
                                        ?>
                                        <tr>
                                            <td><i class="fa fa-times-circle text-danger" aria-hidden="true"></i></td>
                                            <td>jde<?=($inputargs->FileType)?"debug":""?>_<?=$row['pid']?>.log</td>
                                            <td>
                                                                                    <?php                                         
                                       
                                        echo $row['timestart'];
                                        ?>
                                        </td>
                                            <td style=" word-break:  break-word;"><?=$inputargs->LogString?></td>
                                            <td><?=$inputargs->LogCategory?></td>
                                            <td><?=$row['userid']?></td>
                                            <!--<td><?=$row['msgid']?></td>-->
                                            <td> <a href="index.php?msgid=<?=$row['msgid']?>&pid=<?=$row['pid']?>&threadid=<?=$row['threadid']?>"><i class="fa fa-share" aria-hidden="true"></i></a></td>
                                        </tr>         
                                   <?php }
                                     }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
         <div class="dashboard-header dashboard-footer">
        </div>
    </div>

    
    <?php include "inc_core/footer_scripts.php"; ?> 
    

  </body>
</html>

                                