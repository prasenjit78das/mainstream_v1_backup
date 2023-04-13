<?php
  // Connect to the database
  //require_once('../../connec/session.php');
  require_once('../../connec/connect.php');
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
  // Get the form data
  if(isset($_POST['su_back'])){
    //echo "C2 ";
    $v_updategoto= "menu_master.php";
    header(sprintf("Location: %s" ,$v_updategoto));
    exit;
  }
  $v_menid = mysqli_real_escape_string($con, $_POST['menid']);
  if(isset($_POST['su_dell'])){
    mysqli_autocommit($con, false);
    del_tree($v_menid, $con);
    mysqli_commit($con);
    mysqli_close($con);
    $v_updategoto= "menu_master.php";
    header(sprintf("Location: %s" ,$v_updategoto));
    exit;
  }
  
  if(isset($urc)){
    $v_urc=$urc;
  }
  $v_tstamp=date('Y-m-d H:i:s');
function del_tree($i, $con){
  $qry="select * from `n_mast_menu` where `pnmid` = '$i';";
  $a_par=mysqli_query($con, $qry);
  $cnt=mysqli_num_rows($a_par);
  if($cnt==0){
    //echo $i.'<br>';
    $v_dqry = "Delete from `n_mast_menu` where `menid` = '$i';";
    mysqli_query($con, $v_dqry);
    return(1);
  }
  else{
    foreach($a_par as $a_row){
      del_tree($a_row['menid'], $con);
      $v_dqry = "Delete from `n_mast_menu` where `menid` = '$i';";
      mysqli_query($con, $v_dqry);
    }
  }

}
// Execute the query
mysqli_rollback($con);
// Close the connection
mysqli_close($con);
?>