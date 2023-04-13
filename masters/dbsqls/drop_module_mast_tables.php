<?php
$page_title= 'Drop Role & Module Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
      //Drop table 'Group Master' ;
      $qd2="DROP TABLE `n_mast_role`;";
        try {
          mysqli_query($con, $qd2);
          echo '<br>Role master table dropped';
        }catch(mysqli_sql_exception $e){
          echo '<br>Error-'.mysqli_error($con);
        }
      //Drop table 'Material master' ;
      $qd1="DROP TABLE `n_mast_module`;";
      try {
        mysqli_query($con, $qd1);
        echo '<br>Module master table dropped';
      }catch(mysqli_sql_exception $e){
        echo '<br>Error-'.mysqli_error($con);
      }
}
?>