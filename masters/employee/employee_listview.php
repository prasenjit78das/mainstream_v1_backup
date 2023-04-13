

<?php
// echo '<li class="list-group-item">';
// echo '<span>Picture</span>';
// echo '</li>'; 
// Query the database
$result = mysqli_query($con,$v_query);
// Loop through the result set
while($row = mysqli_fetch_array($result)) {
$v_empid=$row['empid'];
$v_phlnk=$row['phlnk'];
$v_dsgid=$row['dsgid'];
  // Get Designations data
  $v_qdsg = "SELECT `rolnm` FROM `n_mast_role` ".
                " WHERE `rolid`='$v_dsgid';";
  $a_qdsgdata=mysqli_query($con,$v_qdsg);
  foreach($a_qdsgdata as $a_dsgitems){
    $v_rolnm=$a_dsgitems["rolnm"];
  }
$v_ctown=$row['ctown'];
  // Get city data
  $v_qcity = "SELECT `ctynm` FROM `n_mast_city` ".
                " WHERE `ctyid`='$v_ctown';";
  $a_qcitydata=mysqli_query($con,$v_qcity);
  foreach($a_qcitydata as $a_cityitems){
    $v_ctynm =$a_cityitems["ctynm"];
  }
if($v_phlnk!=''){
  $v_src=$v_phlnk;
}
else{
  $v_src='../assets/images/img_avatar1.png';
}
echo '<li class="list-group-item">';
echo '<img class="img-thumbnail" style="max-height:60pt;width:60pt;"
        src="'.$v_src.'" alt="Card image">';
  echo '<span class="m-2">' . $row['ftnam'].' '.$row['mdnam'].''.$row['ltnam']. '</span>';
    echo '<span class="m-2">' . $row['ofcont'] . '</span>';
    echo '<span>' . $row['crton'] . '</span>';
    echo '<span>';
      echo '<div class="d-flex justify-content-end">';?>
              <span onclick="view_emp('employee_form.php','empid',<?=$v_empid;?>,'view')">
                <i class="by-eye"></i>
              </span>&nbsp;&nbsp;&nbsp;
              <span onclick="view_emp('employee_form.php','empid',<?=$v_empid;?>,'edit')">
                <i class="by-pencil-square"></i>   
              </span>&nbsp;&nbsp;&nbsp;
              <span onclick="view_emp('employee_form.php','empid',<?=$v_empid;?>,'delete')">
                <i class="by-trash"></i>
              </span>
<?php echo '</div>';
  echo '</span>';
echo '</li>';                  
}
?>