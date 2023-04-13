<?php
$page_title= 'Drop Map Menus n Roles Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
      //Drop table 'Material master' ;
      $qd1="DROP TABLE `n_mast_map_menu_role`;";
        try {
          mysqli_query($con, $qd1);
          echo '<br>"n_mast_map_menu_role" table dropped';
        }catch(mysqli_sql_exception $e){
          echo '<br>Error-'.mysqli_error($con);
        }
    }
?>