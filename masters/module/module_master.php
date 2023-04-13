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
      onclick="insup_data(0,'ins')">
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
                  <span onclick="insup_data(<?=$tritems['modid'];?>,'edt')" 
                    data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-pencil-square"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span onclick="insup_data(<?=$tritems['modid'];?>,'del')"
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
<script>
// To implement Export to CSV and ordering table
$(document).ready(function() {
  $('#tbl_sm').dataTable({
    dom: 'lBfrtip',
    buttons: [
      {
        extend: 'csvHtml5',
        exportOptions: {
            columns: [0]
        },
        text: ''
      }            
    ],
    order: [[0, 'asc']]
  });
});
</script>
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
      <div class='modal-footer'>
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
function insup_data(id,mode){ //'
  //alert(mode)
  if(mode=='ins'){///insert data
    var blnk="";
    $('#te_modnm').val(blnk).removeAttr('disabled');
    $('#se_isact,#se_fsusr').removeAttr('disabled');
    $('#bu_btn').show().val('Add')
                .attr({'onclick':'insertRecord()','name':'su_add'});
    $('.modal-title').html('Add Module');
  }
  else if(mode=='edt'){///update data
    $('#te_modnm,#se_isact,#se_fsusr').removeAttr('disabled');
    $('#bu_btn').show().val('Update')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit Module');
    fetchRecord(id);
  }
  else if(mode=='del'){///delete data
    $('#bu_btn').show().val('Delete')
                .attr({'onclick':'deleteRecord()','name':'su_del'});
    $('.modal-title').html('Delete Module');
    fetchRecord(id);
    $('#te_modnm,#se_isact,#se_fsusr').attr('disabled',true);
  }
  $('#div_warn').hide();
}

function insertRecord() {
  //alert('Clicked');
  // Get the values of the form fields
  var v_modid = $('#se_modid').val();
  var v_modnm = $('#te_modnm').val();
  var v_isact = $('#se_isact').val();
  var v_fsusr = $('#se_fsusr').val();
  var v_bu_btn = $('#bu_btn').val();
   // Add more variables for each form field
if((v_modnm!='')){
  $('#div_warn').hide();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'module_post.php',
    type: 'post',
    data: {
      modnm: v_modnm,
      isact: v_isact,
      fsusr: v_fsusr,
      su_add: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        $('#alert-text').html(response);
      }else{
        // Insert was successful, close the modal and refresh the table
        $('#insertModal').modal('hide');
        refreshTable();
      }  
    },
    error: function(response) {
      // Insert failed, show an error message
      alert('Insert failed');
    }
  });
  }else{
    $('#div_warn').show();
    $('#alert-text').html('Please fill up mandatory fields !!');
  }
}
/////
function refreshTable() {
  //alert('refresh');
  location.reload();
}
/////
function fetchRecord(id) {  //alert(id);
  //Make an AJAX request to the server-side script to 
  //get the data for the selected record
  $.ajax({
    url: 'module_getiddata.php',
    type: 'get',
    dataType: 'json',
    data: {modid: id},
    success: function(response) { //alert(response);
      //alert('test');
      // The request was successful, update the form with the returned data
      $('#insertModal').modal('show');
      $('#te_modid').val(response[0].modid);
      $('#te_modnm,#te_old_modnm').val(response[0].modnm); 
      $('#se_isact').val(response[0].isact); 
      $('#se_fsusr').val(response[0].fsusr);           
      // Add more form fields for each column in the table
      //alert('ttt');
    },
    error: function(response) {
      // The request failed, show an error message
      alert('Error: '+response.responseText);
    }
  });
}
///
function updateRecord() {
  // Get the values of the form fields
  var v_modid = $('#te_modid').val();
  var v_modnm = $('#te_modnm').val();
  var v_old_modnm = $('#te_old_modnm').val();
  var v_isact = $('#se_isact').val();
  var v_fsusr = $('#se_fsusr').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  if((v_modid!='')&&(v_modnm!='')){
  $.ajax({
    url: 'module_post.php',
    type: 'post',
    data: {
      modid: v_modid,
      modnm: v_modnm,
      old_modnm: v_old_modnm,
      isact: v_isact,
      fsusr: v_fsusr,
      su_edt: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        $('#alert-text').html(response);
      }else{
        // Insert was successful, close the modal and refresh the table
        $('#insertModal').modal('hide');
        refreshTable();
      }  
    },
    error: function(response) {
      // Update failed, show an error message
      alert('Update failed');
    }
   });
  }else{
    $('#div_warn').show();
    $('#alert-text').html('Please fill up mandatory fields !!');
  }
}
///
function deleteRecord() {
  // Get the values of the form fields
  var v_modid = $('#te_modid').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'module_post.php',
    type: 'post',
    data: {
      modid: v_modid,
      su_del: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {//alert(response);
      if(response!=''){ 
        $('#div_warn').show(); 
        $('input[name="su_del"]').hide(); 
        $('#alert-text').html(response);
      }else if(response==''){
        //close the modal and refresh the table
        $('#insetModal').modal('hide');
        refreshTable();
      }
    },
    error: function(response) {
      // Update failed, show an error message
      alert('Delete failed');
    }
  });
}

</script>

<?php
  function f_get_req_condition($v_cond){
    if($v_cond==0){
      return ('No');
    }
    else if($v_cond==1){
      return('Yes');
    }
    else{
      return ('Unknown');
    }
}
?>
