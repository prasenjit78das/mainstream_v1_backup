<script>
function insert_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
  if(mode=='ins'){///insert data
    var blnk="";
    $('#te_rolnm,#hi_rolid').val(blnk)
                .removeAttr('disabled');
    $('#bu_btn').show().val('Save')
                .attr({'onclick':'insertRecord()','name':'su_add'});
    $('.modal-title').html('Add Role');
  }else{};
}
  
function insertRecord() {
  //alert('Clicked');
  // Get the values of the form fields
  var v_rolnm = $('#te_rolnm').val();
  var v_bu_btn = $('#bu_btn').val();
   // Add more variables for each form field
if((v_rolnm!='')){
  $('#div_warn').hide();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'role_insup.php',
    type: 'post',
    data: {
      rolnm: v_rolnm,
      su_add: v_bu_btn,
    },
    // Add more data for each form field
    success: function(response) {
      //alert(response);
      if(response!=''){
        $('#div_warn').show();
        $('#alert-text').html(response);
      } else if(response==''){
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