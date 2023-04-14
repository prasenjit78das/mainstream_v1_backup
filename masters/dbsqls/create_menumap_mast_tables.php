<?php
$page_title= 'Create Map Menus n Roles Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  if(!$con){echo 'Connection error';}
  else{ //echo '<br>Found:'.$database_name.'<br>';
    //Create table for Map Menus n Roles//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `n_mast_map_menu_role` (
      `rowid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'ID',
      `nodid` INT(5) NOT NULL COMMENT 'Node ID' ,
      `depid` INT(5) NOT NULL COMMENT 'Department ID' ,
      `modid` INT(5) NOT NULL COMMENT 'Module ID' ,
      `rolid` INT(5) NOT NULL COMMENT 'Role ID' ,
      `menid` INT(5) NOT NULL COMMENT 'Menu ID' ,
      `mennm` VARCHAR(30) NOT NULL COMMENT 'Menu Name' ,
      `pgacs` INT(1) NOT NULL DEFAULT 0 COMMENT 'Page Access ?' ,
      `adacs` INT(1) NOT NULL DEFAULT 0 COMMENT 'Add Access ?' ,
      `viacs` INT(1) NOT NULL DEFAULT 0 COMMENT 'View Access ?' ,
      `edacs` INT(1) NOT NULL DEFAULT 0 COMMENT 'Edit Access ?' ,
      `dlacs` INT(1) NOT NULL DEFAULT 0 COMMENT 'Delete Access ?' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`rowid`),
      FOREIGN KEY (`nodid`) REFERENCES mast_node(`nodid`),
      FOREIGN KEY (`depid`) REFERENCES mast_node(`nodid`),
      FOREIGN KEY (`modid`) REFERENCES n_mast_module(`modid`),
      FOREIGN KEY (`rolid`) REFERENCES n_mast_role_name(`rolid`),
      FOREIGN KEY (`menid`) REFERENCES n_mast_menu(`menid`)
      )ENGINE = InnoDB COMMENT='Map Menus n Roles';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>"n_mast_map_menu_role" table created';
          }
          else{echo $qcrt1.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
  }
  ?>