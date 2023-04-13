<script>
function insert_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
if(mode=='ins'){///insert data
  var blnk="";
    $('#se_empid,#se_user_id,#se_rolid,#hi_eurid').val(blnk)
                .removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'insertRecord()','name':'su_add'});
    $('.modal-title').html('Add Emp-User-Role');
  }else{};
}
  function insertRecord() {
  //alert('Clicked');
  // Get the values of the form fields
  var v_empid = $('#se_empid').val();
  var v_user_id = $('#se_user_id').val();
  var v_rolid = $('#se_rolid').val();
  var v_bu_btn = $('#bu_btn').val();
   // Add more variables for each form field
if((v_empid!='')&&(v_user_id!='')&&(v_rolid!='')){
  $('#div_warn').hide();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'empUserRole_insup.php',
    type: 'post',
    data: {
      empid: v_empid,
      user_id: v_user_id,
      rolid: v_rolid,
      su_add: v_bu_btn,
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
</script>