
<script>
function fetchRecord(id) {  //alert(id);
  // Make an AJAX request to the server-side script to 
  //get the data for the selected record
  $.ajax({
    url: 'user_getiddata.php',
    type: 'get',
    dataType: 'json',
    data: {user_id: id},
    success: function(response) { //alert(response);
      //alert('test');
      // The request was successful, update the form with the returned data
      $('#insertModal').modal('show');
      $('#te_user_nm').val(response[0].user_nm);
      $('#te_user_pwd').val(response[0].user_pwd);
      $('#se_empid').val(response[0].empid);
      $('#te_dev1_id').val(response[0].dev1_id);
      $('#te_dev2_id').val(response[0].dev2_id);
      $('#hi_user_id').val(id);              
      // Add more form fields for each column in the table
      //alert('ttt');
    },
    error: function(response) {
      // The request failed, show an error message
      alert('Error: '+response.responseText);
    }
  });
}

</script>
