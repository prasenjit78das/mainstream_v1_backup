<?php
// Connect to the database
require_once('../../connec/connect.php');
require_once('../../assets/parent_data_func.php');
///get menu key-value pair
$a_menu_array = json_decode($json_menu, true);

if(isset($_POST['qs'])){
    $v_qs = mysqli_real_escape_string($con, $_POST['qs']);
    $a_qs=explode('~',$v_qs);
    $v_nodid=$a_qs[0];
    $v_modid=$a_qs[1];
    $v_rolid=$a_qs[2];
    $v_depid=$a_qs[3];
  }else{
    $v_nodid='';
    $v_modid='';
    $v_rolid='';
    $v_depid='';
  }
  $i=0;
$v_tmenid='';
$v_sepgacs='';
$v_seadacs='';
$v_seviacs='';
$v_seedacs='';
$v_sedlacs='';
$v_dispr='';
$v_disp='';
$v_depid='';
?>
<div class="card mb-12">
  <div class="shadow p-6 card-body">
    <h5 class="card-title">
      Menu & Role Mapping
    </h5>
    <table class="table table-striped">
      <thead class="cls_menu_map_head">
        <tr class="cls_tr1">
          <td>Menu Tree</td>
          <td>Can Access (Y/N)</td>
          <td colspan="4">Can Do (Y/N)</td> 
        </tr>
        <tr class="cls_tr2">
          <td></td>
          <td>Page</td>
          <td>Add</td>
          <td>View</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      </thead>
      <tbody class=".cls_menu_map_body">
        <?php
        $v_qs="SELECT * FROM `n_mast_map_menu_role`
                WHERE `nodid` = '$v_nodid' 
                AND `modid` = '$v_modid'
                AND `rolid` = '$v_rolid'
                AND `depid` = '$v_depid';";
          $a_rs=mysqli_query($con,$v_qs);
          foreach($a_rs as $a_hs){
          $v_menid=$a_hs['menid'];
              // // Get Menu Name
            foreach ($a_menu_array as $menudata) {
              if ($menudata['menid'] == $v_menid) {
                $v_mennm = $menudata['mennm'];
                $v_pnmid = $menudata['pnmid'];
                }
            }
            // // Get Parent Menu Name
            foreach ($a_menu_array as $menudata) {
              if ($menudata['menid'] == $v_pnmid) {
                $v_parentnm = $menudata['mennm'];
                }
            }
          $v_sepgacs= false;
            if(isset($a_hs['pgacs'])){
             $v_sepgacs= $a_hs['pgacs'];
              if($v_sepgacs==1){
                $v_pgnm='Y';
              }else{
                $v_pgnm='N';
              }  
            }
             else{ 
              $v_sepgacs=0;
              $v_pgnm='N';
             }
          $v_seviacs= false;
            if(isset($a_hs['viacs'])){
             $v_seviacs= $a_hs['viacs'];
              if($v_seviacs==1){
                $v_vinm='Y';
              }else{
                $v_vinm='N';
              } 
            }
             else{ 
              $v_seviacs=0;
              $v_vinm='N';
             }
          $v_seadacs= false;
            if(isset($a_hs['adacs'])){
             $v_seadacs= $a_hs['adacs'];
              if($v_seadacs==1){
                $v_adnm='Y';
              }else{
                $v_adnm='N';
              } 
            }
             else{ 
              $v_seadacs=0;
              $v_adnm='N';
            }
          $v_seedacs= false;
            if(isset($a_hs['edacs'])){
             $v_seedacs= $a_hs['edacs'];
              if($v_seedacs==1){
                $v_ednm='Y';
              }else{
                $v_ednm='N';
              } 
            }
             else{ 
              $v_seedacs=0;
              $v_ednm='N';
            }
          $v_sedlacs= false;
            if(isset($a_hs['dlacs'])){
              $v_sedlacs= $a_hs['dlacs'];
              if($v_sedlacs==1){
                $v_dlnm='Y';
              }else{
                $v_dlnm='N';
              } 
            }
             else{ 
              $v_sedlacs=0;
              $v_dlnm='N';
            }
      ?>
        <tr class="cls_menu_map_rows">
          <td >
            <div>
              <?=$v_parentnm;?>
            </div>
            <div style="padding-left:8pt">
              <?=$v_mennm;?>
            </div>
          </td>
          <td><?=$v_pgnm;?></td>
          <td><?=$v_adnm;?></td>
          <td><?=$v_vinm;?></td>
          <td><?=$v_ednm;?></td>
          <td><?=$v_dlnm;?></td>
        </tr>
    <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
