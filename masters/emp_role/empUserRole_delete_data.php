<script>
  function delete_data(id,mode){ //'
  //alert(mode)
  $('#div_warn').hide();
    if(mode=='del'){///delete data
    $('#bu_btn').show().val('Save')
                       .attr({'onclick':'f_del_conf("div_alert")'});
    $('.modal-title').html('Delete Emp-User-Role');
    fetchRecord(id);
    $('#se_empid,#se_user_id,#se_rolid').attr('disabled',true);
  }else{};
}
//'onclick':'deleteRecord()',
  function deleteRecord() {
  // Get the values of the form fields
  var v_eurid = $('#hi_eurid').val();
  var v_bu_btn = $('#bu_btn').val();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'empUserRole_insup.php',
    type: 'post',
    data: {
      eurid: v_eurid,
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