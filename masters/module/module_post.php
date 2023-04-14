<?php
  // Connect to the database
  //require_once('../../connec/session.php');
  require_once('../../connec/connect.php');
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
  // Get the form data
  $v_ermgs='';
  $v_mod_nm_chk='';
  if(isset($urc)){
    $v_urc=$urc;
  }else{$v_urc='';}

  $v_tstamp=date('Y-m-d H:i:s');

  if(isset($_POST['modid'])){
    $v_modid = mysqli_real_escape_string($con, $_POST['modid']);
  }
  if(isset($_POST['isact'])){
    $v_isact = mysqli_real_escape_string($con, $_POST['isact']);
  }
  if(isset($_POST['fsusr'])){
    $v_fsusr = mysqli_real_escape_string($con, $_POST['fsusr']);
  }
 
  if(isset($_POST['modnm'])){
    $v_modnm1 = mysqli_real_escape_string($con, $_POST['modnm']);
    $v_modnm = trim($v_modnm1);
    if(isset($_POST['su_edt'])){
      if(isset($_POST['old_modnm'])){
          $v_old_modnm1 = mysqli_real_escape_string($con, $_POST['old_modnm']);
          $v_old_modnm = trim($v_old_modnm1);
        if($v_old_modnm==$v_modnm){
          ///while updating do not check module name
          $v_mod_nm_chk=0;
        }elseif($v_old_modnm!=$v_modnm){
          //while updating check with new name
          $v_mod_nm_chk=1;
        }
      }else{
        $v_mod_nm_chk=1;
      }
    }else{
      $v_mod_nm_chk=1;
    }
    ///if space posted
    if(($v_modnm!='')){
        ///check if same entries exists
      $v_query= "SELECT * FROM `n_mast_module` 
                          WHERE `modnm` = '$v_modnm';";
      //echo '<br>'.$v_query;
      // Execute the query
      $result = mysqli_query($con, $v_query);
      $v_numrows=mysqli_num_rows($result);
       if(($v_numrows>0)&&($v_mod_nm_chk==1)){
          $v_ermgs='';
        }else{
          $v_ermgs='';
        }
      }elseif($v_modnm==''){
          $v_ermgs='Blank entry not allowed!!';;
      }else{
          $v_ermgs='';
      }
   }
    // Add more variables for each form field
    if(isset($_POST['su_add'])){//
      //echo 'add new module';
      // Construct the INSERT query
      $v_query = "INSERT INTO `n_mast_module` (`modnm`,`isact`,`fsusr`,`crtby`) 
                          VALUES ('$v_modnm','$v_isact','$v_fsusr','$v_urc');";
    }
    elseif(isset($_POST['su_edt'])){
      //echo 'update module'.$v_ermgs;
      $v_modid = mysqli_real_escape_string($con, $_POST['modid']);
      // Construct the UPDATE query
      $v_query = "UPDATE `n_mast_module` SET `modnm` = '$v_modnm',
                            `isact` = '$v_isact',`fsusr` = '$v_fsusr',
                            `updby` = '$v_urc',`updon` = '$v_tstamp' 
                             WHERE `modid` = '$v_modid';";
    }
    elseif(isset($_POST['su_del'])){
      //echo 'delete module';
      $v_modid = mysqli_real_escape_string($con, $_POST['modid']);
          //Construct the Delete query
      $v_query = "DELETE FROM `n_mast_module` 
                         WHERE `modid` = '$v_modid';";
          //exit;
    }
// Execute the query
try{  echo $v_ermgs;
    mysqli_autocommit($con,false);
    if(mysqli_query($con, $v_query)){
      if((isset($_POST['su_add']))||(isset($_POST['su_edt']))){
        if($v_ermgs==''){
              mysqli_commit($con);
        }elseif($v_ermgs!=''){ 
            
        };
      }
      elseif(isset($_POST['su_del'])){
        mysqli_commit($con);
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
