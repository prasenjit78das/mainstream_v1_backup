<script>
  function delete_data(id,mode){ //'
  //alert(mode)
  $('#div_warn').hide();
  if(mode=='del'){///delete data
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'f_del_conf("div_alert")'});
    $('.modal-title').html('Delete X-Name');
    fetchRecord(id);
    $('#se_nodid,#se_modid,#te_temnm,#se_rptto').attr('disabled',true);
  }else{};
}
  function deleteRecord() {
  // Get the values of the form fields
  var v_temid = $('#hi_temid').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'template_insup.php',
    type: 'post',
    data: {
      temid: v_temid,
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