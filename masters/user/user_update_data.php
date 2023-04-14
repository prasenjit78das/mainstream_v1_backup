<script>
function update_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
  if(mode=='edt'){///update data
    $('#se_empid,#pa_user_pwd,#te_user_nm,#hi_user_id,#te_dev1_id,#te_dev2_id').removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit User');
    fetchRecord(id);
  }else{};
}
  ///
function updateRecord() {
  // Get the values of the form fields
  var v_user_id = $('#hi_user_id').val();
  var v_user_nm = $('#te_user_nm').val();
  var v_user_pwd = $('#pa_user_pwd').val();
  var v_dev1_id = $('#te_dev1_id').val();
  var v_dev2_id = $('#te_dev2_id').val();
  var v_empid = $('#se_empid').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  if((v_user_nm!='')&&(v_user_pwd!='')&&(v_empid!='')){
  $.ajax({
    url: 'user_insup.php',
    type: 'post',
    data: {
      user_id: v_user_id,
      user_nm: v_user_nm,
      user_pwd: v_user_pwd,
      empid:v_empid,
      dev1_id: v_dev1_id,
      dev2_id: v_dev2_id,
      su_edt: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        $('#alert-text').html(response);
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