<script>
  function delete_data(id,mode){ //'
  //alert(mode)
  $('#div_warn').hide();
    if(mode=='del'){///delete data
    $('#bu_btn').show().val('Save')
                       .attr({'onclick':'f_del_conf("div_alert")'});
    $('.modal-title').html('Delete Designation');
    fetchRecord(id);
    $('#te_designm').attr('disabled',true);
  }else{};
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
      if(response!=''){ 
        $('#div_warn').show();
        $('#alert-text').html(response); 
        $('input[name="su_del"]').hide();
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