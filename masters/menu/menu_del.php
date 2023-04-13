<?php
  // Connect to the database
  //require_once('../../connec/session.php');
  require_once('../../connec/connect.php');
 
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
  // Get the form data
  if(isset($urc)){
    $v_urc=$urc;
  }
  $v_tstamp=date('Y-m-d H:i:s');
  $v_disp = "hidden";
    // Add more variables for each form field
if(isset($_POST['su_del'])){
  $v_menid = mysqli_real_escape_string($con, $_POST['menid']);
  //echo '<br>'.$v_menid.'<br>';
  // Construct the SELECT query
  $v_rtqry = "SELECT `menid`,`pnmid` FROM `n_mast_menu` 
                  WHERE `menid` = '$v_menid';";
  $a_rtres = mysqli_query($con, $v_rtqry);
  $a_row = mysqli_fetch_assoc($a_rtres);
  $v_rmenu=$a_row['pnmid'];
  if($v_rmenu==0){
    $v_msg="Cannot delete root menu !!";
  }
  else{


    $v_query= "SELECT `menid`,`pnmid` FROM `n_mast_menu` 
                   WHERE `pnmid` = '$v_menid';";
    //echo '<br>'.$v_query;
    // Execute the query
    $result = mysqli_query($con, $v_query);
    $v_numrows=mysqli_num_rows($result);
    if($v_numrows>0){
      $v_msg="Child menu exists, still delete ?";
      $v_disp = "";
      //echo $v_numrows;
      //echo $v_rnodid.','.$v_rpndid.'<br>';
    }
    else{
        //echo "check1";
        mysqli_autocommit($con, false);
        del_tree($v_menid, $con);
        mysqli_commit($con);
        mysqli_close($con);
        $v_updategoto= "menu_master.php";
        header(sprintf("Location: %s" ,$v_updategoto));
        exit;
    }
  }
}

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
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php  require_once('../../connec/connect_btsp5.php');?>
    </head>
    <body class="bg-secondary">
        <div class="container mt-3 bg-secondary">
            <div class="alert alert-warning text-justify-center">
                <b><?=$v_msg;?></b>
                <form action="menu_del_act.php" method="POST">
                  <input type="hidden" name="menid" value="<?= $v_menid ?>">
                  <input type="submit" name="su_back" value="Back">
                  <input type="submit" name="su_dell" value="Delete" <?= $v_disp ?>>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
// Execute the query
//mysqli_rollback($con);
// Close the connection
mysqli_close($con);
?>