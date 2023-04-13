<?php
// Connect to the database
require_once('../../connec/connect.php');
// Get the nodid parameter
$v_user_id = mysqli_real_escape_string($con, $_GET['user_id']);
//echo '<br>'.$v_nodid.'<br>';
// Construct the SELECT query
$query = "SELECT * FROM `n_mast_user` 
                   WHERE `user_id` = '$v_user_id'";
// Execute the query
$result = mysqli_query($con, $query) or
die("Error description: " . mysqli_error($con));

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