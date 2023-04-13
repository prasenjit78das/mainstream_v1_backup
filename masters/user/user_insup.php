<?php
  // Connect to the database
  //require_once('../../connec/session.php');
  require_once('../../connec/connect.php');
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
  //future date
  $v_currentDate= date('Y-m-d');//get current date
  $v_futureDate= date('Y-m-d', strtotime('+3 months'< strtotime($v_currentDate)));
  // Get the form data
  $v_ermgs='';
  if(isset($urc)){
    $v_urc=$urc;
  }
  $v_tstamp=date('Y-m-d H:i:s');
  if(isset($_POST['user_nm'])){
    $v_user_nm1 = mysqli_real_escape_string($con, $_POST['user_nm']);
    $v_user_nm =  trim($v_user_nm1);
     ///if space posted
     if($v_user_nm!=''){
        $v_ermgs='';
      }elseif($v_user_nm==''){
        $v_ermgs='Blank User Name not allowed!!<br>';;
      }
  }
  if(isset($_POST['user_pwd'])){
    $v_user_pwd1 = mysqli_real_escape_string($con, $_POST['user_pwd']);
    $v_user_pwd =  trim($v_user_pwd1);
     ///if space posted
     if($v_user_pwd!=''){
        $v_ermgs.='';
      }elseif($v_user_pwd==''){
        $v_ermgs.='Blank Password not allowed!!<br>';;
      }
  }
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
  if(isset($_POST['dev1_id'])){
    $v_dev1_id = mysqli_real_escape_string($con, $_POST['dev1_id']);
  }
  if(isset($_POST['dev2_id'])){
    $v_dev2_id = mysqli_real_escape_string($con, $_POST['dev2_id']);
  }
    // Add more variables for each form field
    if(isset($_POST['su_add'])){//
        //echo 'add new user name';
        // Construct the INSERT query
        $v_query = "INSERT INTO `n_mast_user` 
                            (`user_nm`,`user_pwd`,`exprdt`,`empid`,`dev1_id`,`dev2_id`,`crtby`) 
                           VALUES ('$v_user_nm','$v_user_pwd','$v_futureDate','$v_empid',
                                    '$v_dev1_id','$v_dev2_id','$v_urc');";
    }
    elseif(isset($_POST['su_edt'])){
      //echo 'update user name';
      $v_user_id = mysqli_real_escape_string($con, $_POST['user_id']);
      // Construct the UPDATE query
      $v_query = "UPDATE `n_mast_user` SET `user_nm` = '$v_user_nm',
                                            `user_pwd` = '$v_user_pwd',
                                            `empid` = '$v_empid',
                                            `dev1_id` = '$v_dev1_id',
                                            `dev2_id` = '$v_dev2_id',
                                            `updby` = '$v_urc',
                                            `updon` = '$v_tstamp' 
                                      WHERE `user_id` = '$v_user_id';";
    }
    elseif(isset($_POST['su_del'])){
      //echo 'delete user name (Soft delete)';
      $v_user_id = mysqli_real_escape_string($con, $_POST['user_id']);
      // Construct the UPDATE query for soft delete
      $v_query = "UPDATE `n_mast_user` SET `isdel` = 'Y' 
                  WHERE `user_id` = '$v_user_id';";
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
 //die("Error description: " . mysqli_error($con)); 
}
Mysqli_rollback($con);
// Close the connection
mysqli_close($con);
?>
