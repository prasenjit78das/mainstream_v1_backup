<?php
$page_title= 'Create Menu Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  if(!$con){echo 'Connection error';}
  else{ //echo '<br>Found:'.$database_name.'<br>';
    //Create table for Menu master//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `n_mast_menu` (
      `menid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Menu ID',
      `mennm` VARCHAR(30) NOT NULL COMMENT 'Menu Name' ,
      `pnmid` INT(5) NOT NULL COMMENT 'Parent Menu ID' ,
      `aspnm` Varchar(100) NOT NULL COMMENT 'Associated Page Name' ,
      `fsusr` INT(5) NOT NULL COMMENT 'For Super User ?' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`menid`)
      )ENGINE = InnoDB COMMENT='Menu Master';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Menu master table created';
          }
          else{echo $qcrt1.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
  }
  ?>