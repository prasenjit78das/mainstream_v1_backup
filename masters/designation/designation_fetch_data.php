
<script>
/////
function fetchRecord(id) {  //alert(id);
  // Make an AJAX request to the server-side script to 
  //get the data for the selected record
  $.ajax({
    url: 'designation_getiddata.php',
    type: 'get',
    dataType: 'json',
    data: {desigid: id},
    success: function(response) { //alert(response);
      //alert('test');
      // The request was successful, update the form with the returned data
      $('#insertModal').modal('show');
      $('#te_designm').val(response[0].designm);
      $('#hi_desigid').val(id);              
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
