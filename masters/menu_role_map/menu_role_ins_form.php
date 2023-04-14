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
  $i=1;
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
              <input type="text" name="tnodid" value="<?=$v_nodid?>" >
              <input type="text" name="tmodid" value="<?=$v_modid?>" >
              <input type="text" name="trolid" value="<?=$v_rolid?>" >
              <input type="text" name="tdepid" value="<?=$v_depid?>" >
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
        <tbody>
         <?php print_tree($i,$v_modid,$con);?>
        </tbody>
      </table>
      <div class="input-group mb-3 input-group-sm d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary" id="su_edt">Save</button>
      </div>
    </form>
  </div>
</div>
<?php
function print_tree($i,$par_mod,$con){
   $v_qry="SELECT * FROM `n_mast_menu` 
                    WHERE `modid` = '$par_mod'
                    AND `pnmid`='$i';";
      try {
        $v_ci=0;
        $a_rslt=mysqli_query($con, $v_qry)or
        die(mysqli_error($con));
        foreach($a_rslt as $a_items){
          $ci=++$v_ci;
          $v_modid= $a_items['modid'];
          $v_menid= $a_items['menid'];
          $v_pnmid= $a_items['pnmid'];
          $v_mennm= $a_items['mennm'];
          if($v_pnmid==1){
            $strong="font-weight:700;";
            $pi=2;
          }
          else{
            $strong="font-weight:500;";
            $pi=8;
          }
          $v_li='<tr style="border:1pt red solid;'.$strong.'">
              <td colspan="6" style="padding-left:'.$pi.'pt;">'.$v_pnmid.$v_mennm.'</td></tr>';
          echo $v_li;
          print_tree($v_menid,$v_modid,$con);
         }
      } catch (mysqli_sql_exception $e) {
        die(mysqli_error($con));
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
