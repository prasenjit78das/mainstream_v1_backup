<?php
$page_title= 'Drop Template Table Page';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if(!$con){echo 'Connection error';}
else{ //echo '<br>Found:'.$database_name.'<br>';
   
//Drop table 'Node master' ;
$qd1="DROP TABLE `n_mast_template`;";
try {
    mysqli_query($con, $qd1);
    echo '<br>template table dropped';
    }catch(mysqli_sql_exception $e){
        echo '<br>Error-'.mysqli_error($con);
    }
}
?>