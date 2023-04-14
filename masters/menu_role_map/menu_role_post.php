<?php
  // Connect to the database
  //require_once('../../connec/session.php');
  require_once('../../connec/connect.php');
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
  // Get the form data
  $v_msg='';
  if(isset($urc)){
    $v_urc=$urc;
  }
  $v_tstamp=date('Y-m-d H:i:s');
  if(isset($_POST['tnodid'])){
    $v_nodid = mysqli_real_escape_string($con, $_POST['tnodid']);
  }
  if(isset($_POST['tmodid'])){
    $v_modid = mysqli_real_escape_string($con, $_POST['tmodid']);
  }
  if(isset($_POST['trolid'])){
    $v_rolid = mysqli_real_escape_string($con, $_POST['trolid']);
  }
  if(isset($_POST['tdepid'])){
    $v_depid = mysqli_real_escape_string($con, $_POST['tdepid']);
  }
    //$row_data = array();
    foreach($_POST['menid'] as $row=>$v_menid) {
    ///option entries
    if($v_menid!=1){
    if (isset($con,$_POST['menid'][$row])){ 
	      $v_menid= mysqli_real_escape_string($con,$_POST['menid'][$row]);	
      }
      else { 
        $v_menid =''; 
      };

    if (isset($con,$_POST['pgacs'][$row])){ 
	      $v_pgacs= mysqli_real_escape_string($con,$_POST['pgacs'][$row]);	
      }
      else { 
        $v_pgacs =''; 
      };
    if (isset($con,$_POST['adacs'][$row])){ 
	      $v_adacs= mysqli_real_escape_string($con,$_POST['adacs'][$row]);	
      }
      else { 
        $v_adacs =''; 
      };
    if (isset($con,$_POST['edacs'][$row])){ 
	      $v_edacs= mysqli_real_escape_string($con,$_POST['edacs'][$row]);	
      }
      else { 
        $v_edacs =''; 
      };
    if (isset($con,$_POST['viacs'][$row])){ 
	      $v_viacs= mysqli_real_escape_string($con,$_POST['viacs'][$row]);	
      }
      else { 
        $v_viacs =''; 
      };
    if (isset($con,$_POST['dlacs'][$row])){ 
	      $v_dlacs= mysqli_real_escape_string($con,$_POST['dlacs'][$row]);	
      }
      else { 
        $v_dlacs =''; 
      };
      //echo '<br><br>('.$v_pgacs.')('.$v_adacs.')('.$v_viacs.')('.$v_edacs.')('.$v_dlacs.')';
      if($v_adacs==1)
      {// If a Role has access to ADD, must have access to VIEW and EDIT.
        $v_edacs=1;$v_viacs=1;
      }
      elseif($v_adacs==0)
      {
        $v_edacs=$v_edacs;$v_viacs=$v_viacs;
      }
      ///Summation of all permissions (Zero means=no permission)
      $v_accrslt=$v_pgacs+$v_adacs+$v_viacs+$v_edacs+$v_dlacs;
        ///check if same entries exists
        $v_query= "SELECT * FROM `n_mast_map_menu_role` 
                            WHERE `nodid`='$v_nodid'
                            AND `modid` = '$v_modid'
                            AND `rolid` = '$v_rolid'
                            AND `depid` = '$v_depid'
                            AND `menid` = '$v_menid';";
          //echo '<br>'.$v_query;
          // Execute the query
          $result = mysqli_query($con, $v_query);
          $v_numrows=mysqli_num_rows($result);
          if($v_numrows>0){
            $v_query = "UPDATE `n_mast_map_menu_role` 
                        SET `pgacs` = '$v_pgacs',`adacs` = '$v_adacs',`viacs` = '$v_viacs',
                            `edacs` = '$v_edacs' ,`dlacs`='$v_dlacs',`updby` = '$v_urc',
                             `updon` = '$v_tstamp'
                        WHERE `nodid` = '$v_nodid'
                        AND `modid` = '$v_modid'
                        AND `rolid` = '$v_rolid'
                        AND `depid` = '$v_depid'
                        AND `menid` = '$v_menid';";
          }
          else{
            if($v_accrslt>0){//do not insert combinations with all zero
            $v_query="INSERT INTO `n_mast_map_menu_role` 
                                ( `nodid`,`modid`, `rolid`,`depid`, `menid`,
                                 `pgacs`, `adacs`, `viacs`, `edacs`,
                                 `dlacs`, `crtby`)
                          VALUE ('$v_nodid','$v_modid','$v_rolid',
                                 '$v_depid','$v_menid','$v_pgacs',
                                 '$v_adacs','$v_viacs','$v_edacs',
                                 '$v_dlacs','$v_urc');";
           }else{

           }
         }
 
      mysqli_autocommit($con,false);
      try {
        mysqli_query($con, $v_query) or
        die(mysqli_error($con));
        mysqli_commit($con);
        $v_updategoto= "menu_role_master.php";
        //header(sprintf("Location: %s" ,$v_updategoto));

      } catch (mysqli_sql_exception $e) {
        $v_msg=mysqli_error($con);
        die(mysqli_error($con));
      }
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
                <form action="menu_role_master.php" method="POST">
                  <input type="submit" name="su_back" value="Back">
                </form>
            </div>
        </div>
    </body>
</html>
