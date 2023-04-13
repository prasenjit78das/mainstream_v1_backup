<?php
$page_title= 'Create User Table Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
    //Create table for user table//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `n_mast_user` (
        `user_id` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
        `user_nm` VARCHAR(30) NOT NULL COMMENT 'User Name' ,
        `user_pwd` VARCHAR(30) NOT NULL COMMENT 'User Password' ,
        `empid` INT(5) NOT NULL COMMENT 'Employee Id' ,
        `exprdt` DATE NOT NULL COMMENT 'Password Expiry Date' ,
        `dev1_id` VARCHAR(15) DEFAULT NULL COMMENT 'Device #1 ID (chkbid of old module)' ,
        `dev2_id` VARCHAR(15) DEFAULT NULL COMMENT 'Device #2 ID (chkbid of old module)' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted? N=NO Y=Yes',
        PRIMARY KEY (`user_id`),
        UNIQUE (`user_nm`),
        CONSTRAINT fk_empid FOREIGN KEY (`empid`) REFERENCES n_mast_emp(`empid`),
        UNIQUE KEY `unq_user_nm_empid` (`user_nm`,`empid`)
        )ENGINE = InnoDB COMMENT='User Masters';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>User table created';
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
