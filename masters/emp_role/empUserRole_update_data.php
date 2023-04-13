<script>
function update_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
if(mode=='edt'){///update data
    $('#se_empid,#se_user_id,#se_rolid').removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit Emp-User-Role');
    fetchRecord(id);
  }else{};
}
  function updateRecord() {
  // Get the values of the form fields
  var v_eurid = $('#hi_eurid').val();
  var v_empid = $('#se_empid').val();
  var v_user_id = $('#se_user_id').val();
  var v_rolid = $('#se_rolid').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  if((v_empid!='')&&(v_user_id!='')&&(v_rolid!='')){
  $.ajax({
    url: 'empUserRole_insup.php',
    type: 'post',
    data: {
      eurid: v_eurid,
      empid: v_empid,
      user_id: v_user_id,
      rolid: v_rolid,
      su_edt: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        if(response==1062){
          $('#alert-text').html('Duplicate Emp-User-Role exists! Cannot proceed.');
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
</script>