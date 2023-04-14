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
  $v_msg='';
    // Add more variables for each form field
if(isset($_POST['su_del'])){
  $v_nodid = mysqli_real_escape_string($con, $_POST['nodid']);
  //echo '<br>'.$v_nodid.'<br>';
  // Construct the SELECT query
  $v_rtqry = "SELECT `nodid`,`pndid` FROM `mast_node` 
                  WHERE `nodid` = '$v_nodid';";
  $a_rtres = mysqli_query($con, $v_rtqry);
  $a_row = mysqli_fetch_assoc($a_rtres);
  $v_rmenu=$a_row['pndid'];
  if($v_rmenu==0){
    $v_msg="Cannot delete root menu !!";
  }
  else{


    $v_query= "SELECT `nodid`,`pndid` FROM `mast_node` 
                   WHERE `pndid` = '$v_nodid';";
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
          // Execute the query
    try{
        del_tree($v_nodid, $con);
        mysqli_commit($con);
        mysqli_close($con);
        $v_updategoto= "node_master.php";
        header(sprintf("Location: %s" ,$v_updategoto));
        exit;
      }catch(mysqli_sql_exception $e){
        //echo '<br>Error-'.mysqli_errno($con);
        $v_errno= mysqli_errno($con);
        if($v_errno==1451){///Cannot delete or update a parent row:
          // a foreign key constraint fails
          $v_msg='Dependent element exists! cannot proceed.';
        }else{
          $v_msg='';
        }
         // echo $v_msg;
      }
    }
  }
}

function del_tree($i, $con){
 $qry="select * from `mast_node` where `pndid` = '$i';";
  $a_par=mysqli_query($con, $qry);
  $cnt=mysqli_num_rows($a_par);
  if($cnt==0){
    //echo $i.'<br>';
    $v_dqry = "Delete from `mast_node` where `nodid` = '$i';";
    mysqli_query($con, $v_dqry);
    return(1);
  }
  else{
    foreach($a_par as $a_row){
      del_tree($a_row['nodid'], $con);
      $v_dqry = "Delete from `mast_node` where `nodid` = '$i';";
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
                <form action="node_del_act.php" method="POST">
                  <input type="hidden" name="nodid" value="<?= $v_nodid ?>">
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