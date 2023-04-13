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
  if(isset($_POST['old_nodnm'])){
    $v_old_nodnm = mysqli_real_escape_string($con, $_POST['old_nodnm']);
  }
  if(isset($_POST['nodnm'])){
    $v_nodnm1 = mysqli_real_escape_string($con, $_POST['nodnm']);
    $v_nodnm = trim($v_nodnm1);
  }


  if(isset($_POST['nodid'])){
    $v_nodid = mysqli_real_escape_string($con, $_POST['nodid']);
  }
  if(isset($_POST['ntpid'])){
    $v_ntpid = mysqli_real_escape_string($con, $_POST['ntpid']);
  }
  if(isset($_POST['descr'])){
    $v_descr = mysqli_real_escape_string($con, $_POST['descr']);
  }
  if(isset($_POST['addrs'])){
    $v_addrs = mysqli_real_escape_string($con, $_POST['addrs']);
  }
  if(isset($_POST['gstin'])){
    $v_gstin = mysqli_real_escape_string($con, $_POST['gstin']);
  }
  if(isset($_POST['bnkdtl'])){
    $v_bnkdtl = mysqli_real_escape_string($con, $_POST['bnkdtl']);
  }
  if(isset($_POST['pndid'])){
    $v_pndid = mysqli_real_escape_string($con, $_POST['pndid']);
  }
  if(isset($_POST['su_add'])){
    $v_pndid_chk=$v_nodid;
  }
  elseif(isset($_POST['su_edt'])){
    $v_pndid_chk=$v_pndid;
    if($v_old_nodnm==$v_nodnm){
      ///while updating do not check menu name
      $v_menu_nm_chk=0;
    }elseif($v_old_nodnm!=$v_nodnm){
      //while updating check with new name
      $v_menu_nm_chk=1;
     }
  }
  // Add more variables for each form field
  ///check if same entries exists
  $v_query= "SELECT * FROM `mast_node` 
                      WHERE `nodnm` = '$v_nodnm'
                      AND `pndid` = '$v_pndid_chk';";
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
  if($v_nodnm==''){
    $v_msg="Blank value not allowed !!";
  }else{
      if(isset($_POST['su_add'])){//add new node under a parent node
            // Construct the INSERT query
            if($v_numrows==0){
              $v_query = "INSERT INTO `mast_node` (`nodnm`,`pndid`,`ntpid`,`descr`,
                                                  `addrs`,`gstin`,`bnkdtl`,`crtby`) 
                              VALUES ('$v_nodnm','$v_nodid','$v_ntpid','$v_descr',
                                      '$v_addrs','$v_gstin','$v_bnkdtl','$v_urc')";
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
            $v_query = "UPDATE `mast_node` 
                        SET `nodnm` = '$v_nodnm', `ntpid` = '$v_ntpid' ,
                            `descr` = '$v_descr', `addrs` = '$v_addrs' ,
                            `gstin` = '$v_gstin', `bnkdtl` = '$v_bnkdtl',
                            `updby` = '$v_urc', `updon` = '$v_tstamp' 
                        WHERE `nodid` = '$v_nodid'";
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
            $v_updategoto= "node_master.php";
            header(sprintf("Location: %s" ,$v_updategoto));
          }
        }
        else{
          echo $query.'<br/>';
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
                <form action="node_master.php" method="POST">
                  <input type="hidden" name="nodid" value="<?= $v_nodid ?>">
                  <input type="submit" name="su_back" value="Back">
                </form>
            </div>
        </div>
    </body>
</html>
