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
  if(isset($_POST['old_mennm'])){
    $v_old_mennm = mysqli_real_escape_string($con, $_POST['old_mennm']);
  }
  if(isset($_POST['mennm'])){
    $v_mennm1 = mysqli_real_escape_string($con, $_POST['mennm']);
    $v_mennm = trim($v_mennm1);
  }

  if(isset($_POST['modid'])){
    $v_modid = mysqli_real_escape_string($con, $_POST['modid']);
  }

  if(isset($_POST['menid'])){
    $v_menid = mysqli_real_escape_string($con, $_POST['menid']);
  }
  if(isset($_POST['fsusr'])){
    $v_fsusr = mysqli_real_escape_string($con, $_POST['fsusr']);
  }
  if(isset($_POST['aspnm'])){
    $v_aspnm = mysqli_real_escape_string($con, $_POST['aspnm']);
  }
  if(isset($_POST['pnmid'])){
    $v_pnmid = mysqli_real_escape_string($con, $_POST['pnmid']);
  }
  if(isset($_POST['su_add'])){
    $v_pnmid_chk=$v_menid;
  }
  elseif(isset($_POST['su_edt'])){
    $v_pnmid_chk=$v_pnmid;
    if($v_old_mennm==$v_mennm){
      ///while updating do not check menu name
      $v_menu_nm_chk=0;
    }elseif($v_old_mennm!=$v_mennm){
      //while updating check with new name
      $v_menu_nm_chk=1;
     }
  }
  // Add more variables for each form field
  ///check if same entries exists
  $v_query= "SELECT * FROM `n_mast_menu` 
                      WHERE `mennm` = '$v_mennm'
                      AND `modid` = '$v_modid'
                      AND `pnmid` = '$v_pnmid_chk';";
      //echo '<br>'.$v_query;
      // Execute the query
    $result = mysqli_query($con, $v_query);
    $v_numrows=mysqli_num_rows($result);
  if($v_numrows>0){
    //echo $v_alert="<script>alert('Duplicate exists !!');</script>";
    //exit;
  }
  else{

  }
  if($v_mennm==''){
    $v_msg="Blank value not allowed !!";
  }else{
      if(isset($_POST['su_add'])){//add new node under a parent node
            // Construct the INSERT query
            if($v_numrows==0){
              $v_query = "INSERT INTO `n_mast_menu` (`modid`,`mennm`,`pnmid`,`aspnm`,`fsusr`,`crtby`) 
                              VALUES ('$v_modid','$v_mennm','$v_menid','$v_aspnm','$v_fsusr','$v_urc')";
              $v_msg="Ok";
            }else{
              $v_msg="Duplicate exists !!";
            };
      }
      elseif(isset($_POST['su_edt'])){
        //echo 'chk='.$v_menu_nm_chk.'----'.$v_numrows; 
        // Construct the UPDATE query
         if(
            (( $v_menu_nm_chk==1)&&($v_numrows==0))|| 
            (( $v_menu_nm_chk==0)&&($v_numrows>0))
          ){
            $v_query = "UPDATE `n_mast_menu` 
                        SET `modid` = '$v_modid',
                            `mennm` = '$v_mennm', `pnmid` = '$v_pnmid' ,
                            `aspnm` = '$v_aspnm', `fsusr` = '$v_fsusr' ,
                            `updby` = '$v_urc', `updon` = '$v_tstamp' 
                        WHERE `menid` = '$v_menid'";
            $v_msg="Ok";
          }else{
            $v_msg="Duplicate exists !!";
          };

      } 
    // Execute the query
    try{
        mysqli_autocommit($con,false);
        if(mysqli_query($con, $v_query)){
          mysqli_commit($con);
          //echo '<br/>'.$v_query.'<br/>';
          //On succesfull commit redirect to list page
          if($v_msg=="Ok"){
            $v_updategoto= "menu_master.php";
            header(sprintf("Location: %s" ,$v_updategoto));
          }
        }
        else{
          //echo $query.'<br/>';
          die(mysqli_error($con));
        }
      }catch(mysqli_sql_exception $e){
      //echo '<br>Error-'.mysqli_error($con);
        $v_webpage='<html><head><title>POST Information</title></head>';
        $v_webpage.='
        <body style="background-color:#000;" >
          <a style="text-decoration:none;font-weight:600;">
            <table  align="center" style="color:white;width:100%;text-align:center;">
              <tr>
                <td>
                  <div style="width:100%;text-align:center;"><br/>
                    Error-'.mysqli_error($con);'
                  </div>"
                  <form method="POST" action="grp_master.php" target="_top">
                    <input type="submit" value="Go Back"/>
                  </form>
                </td>
              <tr>
            </table>
          </a>
        </body>';
        $v_webpage.='</html>';
       echo $v_webpage;
     }
   } 
Mysqli_rollback($con);
// Close the connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Info</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php  require_once('../../connec/connect_btsp5.php');?>
    </head>
    <body class="bg-secondary">
        <div class="container mt-3 bg-secondary">
            <div class="alert alert-warning text-justify-center">
                <b><?=$v_msg;?></b>
                <form action="menu_master.php" method="POST">
                  <input type="hidden" name="menid" value="<?= $v_menid ?>">
                  <input type="submit" name="su_back" value="Back">
                </form>
            </div>
        </div>
    </body>
</html>
