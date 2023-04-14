
<script>
/////
function fetchRecord(id) {  //alert(id);
  //Make an AJAX request to the server-side script to 
  //get the data for the selected record
  $.ajax({
    url: 'module_getiddata.php',
    type: 'get',
    dataType: 'json',
    data: {modid: id},
    success: function(response) { //alert(response);
      //alert('test');
      // The request was successful, update the form with the returned data
      $('#insertModal').modal('show');
      $('#te_modid').val(response[0].modid);
      $('#te_modnm,#te_old_modnm').val(response[0].modnm); 
      $('#se_isact').val(response[0].isact); 
      $('#se_fsusr').val(response[0].fsusr);           
      // Add more form fields for each column in the table
      //alert('ttt');
    },
    error: function(response) {
      // The request failed, show an error message
      alert('Error: '+response.responseText);
    }
  });
}
///
</script>
