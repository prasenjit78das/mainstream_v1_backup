<?php
$page_title= 'Drop Menu Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
      //Drop table 'Material master' ;
      $qd1="DROP TABLE `n_mast_menu`;";
        try {
          mysqli_query($con, $qd1);
          echo '<br>Menu master table dropped';
        }catch(mysqli_sql_exception $e){
          die('<br>Error-'.mysqli_error($con));
        }
    }
?>