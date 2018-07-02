<?php
include '../includes/config.php';
include '../includes/functions.php';
include '../includes/custom_functions.php';
?>
    <?php        
    $depth=$_REQUEST['depth'];
    $child_details=getChildRecords($_REQUEST['msgid'], $_REQUEST['pid'], $_REQUEST['threadid'], $depth,$_REQUEST['timestart'],$_REQUEST['timestop']);    
    foreach ($child_details['data'] as $row) {
    	$row['inputargs'] = explode("}{",$row['inputargs']);
        $inputargs = json_decode($row['inputargs'][0]."}", true);
        ?>
    <tr class="collapsible_tr child_<?= $row['msgid'].'_'.$row['pid'].'_'.$row['threadid'].'_'.$depth ?> child_<?= $_REQUEST['id']?> in" data-color="level<?=$depth?>" id="transaction_child_<?= $_REQUEST['id'] ?>">
        <td colspan="5"></td>
        <td>
            <?php 
            if($row['funcname'] == "jdeCallObject"){
            
            
           	 echo $inputargs['BSFN_Name'];
            }elseif($row['funcname'] == "DBRequest"){
            
            
           	 echo 'SQL';
            }
            else{
            
            
            echo $row['funcname'];
            }?> [
            <a href="#detail_modal" data-toggle="modal" data-target="#detail_modal" onclick="detail_modal(<?= $row['id'] ?>)">Details</a>]
        </td>

        <td>
            <?= $row['timestart'] ?>
        </td>
        <td>
            <?php if($row['funcname'] <> "LogEntry"){?>
            <?= $row['responsetime'] ?>ms
                <?php } ?>
        </td>
        <td>
            <?= $row['returnvalue'] ?>
                <?php if($row['funcname'] <> "LogEntry" ){?>
                <?php 
                      //  if($child_row['funcname'] <> "LogEntry" or $child_row['funcname'] <> "DBRequest"){
            $data = getChildRecords($row['msgid'], $row['pid'], $row['threadid'], ($depth+1),$row['timestart_raw'],$row['timestop_raw']);            
            if($data['count']>0){
            ?>
                <button id="collapse_btn_<?=$depth?>_<?=$row['id']?>" type="button" onclick="hideRows_1(this);collapse_subdetails1(this,<?=$_REQUEST['id']?>,<?=$_REQUEST['msgid']?>, <?=$_REQUEST['pid']?>, <?=$_REQUEST['threadid']?>,<?= $depth+1?>,'<?=$row['timestart_raw']?>','<?=$row['timestop_raw']?>');" class="btn btn-icon fa fa-plus collapse_btn_plus"></button>
                <?php } ?>
                <?php }
             //  }
                ?>
        </td>
    </tr>
    <?php } ?>
