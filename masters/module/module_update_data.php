<script>
function update_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
  if(mode=='edt'){///update data
    $('#te_modnm,#se_isact,#se_fsusr').removeAttr('disabled');
    $('#bu_btn').show().val('Update')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit Module');
    fetchRecord(id);
  }else{};
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
</script>