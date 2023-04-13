<?php
$page_title= 'Drop Employee Master Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
      //Drop table 'Employee Master' ;
      $qemp="DROP TABLE `n_mast_emp`;";
        try {
            mysqli_query($con, $qemp);
            echo '<br>Employee master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }
        
      //Drop table 'Gender master' ;
      $qdgen="DROP TABLE `n_mast_gender`;";
        try {
          mysqli_query($con, $qdgen);
          echo '<br>Gender master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Marital master' ;
        $qdmrl="DROP TABLE `n_mast_marlsts`;";
        try {
          mysqli_query($con, $qdmrl);
          echo '<br>Marital master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Blood Group' ;
        $qbdl="DROP TABLE `n_mast_bdlgrp`;";
        try {
          mysqli_query($con, $qbdl);
          echo '<br>Blood Group master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'City Master' ;
        $qdcity="DROP TABLE `n_mast_city`;";
        try {
            mysqli_query($con, $qdcity);
            echo '<br>City master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'State Master' ;
        $qdstate="DROP TABLE `n_mast_state`;";
        try {
            mysqli_query($con, $qdstate);
            echo '<br>State master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Country Master' ;
        $qdcoun="DROP TABLE `n_mast_country`;";
        try {
            mysqli_query($con, $qdcoun);
            echo '<br>Country master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Grade Master' ;
        $qdgrade="DROP TABLE `n_mast_grade`;";
        try {
            mysqli_query($con, $qdgrade);
            echo '<br>Grade master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Type Master' ;
        $qdtype="DROP TABLE `n_mast_type`;";
        try {
            mysqli_query($con, $qdtype);
            echo '<br>Type master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Desk Master' ;
        $qddesk="DROP TABLE `n_mast_desk`;";
        try {
            mysqli_query($con, $qddesk);
            echo '<br>Desk master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Shift Master' ;
        $qdsh="DROP TABLE `n_mast_shift`;";
        try {
            mysqli_query($con, $qdsh);
            echo '<br>Shift master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }

        //Drop table 'Bank Master' ;
        $qbank="DROP TABLE `n_mast_bank`;";
        try {
            mysqli_query($con, $qbank);
            echo '<br>Bank master table dropped';
        }catch(mysqli_sql_exception $e){
            die('<br>Error-'.mysqli_error($con));
        }
    }
?>