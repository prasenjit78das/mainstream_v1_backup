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
  if(isset($_POST['empid'])){
    $v_empid = mysqli_real_escape_string($con, $_POST['empid']);
    //$v_ermgs.= '#-'.$v_empid.'-#';
    ///if null or blank posted
    if($v_empid!=''){
      $v_ermgs.='';
    }elseif(($v_empid=='')||($v_empid == NULL)){
      $v_ermgs.='Select employee!!';;
    }
  }
  $v_user_id='';
  // if(isset($_POST['user_id'])){
  //   $v_user_id = mysqli_real_escape_string($con, $_POST['user_id']);
  //   //$v_ermgs.= '#-'.$v_user_id.'-#';
  //   ///if null or blank posted
  //   if($v_user_id!=''){
  //     $v_ermgs.='';
  //   }elseif(($v_user_id=='')||($v_user_id == NULL)){
  //     $v_ermgs.='Select User!!';;
  //   }
  // }
  if(isset($_POST['rolid'])){
    $v_rolid = mysqli_real_escape_string($con, $_POST['rolid']);
    //$v_ermgs.= '#-'.$v_rolid.'-#';
    ///if null or blank posted
    if($v_rolid!=''){
      $v_ermgs.='';
    }elseif(($v_rolid=='')||($v_rolid == NULL)){
      $v_ermgs.='Select Role!!';;
    }
  }

    // Add more variables for each form field
    if(isset($_POST['su_add'])){//
        //echo 'add new empUserRole name';
        // Construct the INSERT query
        $v_query = "INSERT INTO `n_mast_empUserRole` 
                            (`empid`,`user_id`,`rolid`,`crtby`) 
                           VALUES ('$v_empid','$v_user_id','$v_rolid','$v_urc');";
    }
    elseif(isset($_POST['su_edt'])){
      //echo 'update empUserRole name';
      $v_eurid = mysqli_real_escape_string($con, $_POST['eurid']);
      // Construct the UPDATE query
      $v_query = "UPDATE `n_mast_empUserRole` SET `empid` = '$v_empid',
                                               `user_id` = '$v_user_id',
                                               `rolid` = '$v_rolid' 
                                         WHERE `eurid` = '$v_eurid';";
    }
    elseif(isset($_POST['su_del'])){
    //echo 'delete empUserRole name (Soft delete)';
      $v_eurid = mysqli_real_escape_string($con, $_POST['eurid']);

      $v_query = "UPDATE `n_mast_empUserRole` 
                          SET `isdel` = 'Y' 
                          WHERE `eurid` = '$v_eurid';";
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
