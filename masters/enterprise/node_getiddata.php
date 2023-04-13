<?php
// Connect to the database
require_once('../../connec/connect.php');
// Get the nodid parameter
$v_nodid = mysqli_real_escape_string($con, $_GET['nodid']);
//echo '<br>'.$v_nodid.'<br>';
// Construct the SELECT query
$query = "SELECT * FROM `mast_node` 
                   WHERE `nodid` = '$v_nodid'";
// Execute the query
$result = mysqli_query($con, $query);

// Check the result
if (!$result) {
  // The query failed, show an error message
  echo 'Error: '.mysqli_error($con);
  exit();
}

// Fetch the data into an array
//$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data = array();
while ($rowd = mysqli_fetch_assoc($result)) {
    $data[] = $rowd;
}
// Return the data as JSON
echo json_encode($data);

// Close the connection
mysqli_close($con);

?>