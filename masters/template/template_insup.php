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
  if(isset($_POST['temnm'])){
    $v_temnm1 = mysqli_real_escape_string($con, $_POST['temnm']);
    $v_temnm =  trim($v_temnm1);
     ///if space posted
     if($v_temnm!=''){
        $v_ermgs='';
      }elseif($v_temnm==''){
        $v_ermgs='Blank entry not allowed!!';;
      }
  }

    // Add more variables for each form field
    if(isset($_POST['su_add'])){//
        //echo 'add new template name';
        // Construct the INSERT query
        $v_query = "INSERT INTO `n_mast_template` (`temnm`,`crtby`) 
                           VALUES ('$v_temnm','$v_urc');";
    }
    elseif(isset($_POST['su_edt'])){
      //echo 'update template name';
      $v_temid = mysqli_real_escape_string($con, $_POST['temid']);
      // Construct the UPDATE query
      $v_query = "UPDATE `n_mast_template` SET `temnm` = '$v_temnm',
                                               `updby` = '$v_urc',
                                               `updon` = '$v_tstamp' 
                                         WHERE `temid` = '$v_temid';";
    }
    elseif(isset($_POST['su_del'])){
    //echo 'delete template name (Soft delete)';
      $v_temid = mysqli_real_escape_string($con, $_POST['temid']);
      // //check if the temeid to be deleted is associated with any 'Report to Role' entry
      // $qmattem = "SELECT * FROM `n_mast_` WHERE `rptto` ='$v_rolid'";
      // $qmatroledata=mysqli_query($con,$qmatrole);
      //  $v_row_cnt = mysqli_num_rows($qmatroledata);
      //   if($v_row_cnt==0){ 
      //     //Construct the Delete query
      //     $v_query = "DELETE FROM `n_mast_role` 
      //                    WHERE `rolid` = '$v_rolid';";
      //    }else{
      //     echo '9999';
      //     mysqli_close($con);
      //     exit;
      //   }
      $v_query = "UPDATE `n_mast_template` SET `isdel` = 'Y' 
                                          WHERE `temid` = '$v_temid';";
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
      //echo $v_query.'<br/>';
        }

}catch(mysqli_sql_exception $e){
  //echo '<br>Error-'.mysqli_errno($con).mysqli_error($con);
 echo $v_errno = mysqli_errno($con);
   
}
Mysqli_rollback($con);
// Close the connection
mysqli_close($con);
?>
