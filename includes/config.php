<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($_SERVER['HTTP_HOST'] == 'cateye.local'){
	$mysql_username = "root";
	$mysql_password = "123";
	$mysql_name = "cateyedashboard_db";
	$mysql_host = "127.0.0.1";        
}elseif ($_SERVER['HTTP_HOST'] == '127.0.0.1'){
 	$mysql_username = "root";
	$mysql_password = "123";
	$mysql_name = "cateyedashboard_db";
	$mysql_host = "127.0.0.1";         // changed by sawan, as server IP is now chnaged
}
else {        
 	$mysql_username = "root";
	$mysql_password = "123";
	$mysql_name = "cateyedashboard_db";
	$mysql_host = "127.0.0.1";         // changed by sawan, as server IP is now chnaged
}
$dbh=mysql_connect($mysql_host, $mysql_username, $mysql_password) or die ('You need to set your database connection in includes/db.php.');
mysql_select_db($mysql_name) or die ('You need to set your database connection in includes/db.php.');
