<?php 
$page_title='Designation Master';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
$i=0;

$v_qdesige = "SELECT `desigid` id, `designm` nm 
            FROM `n_mast_designation` 
            ORDER BY desigid;";
try {
  $a_desigres = mysqli_query($con, $v_qdesige);
}catch(mysqli_sql_exception $e){
  $a_desigres ='';
  die(mysqli_error($con));
}
?>

<body>
<div class='container-fluid'>
 <div class="row">
  <div class="col-md-4">
    <div class="input-group p-2">
      <input type="text" name="search" id="te_desig_src" class="form-control input-group-text" placeholder="Search...">
      <button type="button" class="btn btn-dark input-group-sm" onclick="searchAndHideTableRows('te_desig_src')">
        <i class="bi-search"></i>
      </button>
    </div>
  </div>
  <div class="col-md-8">
    <div class="input-group p-2 input-group-sm d-flex justify-content-end"
      data-bs-toggle='modal' data-bs-target='#insertModal' 
      onclick="insup_data(0,'ins')">
    <span class="input-group-text text-light bg-dark">Add Designation</span>
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
        <th class="td_text">Designation ID</th>
        <th class="td_text">Designation Name</th>
        <th class="td_text">Created By</th>
        <th class="td_text">Created On</th>
        <th class="td_act"></th>
      </tr>
    </thead>
    <tbody id='table-body'>
      <!-- Table rows will be added here dynamically -->
      <?php
        // Get material group data
        $qmatrole = "SELECT * FROM `n_mast_designation` WHERE `isdel` = 'N' ORDER BY `designm` ASC";
        try {
          $qmatroledata=mysqli_query($con,$qmatrole);
          $v_row_cnt = mysqli_num_rows($qmatroledata);
          if($v_row_cnt<=0){ 
          }else{
            $v_slno = 0;
            foreach($qmatroledata as $tritems){
              echo '<tr>';
              echo '<td class="td_text">'.$tritems["desigid"].'</td>';
              echo '<td class="td_text">'.$tritems["designm"].'</td>';
              echo '<td class="td_text">'.$tritems["crtby"].'</td>';
              echo '<td class="td_text">'.$tritems["crton"].'</td>';
              echo '<td class="td_act">';?>
                  <span onclick="insup_data(<?=$tritems['desigid'];?>,'edt')"
                   data-bs-toggle="modal" data-bs-target="#insertModal">
                    <i class="bi-pencil-square"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;
                  <span onclick="insup_data(<?=$tritems['desigid'];?>,'del')"
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
          die(mysqli_error($con));
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
              Designation Name
              <input type="hidden" name="desigid" id="hi_desigid">
            </span>
            <input type="text" class='form-control' id='te_designm' name="designm" required>
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
    $('#te_designm,#hi_desigid').val(blnk)
                .removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'insertRecord()','name':'su_add'});
    $('.modal-title').html('Add Designation');
  }
  else if(mode=='edt'){///update data
    $('#te_designm').removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit Designation');
    fetchRecord(id);
  }else if(mode=='del'){///delete data
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'deleteRecord()','name':'su_del'});
    $('.modal-title').html('Delete Designation');
    fetchRecord(id);
    $('#te_designm').attr('disabled',true);
  }
  $('#div_warn').hide();
}

  function insertRecord() {
  //alert('Clicked');
  // Get the values of the form fields
  var v_designm = $('#te_designm').val();
  var v_bu_btn = $('#bu_btn').val();
   // Add more variables for each form field
if((v_designm!='')){
  $('#div_warn').hide();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'designation_insup.php',
    type: 'post',
    data: {
      designm: v_designm,
      su_add: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        if(response==1062){
          $('#alert-text').html('Duplicate Designation exists! Cannot proceed.');
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
    url: 'designation_getiddata.php',
    type: 'get',
    dataType: 'json',
    data: {desigid: id},
    success: function(response) { //alert(response);
      //alert('test');
      // The request was successful, update the form with the returned data
      $('#insertModal').modal('show');
      $('#te_designm').val(response[0].designm);
      $('#hi_desigid').val(id);              
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
  var v_desigid = $('#hi_desigid').val();
  var v_designm = $('#te_designm').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  if((v_designm!='')){
  $.ajax({
    url: 'designation_insup.php',
    type: 'post',
    data: {
      desigid: v_desigid,
      designm: v_designm,
      su_edt: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        if(response==1062){
          $('#alert-text').html('Duplicate Designation exists! Cannot proceed.');
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
  var v_desigid = $('#hi_desigid').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'designation_insup.php',
    type: 'post',
    data: {
      desigid: v_desigid,
      su_del: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {//alert(response);
      if(response>0){ 
        $('#div_warn').show(); 
        $('input[name="su_del"]').hide();
        if(response==1062){
          $('#alert-text').html('Duplicate Designation exists! Cannot proceed.');
        }else if(response==1451){
          $('#alert-text').html('Child exists! Cannot delete.');
        }else if(response==9999){
          $('#alert-text').html('Deletion not allowed, designation(s)');
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

