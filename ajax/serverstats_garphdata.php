<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
include '../includes/config.php'; 
include '../includes/custom_functions.php'; 
include '../includes/functions.php';
$date=$_REQUEST['date'];
$key=$_REQUEST['key'];
if($_REQUEST['search']!='')
    $sSQL="SELECT ifnull(sum($key),0) AS total_average_time FROM ce_callobject_stats WHERE DATE_FORMAT(created_at, '%Y-%c-%e')='".$date."' AND business_function_name like '%".get('search')."%'";
else    
    $sSQL="SELECT ifnull(sum($key),0) AS total_average_time FROM ce_callobject_stats WHERE DATE_FORMAT(created_at, '%Y-%c-%e')='".$date."'";
$result = sql($sSQL, $dbh); 
print_r($result[0]['total_average_time']);
exit;