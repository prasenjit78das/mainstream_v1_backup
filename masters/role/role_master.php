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
      onclick="insup_data(0,'ins')">
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
                  <span onclick="insup_data(<?=$tritems['rolid'];?>,'edt')"
                   data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-pencil-square"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span onclick="insup_data(<?=$tritems['rolid'];?>,'del')"
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
    $('#te_rolnm,#hi_rolid').val(blnk)
                .removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'insertRecord()','name':'su_add'});
    $('.modal-title').html('Add Role');
  }
  else if(mode=='edt'){///update data
    $('#te_rolnm').removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit Role');
    fetchRecord(id);
  }else if(mode=='del'){///delete data
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'deleteRecord()','name':'su_del'});
    $('.modal-title').html('Delete Role');
    fetchRecord(id);
    $('#te_rolnm').attr('disabled',true);
  }
  $('#div_warn').hide();
}

  function insertRecord() {
  //alert('Clicked');
  // Get the values of the form fields
  var v_rolnm = $('#te_rolnm').val();
  var v_bu_btn = $('#bu_btn').val();
   // Add more variables for each form field
if((v_rolnm!='')){
  $('#div_warn').hide();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'role_insup.php',
    type: 'post',
    data: {
      rolnm: v_rolnm,
      su_add: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        if(response==1062){
          $('#alert-text').html('Duplicate Role exists! Cannot proceed.');
        }else{
          $('#alert-text').html(response);
        }
      }
      else if(response==''){
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
  // Make an AJAX request to the server-side script to 
  //get the data for the selected record
  $.ajax({
    url: 'role_getiddata.php',
    type: 'get',
    dataType: 'json',
    data: {rolid: id},
    success: function(response) { //alert(response);
      //alert('test');
      // The request was successful, update the form with the returned data
      $('#insertModal').modal('show');
      $('#te_rolnm').val(response[0].rolnm);
      $('#hi_rolid').val(id);              
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
  var v_rolid = $('#hi_rolid').val();
  var v_rolnm = $('#te_rolnm').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  if((v_rolnm!='')){
  $.ajax({
    url: 'role_insup.php',
    type: 'post',
    data: {
      rolid: v_rolid,
      rolnm: v_rolnm,
      su_edt: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        if(response==1062){
          $('#alert-text').html('Duplicate Role exists! Cannot proceed.');
        }else{
          $('#alert-text').html(response);
        }
      }
      else if(response==''){
      // Update was successful, close the modal and refresh the table
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
  var v_rolid = $('#hi_rolid').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'role_insup.php',
    type: 'post',
    data: {
      rolid: v_rolid,
      su_del: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {//alert(response);
      if(response>0){ 
        $('#div_warn').show(); 
        $('input[name="su_del"]').hide();
        if(response==1062){
          $('#alert-text').html('Duplicate Role exists! Cannot proceed.');
        }else if(response==1451){
          $('#alert-text').html('Child exists! Cannot delete.');
        }else if(response==9999){
          $('#alert-text').html('Deletion not allowed, role(s) exists reporting to this role');
        }  
      }else if(response==0){
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

