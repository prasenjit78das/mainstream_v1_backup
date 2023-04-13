<script>
function update_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
if(mode=='edt'){///update data
    $('#te_temnm').removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'updateRecord()','name':'su_edt'});
    $('.modal-title').html('Edit X-Name');
    fetchRecord(id);
  }else{};
}
  function updateRecord() {
  // Get the values of the form fields
  var v_temid = $('#hi_temid').val();
  var v_temnm = $('#te_temnm').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  if((v_temnm!='')){
  $.ajax({
    url: 'template_insup.php',
    type: 'post',
    data: {
      temid: v_temid,
      temnm: v_temnm,
      su_edt: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        if(response==1062){
          $('#alert-text').html('Duplicate X-Name exists! Cannot proceed.');
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