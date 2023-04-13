<?php
// Connect to the database
require_once('../../connec/connect.php');
// Get the nodid parameter
$v_modid = mysqli_real_escape_string($con, $_GET['modid']);
//echo '<br>'.$v_nodid.'<br>';
// Construct the SELECT query
$query = "SELECT * FROM `n_mast_module` 
                   WHERE `modid` = '$v_modid'";
// Execute the query
$result = mysqli_query($con, $query);

// Check the result
if (!$result) {
  // The query failed, show an error message
  echo 'Error: '.mysqli_error($con);
  exit();
}

// Fetch the data into an array
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Return the data as JSON
echo json_encode($data);

// Close the connection
mysqli_close($con);

?>