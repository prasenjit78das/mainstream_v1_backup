<?php 
$page_title='Template Master';
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
}catch(mysqli_sql_exception $e){
  $a_nodres ='';
  echo '<br>Error:'.mysqli_error($con);
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

$v_qteme = "SELECT `temid` id, `temnm` nm 
            FROM `n_mast_template` 
            ORDER BY temid;";
try {
  $a_temres = mysqli_query($con, $v_qteme);
}catch(mysqli_sql_exception $e){
  $a_temres ='';
  echo '<br>Error:'.mysqli_error($con);
}
?>

<body>
<div class='container-fluid'>
 <div class="row">
  <div class="col-md-4">
    <div class="input-group p-2">
      <input type="text" name="search" id="te_tem_src" class="form-control input-group-text" placeholder="Search...">
      <button type="button" class="btn btn-dark input-group-sm" onclick="searchAndHideTableRows('te_tem_src')">
        <i class="bi-search"></i>
      </button>
    </div>
  </div>
  <div class="col-md-8">
    <div class="input-group p-2 input-group-sm d-flex justify-content-end"
      data-bs-toggle='modal' data-bs-target='#insertModal' 
      onclick="insert_data(0,'ins')">
    <span class="input-group-text text-light bg-dark">Add X-Name</span>
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
        <th class="td_text">Template ID</th>
        <th class="td_text">Template Name</th>
        <th class="td_text">Created By</th>
        <th class="td_text">Created On</th>
        <th class="td_act"></th>
      </tr>
    </thead>
    <tbody id='table-body'>
      <!-- Table rows will be added here dynamically -->
      <?php
        // Get material group data
        $qmatrole = "SELECT * FROM `n_mast_template` WHERE `isdel` = 'N' ORDER BY `temnm` ASC";
        try {
          $qmatroledata=mysqli_query($con,$qmatrole);
          $v_row_cnt = mysqli_num_rows($qmatroledata);
          if($v_row_cnt<=0){ 
          }else{
            $v_slno = 0;
            foreach($qmatroledata as $tritems){
              echo '<tr>';
              echo '<td class="td_text">'.$tritems["temid"].'</td>';
              echo '<td class="td_text">'.$tritems["temnm"].'</td>';
              echo '<td class="td_text">'.$tritems["crtby"].'</td>';
              echo '<td class="td_text">'.$tritems["crton"].'</td>';
              echo '<td class="td_act">';?>
                  <span onclick="update_data(<?=$tritems['temid'];?>,'edt')"
                   data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-pencil-square"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span onclick="delete_data(<?=$tritems['temid'];?>,'del')"
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
              Template Name
              <input type="hidden" name="temid" id="hi_temid">
            </span>
            <input type="text" class='form-control' id='te_temnm' name="temnm" required>
          </div>
        </form>
      </div>
      <!-- Modal footer -->
      <div class='modal-footer'id='div_alert'>
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
 include('template_insert_data.php');
 include('template_fetch_data.php');
 include('template_update_data.php');
 include('template_delete_data.php');
 ?>


