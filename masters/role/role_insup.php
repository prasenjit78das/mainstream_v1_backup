<?php
  // Connect to the database
  //require_once('../../connec/session.php');
  require_once('../../connec/connect.php');
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
  // Get the form data
  $v_ermgs='';
  if(isset($urc)){
    $v_urc=$urc;
  }
  $v_tstamp=date('Y-m-d H:i:s');
  if(isset($_POST['nodid'])){
    $v_nodid = mysqli_real_escape_string($con, $_POST['nodid']);
  }
  if(isset($_POST['modid'])){
    $v_modid = mysqli_real_escape_string($con, $_POST['modid']);
  }
  if(isset($_POST['rptto'])){
    $v_rptto = mysqli_real_escape_string($con, $_POST['rptto']);
  }
  if(isset($_POST['rolnm'])){
    $v_rolnm1 = mysqli_real_escape_string($con, $_POST['rolnm']);
    $v_rolnm =  trim($v_rolnm1);
     ///if space posted
     if($v_rolnm!=''){
        $v_ermgs='';
      }elseif($v_rolnm==''){
        $v_ermgs='Blank entry not allowed!!';;
      }
  }

    // Add more variables for each form field
    if(isset($_POST['su_add'])){//
        //echo 'add new role';
        // Below query can be used to check "die" function in 'catch' block
        // $v_query = "INSERT INTO `n_mast_role` (`nodid`,`modid`,`rptto`,`rolnm`,`crtby`) 
        //                    VALUES ('$v_rolnm','$v_urc');";
        // Construct the INSERT query
        $v_query = "INSERT INTO `n_mast_role_name` (`rolnm`,`crtby`) 
                           VALUES ('$v_rolnm','$v_urc');";

    }
    elseif(isset($_POST['su_edt'])){
      //echo 'update role';
      $v_rolid = mysqli_real_escape_string($con, $_POST['rolid']);
      // Construct the UPDATE query
      $v_query = "UPDATE `n_mast_role_name` SET  `rolnm` = '$v_rolnm',
                                          `updby` = '$v_urc',`updon` = '$v_tstamp' 
                                           WHERE `rolid` = '$v_rolid';";
    }
    elseif(isset($_POST['su_del'])){
    //echo 'delete role';
      $v_rolid = mysqli_real_escape_string($con, $_POST['rolid']);
 
          //Construct the Delete query
          $v_query = "UPDATE `n_mast_role_name` SET  `isdel` = 'Y',
                                              `updby` = '$v_urc',`updon` = '$v_tstamp' 
                                               WHERE `rolid` = '$v_rolid';";
        }
   // Execute the query
try{
 
    mysqli_autocommit($con,false);
    if(mysqli_query($con, $v_query)){
      if($v_ermgs==''){
      mysqli_commit($con);
      }
      elseif($v_ermgs!=''){
        echo $v_ermgs;
      }
      //echo '<br/>'.$v_query.'<br/>';
    }
    else{
      f_error($con);
        }

}catch(mysqli_sql_exception $e){
  f_error($con);
}
Mysqli_rollback($con);
// Close the connection
mysqli_close($con);
?>
