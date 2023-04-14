<script>
function insert_data(id,mode){ //'
  //alert(mode)
  $('#div_warn,.del_alert').hide();
  if(mode=='ins'){///insert data
    var blnk="";
    $('#te_modnm').val(blnk).removeAttr('disabled');
    $('#se_isact,#se_fsusr').removeAttr('disabled');
    $('#bu_btn').show().val('Add')
                .attr({'onclick':'insertRecord()','name':'su_add'});
    $('.modal-title').html('Add Module');
  }else{};
}

function insertRecord() {
  //alert('Clicked');
  // Get the values of the form fields
  var v_modid = $('#se_modid').val();
  var v_modnm = $('#te_modnm').val();
  var v_isact = $('#se_isact').val();
  var v_fsusr = $('#se_fsusr').val();
  var v_bu_btn = $('#bu_btn').val();
   // Add more variables for each form field
if((v_modnm!='')){
  $('#div_warn').hide();
  // Make an AJAX request to the server-side script
  $.ajax({
    url: 'module_post.php',
    type: 'post',
    data: {
      modnm: v_modnm,
      isact: v_isact,
      fsusr: v_fsusr,
      su_add: v_bu_btn,
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