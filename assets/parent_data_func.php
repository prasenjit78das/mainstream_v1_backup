<?php

// Construct the Role query for displaying designation 
$v_role_qr = "SELECT `rolid`,`rolnm` FROM `n_mast_role_name`";
// Execute the query
$a_rol_rslt = mysqli_query($con, $v_role_qr)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
$a_role_data = array();
while ($row = mysqli_fetch_assoc($a_rol_rslt)) {
    $a_role_data[] = $row;
}
// Return the data as JSON
$json_role= json_encode($a_role_data);

// Construct the node query for displaying Business Unit name
$v_qnode = "SELECT `nodid`,`nodnm`,`ntpid`,`pndid` FROM `mast_node`";
// Execute the query
$a_nodrlt = mysqli_query($con, $v_qnode)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
//$a_nodedata = mysqli_fetch_all($a_nodrlt, MYSQLI_ASSOC);
$a_nodedata = array();
while ($rownode = mysqli_fetch_assoc($a_nodrlt)) {
    $a_nodedata[] = $rownode;
}
// Return the data as JSON
$json_node= json_encode($a_nodedata);

// Construct the city query for displaying city name
$v_qcity = "SELECT `ctyid`,`ctynm`FROM `n_mast_city`";
// Execute the query
$a_ctyrlt = mysqli_query($con, $v_qcity)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
//$a_citydata = mysqli_fetch_all($a_ctyrlt, MYSQLI_ASSOC);
$a_citydata = array();
while ($rowcity = mysqli_fetch_assoc($a_ctyrlt)) {
    $a_citydata[] = $rowcity;
}
// Return the data as JSON
$json_city= json_encode($a_citydata);

// Construct the Employee query for displaying data related employee table 
$v_emp_qr = "SELECT * FROM `n_mast_emp`";
// Execute the query
$a_emp_rslt = mysqli_query($con, $v_emp_qr)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
//$a_emp_data = mysqli_fetch_all($a_emp_rslt, MYSQLI_ASSOC);
$a_emp_data = array();
while ($rowemp = mysqli_fetch_assoc($a_emp_rslt)) {
    $a_emp_data[] = $rowemp;
}
// Return the data as JSON
$json_emp= json_encode($a_emp_data);

// Construct the node query for displaying department name
$v_qdept = "SELECT `nodid`,`nodnm`,`ntpid`,`pndid` 
            FROM `mast_node` 
            WHERE `ntpid` = '3'
            ORDER BY `nodnm` ='ASC' ";
// Execute the query
$a_deptrlt = mysqli_query($con, $v_qdept)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
//$a_deptdata = mysqli_fetch_all($a_deptrlt, MYSQLI_ASSOC);
$a_deptdata = array();
while ($rowdept = mysqli_fetch_assoc($a_deptrlt)) {
    $a_deptdata[] = $rowdept;
}
// Return the data as JSON
$json_dept= json_encode($a_deptdata);

// Construct the Menu query 
$v_menu_qr = "SELECT * FROM `n_mast_menu`";
// Execute the query
$a_menu_rslt = mysqli_query($con, $v_menu_qr)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
//$a_menu_data = mysqli_fetch_all($a_menu_rslt, MYSQLI_ASSOC);
$a_menu_data = array();
while ($rowmenu = mysqli_fetch_assoc($a_menu_rslt)) {
    $a_menu_data[] = $rowmenu;
}
// Return the data as JSON
$json_menu= json_encode($a_menu_data);

// Construct the Designation query 
$v_desig_qr = "SELECT * FROM `n_mast_designation`";
// Execute the query
$a_desig_rslt = mysqli_query($con, $v_desig_qr)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
//$a_desig_data = mysqli_fetch_all($a_desig_rslt, MYSQLI_ASSOC);
$a_desig_data = array();
while ($rowdesig = mysqli_fetch_assoc($a_desig_rslt)) {
    $a_desig_data[] = $rowdesig;
}
// Return the data as JSON
$json_desig= json_encode($a_desig_data);

// Construct the Module query 
$v_mod_qr = "SELECT `modid`, `modnm` FROM `n_mast_module`";
// Execute the query
$a_mod_rslt = mysqli_query($con, $v_mod_qr)or
die('Error:'.mysqli_error($con));
// Fetch the data into an array
//$a_mod_data = mysqli_fetch_all($a_mod_rslt, MYSQLI_ASSOC);
$a_mod_data = array();
while ($rowmod = mysqli_fetch_assoc($a_mod_rslt)) {
    $a_mod_data[] = $rowmod;
}
// Return the data as JSON
$json_mod= json_encode($a_mod_data);
?>