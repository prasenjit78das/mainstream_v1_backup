<?php 
$page_title='User Master';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
$i=0;
///get employee key-value pair
$a_emp_array = json_decode($json_emp, true);

// $v_qusee = "SELECT `user_id` id, `user_nm` nm 
//             FROM `n_mast_user` 
//             ORDER BY user_id;";
// try {
//   $a_useres = mysqli_query($con, $v_qusee) or
//   die("Error description: " . mysqli_error($con));
// }catch(mysqli_sql_exception $e){
//   $a_useres ='';
//   echo '<br>Error:'.mysqli_error($con);
// }
?>

<body>
<div class='container-fluid'>
 <div class="row">
  <div class="col-md-4">
    <div class="input-group p-2">
      <input type="text" name="search" id="te_user_src" class="form-control input-group-text" placeholder="Search...">
      <button type="button" class="btn btn-dark input-group-sm" onclick="searchAndHideTableRows('te_user_src')">
        <i class="bi-search"></i>
      </button>
    </div>
  </div>
  <div class="col-md-8">
    <div class="input-group p-2 input-group-sm d-flex justify-content-end"
      data-bs-toggle='modal' data-bs-target='#insertModal' 
      onclick="insert_data(0,'ins')">
    <span class="input-group-text text-light bg-dark">Add User</span>
    <button type='button' class='btn btn-light border border-3' >+</button>
  </div>
  </div>
 </div>
</div>

<div class='container-fluid cls_data_area'>
 <!-- Table -->
  <div class='table-responsive'>
   <table class='table table-striped'>
    <thead>
      <tr >
        <th class="td_text">User ID</th>
        <th class="td_text">User Name</th>
        <th class="td_text">Employee Name</th>
        <th class="td_text">Device #1 ID</th>
        <th class="td_text">Device #2 ID</th>
        <th class="td_text">Created By</th>
        <th class="td_text">Created On</th>
        <th class="td_act"></th>
      </tr>
    </thead>
    <tbody id='table-body'>
      <!-- Table rows will be added here dynamically -->
      <?php
        // Get material group data
        $qmatrole = "SELECT * FROM `n_mast_user` WHERE `isdel` = 'N' ORDER BY `user_nm` ASC";
        try {
          $qmatroledata=mysqli_query($con,$qmatrole)
          or die("Error description: " . mysqli_error($con));
          $v_row_cnt = mysqli_num_rows($qmatroledata);
          if($v_row_cnt<=0){ 
          }else{
            $v_slno = 0;
            foreach($qmatroledata as $triuses){
              $v_empid=$triuses["empid"];
                  // Get Employee data
                foreach ($a_emp_array as $empdata) {
                  if ($empdata['empid'] == $v_empid) {
                    $v_ftnam=$empdata["ftnam"];
                    $v_mdnam=$empdata["mdnam"];
                    $v_ltnam=$empdata["ltnam"];
                    $v_fullName=$v_ftnam.' '.$v_mdnam.' '.$v_ltnam;
                    }
                } 
              echo '<tr>';
              echo '<td class="td_text">'.$triuses["user_id"].'</td>';
              echo '<td class="td_text">'.$triuses["user_nm"].'</td>';
              echo '<td class="td_text">'.$v_fullName.'</td>';
              echo '<td class="td_text">'.$triuses["dev1_id"].'</td>';
              echo '<td class="td_text">'.$triuses["dev2_id"].'</td>';
              echo '<td class="td_text">'.$triuses["crtby"].'</td>';
              echo '<td class="td_text">'.$triuses["crton"].'</td>';
              echo '<td class="td_act">';?>
                  <span onclick="update_data(<?=$triuses['user_id'];?>,'edt')"
                   data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-pencil-square"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span onclick="delete_data(<?=$triuses['user_id'];?>,'del')"
                   data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-dash-circle"></i>
                  </span>
            <?php
              echo '</td>';
              echo '</tr>';
           }
          }
        }
        catch(mysqli_sql_exception $e){
          $qmatroledata='';
          echo '<br>Error:'.mysqli_error($con);
        }
      ?>
    </tbody>
   </table>
  </div>
