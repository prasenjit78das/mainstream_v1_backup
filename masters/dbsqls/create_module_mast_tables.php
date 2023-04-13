<?php
$page_title= 'Create ROLE & Module Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  if(!$con){echo 'Connection error';}
  else{ //echo '<br>Found:'.$database_name.'<br>';
    //create module master table
    $qcrt2="CREATE TABLE  
    `n_mast_module` (
      `modid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Module ID',
      `modnm` VARCHAR(30) NOT NULL COMMENT 'Module Name' ,
      `isact` INT(1) NOT NULL DEFAULT 1 COMMENT 'Is Active' ,
      `fsusr` INT(1) NOT NULL DEFAULT 0 COMMENT 'For Super User ?' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`modid`),
      UNIQUE KEY (`modnm`)
      )ENGINE = InnoDB COMMENT='Module Master';";
    try {
        if(mysqli_query($con, $qcrt2)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Module master table created';
          }
          else{echo $qcrt2.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
    $qins="INSERT INTO `n_mast_module` 
                       (`modid`, `modnm`,`crtby`,`isact`, `fsusr`,  `crton`) 
                VALUES (NULL, 'CRM', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'P.D.B', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'P.Planner', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Production', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'D.R', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'D.C', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Purchase', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Letter No.', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Bank Book', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Asset Details', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'MOM', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'N.M.I', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'L.M.S', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Voucher', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'User', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Masters', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'DMS', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'H.R', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Calendar', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Contacts', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'Print(s)', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'S.I.T', 'PDAS',1, 0, current_timestamp()),
                       (NULL, 'IT C.R', 'PDAS',1, 0, current_timestamp());";
    try {
      if(mysqli_query($con, $qins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Module master data inserted';
      }
      else{echo $qins.'<br/>';
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
      }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    //Create table for Role master//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `n_mast_role` (
      `rolid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Role ID',
      `rolnm` VARCHAR(30) NOT NULL COMMENT 'Role Name' ,
      `nodid` INT(5) NOT NULL COMMENT 'Node ID' ,
      `modid` INT(5) NOT NULL COMMENT 'Module ID' ,
      `rptto` INT(5) NOT NULL COMMENT 'Report to Role Name' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`rolid`),
      FOREIGN KEY (`modid`) REFERENCES n_mast_module(modid),
      FOREIGN KEY (`nodid`) REFERENCES mast_node(nodid),
      UNIQUE `unq_rl`(`rolnm`,`nodid`,`modid`)
      )ENGINE = InnoDB COMMENT='Role Master';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Role master table created';
          }
          else{echo $qcrt1.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
  }
//close the connection
mysqli_close($con);
?>
