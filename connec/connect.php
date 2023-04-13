<?php
// Connect to database
$urc=false;
if(isset($_SESSION['tb3'])){$urc=$_SESSION['tb3'];}else{$urc='PDAS';}
$urdeptc=false;
if(isset($_SESSION['tb9'])){$urdeptc=$_SESSION['tb9'];}else{$urdeptc='4';}
$urdesigc=false;
if(isset($_SESSION['tb10'])){$urdesigc=$_SESSION['tb10'];}else{$urdesigc='';}
$uremailc=false;
if(isset($_SESSION['tb8'])){$uremailc=$_SESSION['tb8'];}else{$uremailc='';}
$lstnmc=false;
if(isset($_SESSION['tb2'])){$lstnmc=$_SESSION['tb2'];}else{$lstnmc='';}
$frstnmc=false;
if(isset($_SESSION['tb1'])){$frstnmc=$_SESSION['tb1'];
  $fullnmc=$frstnmc." ".$lstnmc;}else{$frstnmc=''; $fullnmc='';}
$host_name = 'localhost';
$database_name = 'mainstream_v1';
$user_name = 'eutilosb_prasenj';
$password = 'GmZ)6-d?RCk,!NALh';
// Set MySQLi to throw exceptions 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
try {
    $con = @mysqli_connect($host_name,$user_name,$password,$database_name);   
} catch (mysqli_sql_exception $e) {
    //echo 'Error-'.mysqli_error($con);
    die("Connection details are incorrect!");
}
if(!$con){echo 'Connection error';}
else{ //echo 'Connection Successful!';
}
?>