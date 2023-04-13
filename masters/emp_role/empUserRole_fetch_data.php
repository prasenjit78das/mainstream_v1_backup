
<script>
function fetchRecord(id) {  //alert(id);
  // Make an AJAX request to the server-side script to 
  //get the data for the selected record
  $.ajax({
    url: 'empUserRole_getiddata.php',
    type: 'get',
    dataType: 'json',
    data: {eurid: id},
    success: function(response) { //alert(response);
      //alert('test');
      // The request was successful, update the form with the returned data
      $('#insertModal').modal('show');
      $('#se_empid').val(response[0].empid);
      $('#se_user_id').val(response[0].User_id);
      $('#se_rolid').val(response[0].rolid);
      $('#hi_eurid').val(id);              
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
