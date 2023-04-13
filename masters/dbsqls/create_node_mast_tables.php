<?php
$page_title= 'Create Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
    //Create table for Node type master//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `mast_nodtyp` (
        `ntpid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Node Type ID',
        `ntpnm` VARCHAR(30) NOT NULL COMMENT 'Node Type Name' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        PRIMARY KEY (`ntpid`),
        UNIQUE (`ntpnm`)
        )ENGINE = InnoDB COMMENT='Node Type Master';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Node Type master table created';
          }else{echo $qcrt1.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    $qins="INSERT INTO `mast_nodtyp` (`ntpid`, `ntpnm`, `crtby`, `crton`, 
                                                        `updby`, `updon`) 
                  VALUES (NULL, 'Office', 'PDAS', current_timestamp(), NULL, NULL),
                         (NULL, 'Factory', 'PDAS', current_timestamp(), NULL, NULL),
                         (NULL, 'Department', 'PDAS', current_timestamp(), NULL, NULL);";
    try {
        if(mysqli_query($con, $qins)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Node Type master data inserted';
            }else{echo $qins.'<br/>';
                die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
            }
    }catch(mysqli_sql_exception $e){
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    $qcrt2="CREATE TABLE  
    `mast_node` (
        `nodid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Node ID',
        `nodnm` VARCHAR(30) NOT NULL COMMENT 'Node Name' ,
        `ntpid` INT(5) NOT NULL COMMENT 'Node Type Id',
        `pndid` INT(5) NOT NULL COMMENT 'Parent Node Id',
        `descr` VARCHAR(50) DEFAULT NULL COMMENT 'Description',
        `addrs` VARCHAR(200) DEFAULT NULL COMMENT 'Address',
        `gstin` VARCHAR(25) DEFAULT NULL COMMENT 'GSTIN Details',
        `bnkdtl` VARCHAR(50) DEFAULT NULL COMMENT 'Bank Details',
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        PRIMARY KEY (`nodid`),
        FOREIGN KEY (`ntpid`) REFERENCES mast_nodtyp(`ntpid`)
        )ENGINE = InnoDB COMMENT='Node Master';";
    try {
        if(mysqli_query($con, $qcrt2)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Node master table created';
          }else{echo $qcrt2.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

}
//close the connection
mysqli_close($con);
?>
