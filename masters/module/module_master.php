<?php 
$page_title='Module Master';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
$i=0;
?>

<body>
<div class='container-fluid'>
 <div class="row">
  <div class="col-md-4">
    <div class="input-group p-2">
      <input type="text" name="search" id="te_module_src" class="form-control input-group-text" placeholder="Search...">
      <button type="button" class="btn btn-dark input-group-sm" 
        onclick="searchAndHideTableRows('te_module_src')">
        <i class="bi-search"></i>
      </button>
    </div>
  </div>
  <div class="col-md-8">
    <div class="input-group p-2 input-group-sm d-flex justify-content-end"
      data-bs-toggle='modal' data-bs-target='#insertModal' 
      onclick="insert_data(0,'ins')">
      <span class="input-group-text text-light bg-dark">Add Module</span>
      <button type='button' class='btn btn-light border border-3'>+</button>
    </div>
  </div>
 </div>
</div>
<div class='container-fluid cls_data_area'>
 <!-- Table -->
  <div class='table-responsive'>
   <table class='table table-striped'>
    <thead class="sticky-top">
        <th class="td_text">Module ID</th>
        <th class="td_text">Module Name</th>
        <th class="td_text">Active</th>
        <th class="td_text">Only for SuperUsers</th>
        <th class="td_text">Created By</th>
        <th class="td_text">Created On</th>
        <th class="td_act"></th>
    </thead>
    <tbody id='table-body'>
      <!-- Table rows will be added here dynamically -->
      <?php
        // Get module data
        $qmatmodul = "SELECT * FROM `n_mast_module` ORDER BY `modnm` ASC";
        try {
          $qmatmoduldata=mysqli_query($con,$qmatmodul);
          $v_row_cnt = mysqli_num_rows($qmatmoduldata);
          if($v_row_cnt<=0){ 
          }else{
            $v_slno = 0;
            foreach($qmatmoduldata as $tritems){
              echo '<tr>';
              echo '<td class="td_text">'.$tritems["modid"].'</td>';
              echo '<td class="td_text">'.$tritems["modnm"].'</td>';
              echo '<td class="td_text">'.f_get_req_condition($tritems["isact"]).'</td>';
              echo '<td class="td_text">'.f_get_req_condition($tritems["fsusr"]).'</td>';
              echo '<td class="td_text">'.$tritems["crtby"].'</td>';
              echo '<td class="td_text">'.$tritems["crton"].'</td>';
              echo '<td class="td_act">';?>
                  <span onclick="update_data(<?=$tritems['modid'];?>,'edt')" 
                    data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-pencil-square"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span onclick="delete_data(<?=$tritems['modid'];?>,'del')"
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
<div class='container-fluid'>

</div>
 <?php 
require_once('../../footer.php');
?>
<!-- to close the display and action of export to excel -->
<style>  
.buttons-csv{
    border:0pt;
    background-color:aliceblue;
    pointer-events:none;
    }
</style> 
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
            <input name='modid' type='hidden' id='te_modid'>
            <span class="input-group-text text-primary" style="width:140pt;">
              Module Name
            </span>
            <input type="text" class='form-control' id='te_modnm' name="modnm" required>
            <input type="hidden" class="form-control"  name="old_modnm" id="te_old_modnm">
          </div>
          <div class="input-group mb-3 input-group-sm" id="div_isact">
            <span class="input-group-text text-primary" style="width:140pt;">Active ?</span>
            <select id="se_isact" name="isact" class="form-control"  required>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="input-group mb-3 input-group-sm" id="div_fsusr">
            <span class="input-group-text text-primary" style="width:140pt;">Only for SuperUsers?</span>
            <select id="se_fsusr" name="fsusr" class="form-control"  required>
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
          <!-- Add more form fields for each column in the table -->
        </form>
      </div>
      <!-- Modal footer -->
      <div class='modal-footer' id="div_alert">
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
 include('module_insert_data.php');
 include('module_fetch_data.php');
 include('module_update_data.php');
 include('module_delete_data.php');
 ?>