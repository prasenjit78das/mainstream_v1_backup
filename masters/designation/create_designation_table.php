<?php
$page_title= 'Create Designation Table Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
    //Create table for designation table//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `n_mast_designation` (
        `desigid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Designation ID',
        `designm` VARCHAR(30) NOT NULL COMMENT 'Designation Name' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted? N=NO Y=Yes',
        PRIMARY KEY (`desigid`),
        UNIQUE (`designm`)
        )ENGINE = InnoDB COMMENT='Designation Master';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Designation table created';
          }else{echo $qcrt1.'<br/>';
          echo "<br/>Error-".mysqli_errno($con).mysqli_error($con);
          }
    }catch(mysqli_sql_exception $e){
        echo '<br>Error-'.mysqli_errno($con).mysqli_error($con);
    }
}
    //close the connection
mysqli_close($con);
?>