</div>

 <?php 
require_once('../../footer.php');
function f_get_nm_from_id($v_id, $a_data)
{
  if(empty($a_data)){
    return "";
  }
    mysqli_data_seek($a_data,0);
    while($a_row = mysqli_fetch_array($a_data)){
      if($v_id==$a_row['id']){
        return $a_row['nm'];
      }
  }
  return "";
}
?>
<!-- The Insert Modal -->
<div class='modal' id='insertModal'>
  <div class='modal-dialog'>
    <div class='modal-content' style="border-radius:0pt;">
      <!-- Modal Header -->
      <div class='modal-header'>
        <h4 class='modal-title'></h4>
        <button type='button' class='btn-close btn-sm' data-bs-dismiss='modal'></button>
      </div>
      <!-- Modal body -->
      <div class='modal-body'>
        <form>
          <div class="input-group mb-3 input-group-sm">
            <span class="input-group-text text-primary" style="width:140pt;">
              Employee Name
            </span>
            <select type="text" class="form-control"  name="empid" 
                    id="se_empid" required >
                  <option value="">--Select--</option>
                  <?php
                    // Get Employee data
                    // need to add isactive feature
                    $v_qemp = "SELECT `empid`,`ftnam`,`mdnam`,`ltnam` 
                                  FROM `n_mast_emp`
                                  WHERE `isdel`='N' 
                                  ORDER BY `ftnam` ASC;";
                    $a_qempdata=mysqli_query($con,$v_qemp);
                    foreach($a_qempdata as $a_empitems){
                            $v_tempid=$a_empitems['empid'];
                            $v_tempnm=$a_empitems['ftnam'].' '.
                                      $a_empitems['mdnam'].' '.
                                      $a_empitems['ltnam'];
                  ?>
                    <option value="<?=$v_tempid;?>">
                      <?=$v_tempnm;?>
                    </option>
                  <?php 
                    }
                  ?>
                  </select>
          </div>
          <div class="input-group mb-3 input-group-sm">
            <span class="input-group-text text-primary" style="width:140pt;">
              User Name
              <input type="hidden" name="user_id" id="hi_user_id">
            </span>
            <input type="text" class='form-control' id='te_user_nm' name="user_nm" required>
          </div>
          <div class="input-group mb-3 input-group-sm">
            <span class="input-group-text text-primary" style="width:140pt;">
              Password
            </span>
            <input type="password" class='form-control' id='pa_user_pwd' name="user_pwd" required>
          </div>

          <div class="input-group mb-3 input-group-sm">
            <span class="input-group-text text-primary" style="width:140pt;">
              Device #1 ID
            </span>
            <input type="text" class='form-control' id='te_dev1_id' name="dev1_id" required>
          </div>
          <div class="input-group mb-3 input-group-sm">
            <span class="input-group-text text-primary" style="width:140pt;">
              Device #2 ID
            </span>
            <input type="text" class='form-control' id='te_dev2_id' name="dev2_id" required>
          </div>
        </form>
      </div>
      <!-- Modal footer -->
      <div class='modal-footer' id='div_alert'>
        <div class="container mt-3" id="div_warn" style="display:none;">
          <div class="alert alert-warning">
              <strong id="alert-text">Deletion not allowed, role(s) exists reporting to this role</strong>
          </div>
        </div>
        <input type='button' class='btn btn-secondary btn-sm'  id="bu_btn" />
      </div>
    </div>
  </div>
</div>

<script>
/////
function refreshTable() {
  //alert('refresh');
  location.reload();
}
/////
</script>
<?php 
 include('user_insert_data.php');
 include('user_fetch_data.php');
 include('user_update_data.php');
 include('user_delete_data.php');
 ?>
