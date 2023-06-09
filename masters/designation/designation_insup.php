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
  if(isset($_POST['designm'])){
    $v_designm1 = mysqli_real_escape_string($con, $_POST['designm']);
    $v_designm =  trim($v_designm1);
     ///if space posted
     if($v_designm!=''){
        $v_ermgs='';
      }elseif($v_designm==''){
        $v_ermgs='Blank entry not allowed!!';;
      }
  }

    // Add more variables for each form field
    if(isset($_POST['su_add'])){//
        //echo 'add new designation name';
        // Construct the INSERT query
        $v_query = "INSERT INTO `n_mast_designation` (`designm`,`crtby`) 
                           VALUES ('$v_designm','$v_urc');";
    }
    elseif(isset($_POST['su_edt'])){
      //echo 'update designation name';
      $v_desigid = mysqli_real_escape_string($con, $_POST['desigid']);
      // Construct the UPDATE query
      $v_query = "UPDATE `n_mast_designation` SET `designm` = '$v_designm',
                                               `updby` = '$v_urc',
                                               `updon` = '$v_tstamp' 
                                         WHERE `desigid` = '$v_desigid';";
    }
    elseif(isset($_POST['su_del'])){
    //echo 'delete designation name (Soft delete)';
      $v_desigid = mysqli_real_escape_string($con, $_POST['desigid']);
      $v_query = "UPDATE `n_mast_designation` SET `isdel` = 'Y' 
                                          WHERE `desigid` = '$v_desigid';";
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
