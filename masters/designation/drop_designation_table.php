<?php
$page_title= 'Drop Designation Table Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
   
//Drop table 'Node master' ;
$qd1="DROP TABLE `n_mast_designation`;";
try {
    mysqli_query($con, $qd1)or
      die(mysqli_error($con));
    echo '<br>designation table dropped';
    }catch(mysqli_sql_exception $e){
        die(mysqli_error($con));
    }
}
?>