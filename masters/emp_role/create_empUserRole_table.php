<?php
$page_title= 'Create Emp_User_Role Table Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
    //Create table for empUserRole table//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `n_mast_empUserRole` (
        `eurid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Emp_User_Role ID',
        `empid` INT(5) NOT NULL COMMENT 'Employee ID' ,
        `user_id` INT(5) NOT NULL COMMENT 'User ID' ,
        `rolid` INT(5) NOT NULL COMMENT 'Role ID' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        `isdel` char(1) NOT NULL DEFAULT 'N' COMMENT 'Deleted? N=NO Y=Yes',
        PRIMARY KEY (`eurid`),
        CONSTRAINT fkeur_empid FOREIGN KEY (`empid`) REFERENCES n_mast_emp(`empid`),
        CONSTRAINT fkeur_rolid FOREIGN KEY (`rolid`) REFERENCES n_mast_role_name(`rolid`),
        UNIQUE KEY `unq_role_empid` (`empid`,`rolid`)
        )ENGINE = InnoDB COMMENT='Emp_User_Role Masters';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Emp_User_Role table created';
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
