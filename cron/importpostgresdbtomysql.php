<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo phpinfo();exit;
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../includes/config.php";
include "../includes/functions.php";

$hostname = "cateyesdb.chxn2rdubf0a.us-east-1.rds.amazonaws.com";
$username = "cateyes";
$password = "CatVisi0n2020";
$port="5432";
$dbname='cateyesdbdev';
$pg = new PDO("pgsql:host=$hostname;dbname=$dbname", $username, $password);


$maxtime = sql("select max(timestart) from ce_transactions",$dbh);
$maxtime = array_shift($maxtime);
$maxtime = array_shift($maxtime);
if($maxtime){
        $stmt = $pg->query('SELECT * from ce_transactions where timestart>'.$maxtime.' order by timestart asc limit 10000');
}else{
        $stmt = $pg->query('SELECT * from ce_transactions order by timestart asc limit 10000');

}
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
foreach ($row as $r){
	insert("ce_transactions",$r);
	echo "inserted upto ".$r['timestart']."<br>";
	flush_buffers();
}


$maxid = sql("select max(id) from ce_callobject_stats",$dbh);
$maxid = array_shift($maxid);
$maxid = array_shift($maxid);
if($maxid==""){$maxid = 0;}
$stmtce_callobject_stats = $pg->query('SELECT * from ce_callobject_stats where id>'.$maxid.' order by id asc limit 10000');
$rowce_callobject_stats = $stmtce_callobject_stats->fetchAll(PDO::FETCH_ASSOC);
        
foreach ($rowce_callobject_stats as $r){
	insert("ce_callobject_stats",$r);
	echo "inserted upto ".$r['id']."<br>";
	flush_buffers();
}


