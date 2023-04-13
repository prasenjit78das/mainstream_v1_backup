<?php
$page_title= 'Create Employee master Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  if(!$con){
    echo 'Connection error';
  }else{ //echo '<br>Found:'.$database_name.'<br>';
    //Create table for Gender master//IF NOT EXISTS
    $qcrt1="CREATE TABLE  
    `n_mast_gender` (
      `genid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Gender ID',
      `gennm` VARCHAR(30) NOT NULL COMMENT 'Gender Name' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`genid`)
      )ENGINE = InnoDB COMMENT='Gender Master';";
    try {
        if(mysqli_query($con, $qcrt1)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Gender master table created';
          }
          else{echo $qcrt1.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
 
//Gender DATA insert
  $qgenins="INSERT INTO `n_mast_gender` 
                       (`genid`, `gennm`,`crtby`,`crton`) 
                VALUES (NULL, 'Male', 'PDAS', current_timestamp()),
                       (NULL, 'Female', 'PDAS', current_timestamp()),
                       (NULL, 'Other', 'PDAS', current_timestamp());";
    try {
      if(mysqli_query($con, $qgenins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Gender master data inserted';
      }
      else{echo $qgenins.'<br/>';
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
      }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    //Create table for Marital Status master//IF NOT EXISTS
    $qcrt2="CREATE TABLE  
    `n_mast_marlsts` (
      `mlsid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Marital Status ID',
      `mlsnm` VARCHAR(30) NOT NULL COMMENT 'Marital Status Name' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`mlsid`)
      )ENGINE = InnoDB COMMENT='Marital Status Master';";
    try {
        if(mysqli_query($con, $qcrt2)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Marital Status master table created';
          }
          else{echo $qcrt2.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
 
    //Marital DATA insert
    $qmlsins="INSERT INTO `n_mast_marlsts` 
                       (`mlsid`, `mlsnm`,`crtby`,`crton`) 
                VALUES (NULL, 'Married', 'PDAS', current_timestamp()),
                       (NULL, 'Unmarried', 'PDAS', current_timestamp());";
    try {
      if(mysqli_query($con, $qmlsins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Marital master data inserted';
      }
      else{echo $qmlsins.'<br/>';
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
      }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

   //Create table for Blood group master//IF NOT EXISTS
    $qcrt3="CREATE TABLE  
    `n_mast_bdlgrp` (
      `blgid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Blood Group ID',
      `blgnm` VARCHAR(30) NOT NULL COMMENT 'Blood Group Name' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`blgid`)
      )ENGINE = InnoDB COMMENT='Blood Group Master';";
    try {
        if(mysqli_query($con, $qcrt3)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Blood group master table created';
          }
          else{echo $qcrt3.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
 
    //Blood Group DATA insert
    $qbldins="INSERT INTO `n_mast_bdlgrp` 
                       (`blgid`, `blgnm`,`crtby`,`crton`) 
                VALUES (NULL, 'A+', 'PDAS', current_timestamp()),
                       (NULL, 'A-', 'PDAS', current_timestamp()),
                       (NULL, 'B+', 'PDAS', current_timestamp()),
                       (NULL, 'B-', 'PDAS', current_timestamp()),
                       (NULL, 'O+', 'PDAS', current_timestamp()),
                       (NULL, 'O-', 'PDAS', current_timestamp()),
                       (NULL, 'AB+', 'PDAS', current_timestamp()),
                       (NULL, 'AB-', 'PDAS', current_timestamp());";
    try {
      if(mysqli_query($con, $qbldins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Blood Group data inserted';
      }
      else{echo $qbldins.'<br/>';
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
      }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
    
    //Create table for Country master//IF NOT EXISTS
    $qcntry="CREATE TABLE  
    `n_mast_country` (
      `cntid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Country ID',
      `cntnm` VARCHAR(30) NOT NULL COMMENT 'Country Name' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`cntid`)
      )ENGINE = InnoDB COMMENT='Country Master';";
    try {
        if(mysqli_query($con, $qcntry)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Country master table created';
          }
          else{echo $qcntry.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
 
    //Country DATA insert
    $qconins="INSERT INTO `n_mast_country` 
                       (`cntid`, `cntnm`, `crtby`,`crton`) 
                VALUES (NULL, 'India', 'PDAS', current_timestamp()),
                       (NULL, 'USA', 'PDAS', current_timestamp()),
                       (NULL, 'South Africa', 'PDAS', current_timestamp());";
    try {
      if(mysqli_query($con, $qconins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Country data inserted';
      }
      else{echo $qconins.'<br/>';
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
      }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    //Create table for State master//IF NOT EXISTS
    $qstate="CREATE TABLE  
    `n_mast_state` (
        `staid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'State ID',
        `stanm` VARCHAR(30) NOT NULL COMMENT 'State Name' ,
        `cntid` INT(5) NOT NULL COMMENT 'Country ID' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        PRIMARY KEY (`staid`),
        FOREIGN KEY (`cntid`) REFERENCES n_mast_country(`cntid`)
        )ENGINE = InnoDB COMMENT='State Master';";
    try {
        if(mysqli_query($con, $qstate)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>State master table created';
            }
            else{echo $qstate.'<br/>';
            echo "<br/>Error-".mysqli_errno($con).mysqli_error($con);
            }
    }catch(mysqli_sql_exception $e){
        echo '<br>Error-'.mysqli_errno($con).mysqli_error($con);
    }
    
    //State DATA insert
    $qstsins="INSERT INTO `n_mast_state` 
                        (`staid`,`stanm`,`cntid`,`crtby`,`crton`) 
                VALUES (NULL, 'Assam', 1, 'PDAS', current_timestamp()),
                        (NULL, 'Bihar', 1, 'PDAS', current_timestamp()),
                        (NULL, 'West Bengal', 1, 'PDAS', current_timestamp());";
    try {
        if(mysqli_query($con, $qstsins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>State data inserted';
        }
        else{echo $qstsins.'<br/>';
        echo "<br/>Error-".mysqli_errno($con).mysqli_error($con);
        }
    }catch(mysqli_sql_exception $e){
        echo '<br>Error-'.mysqli_errno($con).mysqli_error($con);
    }

    //Create table for City master//IF NOT EXISTS
    $qcty="CREATE TABLE  
    `n_mast_city` (
      `ctyid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'City ID',
      `ctynm` VARCHAR(30) NOT NULL COMMENT 'City Name' ,
      `cntid` INT(5) NOT NULL COMMENT 'Country ID' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`ctyid`),
      FOREIGN KEY (`cntid`) REFERENCES n_mast_country(`cntid`)
      )ENGINE = InnoDB COMMENT='City Master';";
    try {
        if(mysqli_query($con, $qcty)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>City master table created';
          }
          else{echo $qcty.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
 
    //City DATA insert
    $qctyins="INSERT INTO `n_mast_city` 
                       (`ctyid`, `ctynm`, `cntid`, `crtby`,`crton`) 
                VALUES (NULL, 'Delhi', 1, 'PDAS', current_timestamp()),
                       (NULL, 'Kolkata', 1, 'PDAS', current_timestamp()),
                       (NULL, 'Mumbai', 1, 'PDAS', current_timestamp()),
                       (NULL, 'Chennai', 1, 'PDAS', current_timestamp());";
    try {
      if(mysqli_query($con, $qctyins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>City data inserted';
      }
      else{echo $qctyins.'<br/>';
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
      }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    
    //Create table for Grade master//IF NOT EXISTS
    $qgrd="CREATE TABLE  
    `n_mast_grade` (
      `grdid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Grade ID',
      `grdnm` VARCHAR(30) NOT NULL COMMENT 'Grade Name' ,
      `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
      `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
      `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
      `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
      PRIMARY KEY (`grdid`)
      )ENGINE = InnoDB COMMENT='Grade Master';";
    try {
        if(mysqli_query($con, $qgrd)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Grade master table created';
          }
          else{echo $qgrd.'<br/>';
            die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
          }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
 
    //Grade DATA insert
    $qgrdins="INSERT INTO `n_mast_grade` 
                       (`grdid`,`grdnm`,`crtby`,`crton`) 
                VALUES (NULL, 'H', 'PDAS', current_timestamp()),
                       (NULL, 'M3', 'PDAS', current_timestamp()),
                       (NULL, 'M2', 'PDAS', current_timestamp()),
                       (NULL, 'M1', 'PDAS', current_timestamp()),
                       (NULL, 'L1', 'PDAS', current_timestamp()),
                       (NULL, 'L2', 'PDAS',current_timestamp());";
    try {
      if(mysqli_query($con, $qgrdins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Grade data inserted';
      }
      else{echo $qgrdins.'<br/>';
        die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
      }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    //Create table for Type master//IF NOT EXISTS
    $qtyp="CREATE TABLE  
    `n_mast_type` (
        `typid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Type ID',
        `typnm` VARCHAR(30) NOT NULL COMMENT 'Type Name' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        PRIMARY KEY (`typid`)
        )ENGINE = InnoDB COMMENT='Type Master';";
    try {
        if(mysqli_query($con, $qtyp)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Type master table created';
            }
            else{echo $qtyp.'<br/>';
              die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
            }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
    
    //Type DATA insert
    $qtypins="INSERT INTO `n_mast_type` 
                        (`typid`,`typnm`,`crtby`,`crton`) 
                VALUES (NULL, 'Provisional', 'PDAS', current_timestamp()),
                       (NULL, 'Permanent', 'PDAS', current_timestamp());";
    try {
        if(mysqli_query($con, $qtypins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Type data inserted';
        }
        else{echo $qtypins.'<br/>';
          die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
        }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    //Create table for Desk master//IF NOT EXISTS
    $qdesk="CREATE TABLE  
    `n_mast_desk` (
        `dskid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Desk ID',
        `dsknm` VARCHAR(50) NOT NULL COMMENT 'Desk Name' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        PRIMARY KEY (`dskid`)
        )ENGINE = InnoDB COMMENT='Desk Master';";
    try {
        if(mysqli_query($con, $qdesk)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Desk master table created';
            }
            else{echo $qdesk.'<br/>';
              die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
            }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
    
    //Desk DATA insert
    $qdeskins="INSERT INTO `n_mast_desk` 
                        (`dskid`,`dsknm`,`crtby`,`crton`) 
                VALUES (NULL, 'D1', 'PDAS', current_timestamp()),
                       (NULL, 'D2', 'PDAS', current_timestamp());";
    try {
        if(mysqli_query($con, $qdeskins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Desk data inserted';
        }
        else{echo $qdeskins.'<br/>';
          die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
        }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }

    //Create table for Shift master//IF NOT EXISTS
    $qshft="CREATE TABLE  
    `n_mast_shift` (
        `sftid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Shift ID',
        `sftnm` VARCHAR(30) NOT NULL COMMENT 'Shift Name' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        PRIMARY KEY (`sftid`)
        )ENGINE = InnoDB COMMENT='Shift Master';";
    try {
        if(mysqli_query($con, $qshft)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Shift master table created';
            }
            else{echo $qshft.'<br/>';
              die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
            }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
    
    //Shift DATA insert
    $qsftins="INSERT INTO `n_mast_shift` 
                        (`sftid`,`sftnm`,`crtby`,`crton`) 
                VALUES (NULL, 'Day', 'PDAS', current_timestamp()),
                        (NULL, 'Night', 'PDAS', current_timestamp());";
    try {
        if(mysqli_query($con, $qsftins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Shift data inserted';
        }
        else{echo $qsftins.'<br/>';
          die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
        }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
    
    //Create table for Bank master//IF NOT EXISTS
    $qbank="CREATE TABLE  
    `n_mast_bank` (
        `bnkid` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Bank ID',
        `bnknm` VARCHAR(30) NOT NULL COMMENT 'Bank Name' ,
        `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
        `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
        `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
        `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
        PRIMARY KEY (`bnkid`)
        )ENGINE = InnoDB COMMENT='Bank Master';";
    try {
        if(mysqli_query($con, $qbank)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Bank master table created';
            }
            else{echo $qbank.'<br/>';
              die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
            }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
    
    //Bank DATA insert
    $qbankins="INSERT INTO `n_mast_bank` 
                        (`bnkid`,`bnknm`,`crtby`,`crton`) 
                VALUES (NULL, 'HDFC', 'PDAS', current_timestamp()),
                       (NULL, 'ICICI', 'PDAS', current_timestamp());";
    try {
        if(mysqli_query($con, $qbankins)){
        //echo '<br/>'.$q1.'<br/>';
        echo '<br>Bank data inserted';
        }
        else{echo $qbankins.'<br/>';
          die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
        }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
        
    //Create table for Employee master//IF NOT EXISTS
    $qemp="CREATE TABLE  
    `n_mast_emp` (
    `empid`	Int(5)	NOT NULL AUTO_INCREMENT COMMENT 'Bank ID',
    `ftnam`	Varchar(50)	NOT NULL COMMENT 'First Name',
    `mdnam`	Varchar(50)	DEFAULT NULL COMMENT 'Middle Name',
    `ltnam`	Varchar(50)	DEFAULT NULL COMMENT 'Last name',
    `genid`	Int(1) NOT NULL COMMENT 'Gender ID',
    `dob`	  Date NOT NULL COMMENT 'Date of Birth',
    `mlsid`	Int(1) NOT NULL COMMENT 'Marital Status',
    `blgid`	Int(1) 	DEFAULT NULL COMMENT 'Blood Group',
    `pemail`Varchar(50)	DEFAULT NULL COMMENT 'Personal Email ID',
    `prcont`Varchar(12)	DEFAULT NULL COMMENT 'Personal Contact Number',
    `phlnk`	Varchar(80)	DEFAULT NULL COMMENT 'Photo upload Link',
    `pnnum`	Varchar(12)	DEFAULT NULL COMMENT 'PAN Number',
    `pndlnk`Varchar(80)	DEFAULT NULL COMMENT 'PAN Document Link',
    `adnum`	Varchar(12)	DEFAULT NULL COMMENT 'Aadhar Number',
    `addlnk`Varchar(80)	DEFAULT NULL COMMENT 'Aadhar Document Link',
    `ppnum`	Varchar(12)	DEFAULT NULL COMMENT 'Passport Number',
    `ppdlnk`Varchar(80)	DEFAULT NULL COMMENT 'Passport Document Link',
    `cadd1`	Varchar(50)	DEFAULT NULL COMMENT 'Current address line1',
    `cadd2`	Varchar(50)	DEFAULT NULL COMMENT 'Current address line2',
    `ctown`	Int(5) 	DEFAULT NULL COMMENT 'City/Town/Village(Current address)',
    `cpncd`	Varchar(10)	DEFAULT NULL COMMENT 'Pin Code (Current address)',
    `cstt`	Int(5)	DEFAULT NULL COMMENT 'State (Current Address)',
    `ccntr`	Int(5)	DEFAULT NULL COMMENT 'Country (Current Address)',
    `padd1`	Varchar(50)	DEFAULT NULL COMMENT 'Permanent address line1',
    `padd2`	Varchar(50)	DEFAULT NULL COMMENT 'Permanent address line2',
    `ptown`	Int(5)	DEFAULT NULL COMMENT 'City/Town/Village(Permanent address)',
    `ppncd`	Int(10)	DEFAULT NULL COMMENT 'Pin Code (Permanent address)',
    `pstt`	Int(5)	DEFAULT NULL COMMENT 'State (Permanent Address)',
    `pcntr`	Int(5)	DEFAULT NULL COMMENT 'Country (Permanent Address)',
    `fanam`	Varchar(50)	DEFAULT NULL COMMENT 'Father Name',
    `nxfkin`Varchar(50)	DEFAULT NULL COMMENT 'Next to Kin',
    `facont`Varchar(15)	DEFAULT NULL COMMENT 'Contact Number of Next to Kin',
    `dofjn`	Date NOT NULL COMMENT 'Date of Joining',
    `dsgid`	Int(1) DEFAULT NULL COMMENT 'Designation',
    `oemail`Varchar(50)	DEFAULT NULL COMMENT 'Email ID',
    `grdid`	Int(1) NOT NULL COMMENT 'Grade',
    `dptid`	Int(1) DEFAULT NULL COMMENT 'Department',
    `ofcont`Varchar(12)	DEFAULT NULL COMMENT 'Contact Number official',
    `typid`	Int(1) NOT NULL COMMENT 'Type',
    `rpmng`	Int(1) DEFAULT NULL COMMENT 'Reporting Manager',
    `dskid`	Int(1) DEFAULT NULL COMMENT 'Desk',
    `sftid`	Int(1) DEFAULT NULL COMMENT 'Shift',
    `vacci`	Int(1) DEFAULT NULL COMMENT 'Vaccination',
    `esino`	Varchar(25)	DEFAULT NULL COMMENT 'ESINo',
    `epfno`	Varchar(25)	DEFAULT NULL COMMENT 'EPFNo',
    `bnkid`	Int(1) DEFAULT NULL COMMENT 'Bank',
    `pfnum`	Varchar(25)	DEFAULT NULL COMMENT 'PF no',
    `insap`	Int(1) DEFAULT NULL COMMENT 'Insurance Applicable',
    `mdlno`	Varchar(30)	DEFAULT NULL COMMENT 'Mediclame Number',
    `apsts`	Int(1) DEFAULT NULL COMMENT 'Approval Status',
    `stats`	Int(1) DEFAULT NULL COMMENT 'Status',
    `cdnrs`	Varchar(100) DEFAULT NULL COMMENT 'Checking Denial Reason',
    `adnrs`	Varchar(100) DEFAULT NULL COMMENT 'Approval Denial Reason',
    `otdoc`	Varchar(100) DEFAULT NULL COMMENT 'Certificates & Other Documents upload Link',
    `isdel`	Int(1) DEFAULT NULL COMMENT 'Active or Deleted',
    `crtby` VARCHAR(5) NOT NULL COMMENT 'Created By',
    `crton` DATETIME NOT NULL DEFAULT current_timestamp() COMMENT 'Created On',
    `updby` VARCHAR(5) DEFAULT NULL COMMENT 'Updated By',
    `updon` VARCHAR(50) DEFAULT NULL COMMENT 'Updated On',
    PRIMARY KEY (`empid`),
    CONSTRAINT fk_genid FOREIGN KEY (`genid`) REFERENCES n_mast_gender(`genid`),
    CONSTRAINT fk_mlsid FOREIGN KEY (`mlsid`) REFERENCES n_mast_marlsts(`mlsid`),
    CONSTRAINT fk_grdid FOREIGN KEY (`grdid`) REFERENCES n_mast_grade(`grdid`),
    CONSTRAINT fk_typid FOREIGN KEY (`typid`) REFERENCES n_mast_type(`typid`)
        )ENGINE = InnoDB COMMENT='Employee Master';";
    try {
        if(mysqli_query($con, $qemp)){
            //echo '<br/>'.$q1.'<br/>';
            echo '<br>Employee master table created';
            }
            else{echo $qemp.'<br/>';
              die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
            }
    }catch(mysqli_sql_exception $e){
      die("<br/>Error-".mysqli_errno($con).mysqli_error($con));
    }
 }
  ?>