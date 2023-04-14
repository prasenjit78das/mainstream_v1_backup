<?php 
$page_title='Role Master';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
$i=0;

$v_qnode = "SELECT `nodid` id, `nodnm` nm 
            FROM `mast_node` 
            ORDER BY nodid;";
try {
  $a_nodres = mysqli_query($con, $v_qnode);
  // or 
  // die("Error description: " . mysqli_error($con));
}catch(mysqli_sql_exception $e){
  $a_nodres ='';
  echo '<br>Error:'.mysqli_error($con);
  die("Error description: " . mysqli_error($con));
}

$v_qmodule = "SELECT `modid` id, `modnm` nm 
              FROM `n_mast_module` 
              ORDER BY modid;";
try {
  $a_modres = mysqli_query($con, $v_qmodule);
}catch(mysqli_sql_exception $e){
  $a_modres ='';
  echo '<br>Error:'.mysqli_error($con);
}

$v_qrole = "SELECT `rolid` id, `rolnm` nm 
            FROM `n_mast_role_name` 
            ORDER BY rolid;";
try {
  $a_rolres = mysqli_query($con, $v_qrole);
}catch(mysqli_sql_exception $e){
  $a_rolres ='';
  echo '<br>Error:'.mysqli_error($con);
}
?>

<body>
<div class='container-fluid'>
 <div class="row">
  <div class="col-md-4">
    <div class="input-group p-2">
      <input type="text" name="search" id="te_role_src" class="form-control input-group-text" placeholder="Search...">
      <button type="button" class="btn btn-dark input-group-sm" onclick="searchAndHideTableRows('te_role_src')">
        <i class="bi-search"></i>
      </button>
    </div>
  </div>
  <div class="col-md-8">
    <div class="input-group p-2 input-group-sm d-flex justify-content-end"
      data-bs-toggle='modal' data-bs-target='#insertModal' 
      onclick="insert_data(0,'ins')">
    <span class="input-group-text text-light bg-dark">Add Role</span>
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
        <th class="td_text">Role ID</th>
        <th class="td_text">Role Name</th>
        <th class="td_text">Created By</th>
        <th class="td_text">Created On</th>
        <th class="td_act"></th>
      </tr>
    </thead>
    <tbody id='table-body'>
      <!-- Table rows will be added here dynamically -->
      <?php
        // Get role data
        $qmatrole = "SELECT * FROM `n_mast_role_name` WHERE `isdel` = 'N' ORDER BY `rolnm` ASC";
        try {
          $qmatroledata=mysqli_query($con,$qmatrole);
          $v_row_cnt = mysqli_num_rows($qmatroledata);
          if($v_row_cnt<=0){ 
          }else{
            $v_slno = 0;
            foreach($qmatroledata as $tritems){
              echo '<tr>';
              echo '<td class="td_text">'.$tritems["rolid"].'</td>';
              echo '<td class="td_text">'.$tritems["rolnm"].'</td>';
              echo '<td class="td_text">'.$tritems["crtby"].'</td>';
              echo '<td class="td_text">'.$tritems["crton"].'</td>';
              echo '<td class="td_act">';?>
                  <span onclick="update_data(<?=$tritems['rolid'];?>,'edt')"
                   data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-pencil-square"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span onclick="delete_data(<?=$tritems['rolid'];?>,'del')"
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
              Role Name
              <input type="hidden" name="rolid" id="hi_rolid">
            </span>
            <input type="text" class='form-control' id='te_rolnm' name="rolnm" required>
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
</script>
<?php 
 include('role_insert_data.php');
 include('role_fetch_data.php');
 include('role_update_data.php');
 include('role_delete_data.php');
 ?>
