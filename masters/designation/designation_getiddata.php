<?php
// Connect to the database
require_once('../../connec/connect.php');
// Get the nodid parameter
$v_desigid = mysqli_real_escape_string($con, $_GET['desigid']);
//echo '<br>'.$v_nodid.'<br>';
// Construct the SELECT query
$query = "SELECT * FROM `n_mast_designation` 
                   WHERE `desigid` = '$v_desigid'";
// Execute the query
$result = mysqli_query($con, $query)or
  // The query failed, die and show an error message
die('Error: '.mysqli_error($con));

// Fetch the data into an array
//$a_desigdata = mysqli_fetch_all($result, MYSQLI_ASSOC);
$a_desigdata = array();
while ($rowdesig = mysqli_fetch_assoc($result )) {
  $a_desigdata[] = $rowdesig;
}

// Return the data as JSON
echo json_encode($a_desigdata);
// Close the connection
mysqli_close($con);
?>