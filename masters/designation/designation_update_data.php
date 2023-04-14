<script>
function update_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
  if(mode=='edt'){///update data
    $('#te_designm').removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit Designation');
    fetchRecord(id);
  }else{};
}
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