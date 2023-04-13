<?php
// Connect to the database
require_once('../../connec/connect.php');
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
?>
<div class="card mb-12">
  <div class="shadow p-6 card-body">
    <h5 class="card-title">Menu & Role Mapping</h5>
    <form method="POST" action="menu_role_post.php">
      <table style="width:100%;border:1pt black solid;" rules="rows"
             class="table table-striped">
        <thead>
          <tr>
            <th style="width:30%;">
              Menu Tree
              <input type="hidden" name="tnodid" value="<?=$v_nodid?>" >
              <input type="hidden" name="tmodid" value="<?=$v_modid?>" >
              <input type="hidden" name="trolid" value="<?=$v_rolid?>" >
              <input type="hidden" name="tdepid" value="<?=$v_depid?>" >
            </th>
            <th style="border-left:1pt solid black;width:20%;">Can Access (Y/N)</th>
            <th colspan="4" style="border-left:1pt solid black;width:30%;">Can Do (Y/N)</th>
          </tr>
          <tr>
            <td></td>
            <td style="border-left:1pt solid black;">Page</td>
            <td style="border-left:1pt solid black;">Add</td>
            <td>View</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
        </thead>
         <?php print_tree($i,$v_nodid,$v_modid,$v_rolid,$con);?>
      </table>
      <div class="input-group mb-3 input-group-sm d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary" id="su_edt">Save</button>
      </div>
    </form>
  </div>
</div>
<?php
function print_tree($i,$par_nod,$par_mod,$par_rol,$con){
    $qry="select * from `n_mast_menu` where `pnmid` = '$i';";
    $a_par=mysqli_query($con, $qry);
    $cnt=mysqli_num_rows($a_par);
    if($cnt==0){
        return(1);
    }
    else{
        foreach($a_par as $a_row){
          $v_tmenid=$a_row['menid'];
          $v_tmennm=$a_row['mennm'];
          $v_pnmid=$a_row['pnmid'];
          if($v_pnmid==0){$v_dispr="display:none;";}else{$v_dispr="display:all;";}
          echo '<tr style="border-top:1pt solid black;'.$v_dispr.'"> 
                <td style="padding-left:'.$i.'0pt;border-right:1pt solid black;">
                  <input type="hidden" name="menid[]" value="'.$v_tmenid.'">
                  <input type="text" name="mennm[]" value="'.$v_tmennm.'" readonly class="trans_bg">
                </td>';
          if(($v_pnmid!=0)&&($v_pnmid!=1)){ //avoid parent and level 1 menu
            $v_disp="display:all;";
          }
          else{
            $v_disp="display:none;";
          }
            if(($par_nod!='')&&($par_mod!='')&&($par_rol!='')){
              //echo '<br>('.$par_nod.')('.$par_mod.')('.$par_rol.')';
              $v_qs="SELECT * FROM `n_mast_map_menu_role`
                              WHERE `nodid` = '$par_nod' 
                              AND `modid` = '$par_mod'
                              AND `rolid` = '$par_rol'
                              AND `menid` = '$v_tmenid';";
              $a_rs=mysqli_query($con,$v_qs);
              $a_hs= mysqli_fetch_assoc($a_rs);
              $v_sepgacs= false;
                if(isset($a_hs['pgacs'])){
                  $v_sepgacs= $a_hs['pgacs']; 
                }
                else{ 
                  $v_sepgacs=0;
                }
              $v_seviacs= false;
                if(isset($a_hs['viacs'])){
                  $v_seviacs= $a_hs['viacs']; 
                }
                else{ 
                  $v_seviacs=0;
                }
              $v_seadacs= false;
                if(isset($a_hs['adacs'])){
                  $v_seadacs= $a_hs['adacs']; 
                }
                else{ 
                  $v_seadacs=0;
                }
              $v_seedacs= false;
                if(isset($a_hs['edacs'])){
                  $v_seedacs= $a_hs['edacs']; 
                }
                else{ 
                  $v_seedacs=0;
                }
              $v_sedlacs= false;
                if(isset($a_hs['dlacs'])){
                  $v_sedlacs= $a_hs['dlacs']; 
                }
                else{ 
                  $v_sedlacs=0;
                }
            }
            else {
              $v_sepgacs=0;
              $v_seadacs=0;
              $v_seviacs=0;
              $v_seedacs=0;
              $v_sedlacs=0;
            }
            // echo'<br>('.$v_sepgacs.')('.$v_seadacs.')('.$v_seviacs.')
            // ('.$v_seedacs.')('.$v_sedlacs.')';
          echo '<td style="border-right:1pt solid black;">
                  <select id="se_pgacs" name="pgacs[]" class="form-control w-25" style="'.$v_disp.'">
                    <option value="0"'.f_set_selection("0",$v_sepgacs).'>N</option>
                    <option value="1"'.f_set_selection("1",$v_sepgacs).'>Y</option>
                  </select>
                </td>
                <td>
                  <select id="se_adacs" name="adacs[]" class="form-control w-50" style="'.$v_disp.'">
                    <option value="0"'.f_set_selection("0",$v_seadacs).'>N</option>
                    <option value="1"'.f_set_selection("1",$v_seadacs).'>Y</option>
                  </select>
                </td>
                <td>
                  <select id="se_viacs" name="viacs[]" class="form-control w-50" style="'.$v_disp.'">
                    <option value="0"'.f_set_selection("0",$v_seviacs).'>N</option>
                    <option value="1"'.f_set_selection("1",$v_seviacs).'>Y</option>
                  </select>
                </td>
                <td>
                  <select id="se_edacs" name="edacs[]" class="form-control w-50" style="'.$v_disp.'">
                    <option value="0"'.f_set_selection("0",$v_seedacs).'>N</option>
                    <option value="1"'.f_set_selection("1",$v_seedacs).'>Y</option>
                  </select>
                </td>
                <td>
                  <select id="se_dlacs" name="dlacs[]" class="form-control w-50" style="'.$v_disp.'">
                    <option value="0"'.f_set_selection("0",$v_sedlacs).'>N</option>
                    <option value="1"'.f_set_selection("1",$v_sedlacs).'>Y</option>
                  </select>
               ';
                print_tree($a_row['menid'],$par_nod,$par_mod,$par_rol,$con);
          echo '</td>';
          echo '</tr>';
        }
    }
}
function f_set_selection($v_cond, $v_val){
  if($v_cond==$v_val){
    return ('selected');
  }
  else {
    return(' ');
  }
    return (' '); 
}
?>
