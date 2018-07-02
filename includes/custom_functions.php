<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_transaction_depth($msgid,$pid,$threadid,$depth,$timestart,$timestop)
{
    global $dbh;
    $sSQL = "SELECT *,timestart as timestart_raw, timestop as timestop_raw,(FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,from_unixtime(floor(timestop/1000), '%Y-%m-%d %h:%m:%s.%u') as timestop,(timestop-timestart) as responsetime FROM ce_transactions "
            . "where msgid=$msgid and pid=$pid and threadid=$threadid and depth=$depth "
            . "AND timestart >='$timestart' 
                    AND timestop<='$timestop'"
            . "  order by timestart asc";    
    $child_details = sql($sSQL, $dbh);
    return $child_details;
}


function getChildRecords($msgid,$pid,$threadid,$depth,$timestart,$timestop){
	global $dbh;
	$sSQL="SELECT *,timestart as timestart_raw, timestop as timestop_raw, (FROM_UNIXTIME(timestart * 0.001) + INTERVAL 4 HOUR) as timestart,from_unixtime(floor(timestop/1000), '%Y-%m-%d %h:%m:%s.%u') as timestop,(timestop-timestart) as responsetime  FROM ce_transactions where msgid = ".$msgid." AND pid = ".$pid." AND threadid = ".$threadid." AND DEPTH = ".$depth." and timestart >= ".$timestart." and timestop <= ".$timestop."  order by timestart asc";
	$data['data'] = sql($sSQL, $dbh);    
	$data['sql'] = $sSQL;
	$data['count'] = count($data['data']);
	echo "<!--".$sSQL."-->";
	return $data;
	
}

function parsejdeCallObject($data){

	$json_array=explode('}{',$data);
	if(isset($json_array[1]))
	{
		$d[0]=json_decode($json_array[0]."}",true);
    	$_alldata=json_decode("{".$json_array[1],true);    
    	$__alldata = explode(",",$_alldata['AllData']);
    	foreach ($__alldata as $v){
    		$_v = explode(":",$v);
    		if(is_array($_v)){
    			@$d[1]['alldata'][$_v[0]] = $_v[1];
    		}
    	}
	}else{
		$d[0]=json_decode($json_array[0],true);
	}
	return $d;
}