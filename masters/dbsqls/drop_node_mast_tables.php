<?php
$page_title= 'Drop Tables Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
   
//Drop table 'Node master' ;
$qd1="DROP TABLE `mast_node`;";
try {
    mysqli_query($con, $qd1);
    echo '<br>Node master table dropped';
    }catch(mysqli_sql_exception $e){
        echo '<br>Error-'.mysqli_error($con);
    }

//Drop table 'Node type master' ;
$qd1="DROP TABLE `mast_nodtyp`;";
try {
    mysqli_query($con, $qd1);
    echo '<br>Node type master table dropped';
    }catch(mysqli_sql_exception $e){
        echo '<br>Error-'.mysqli_error($con);
    }


}
?>