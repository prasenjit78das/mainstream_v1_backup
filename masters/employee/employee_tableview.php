
   <table class="table table-striped">
      <thead>
        <th>Pictures</th>
        <th>Name</th>
        <th>Work Place</th>
        <th>Email</th>
        <th>Department</th>
        <th></th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
<?php
$v_dptnm=0;
// Query the database
$result = mysqli_query($con,$v_query);
// Loop through the result set
while($row = mysqli_fetch_array($result)) {
$v_empid=$row['empid'];
$v_phlnk=$row['phlnk'];
$v_dptid=$row['dptid'];
  if($v_dptid!='0'){
    // // Get Department data
    foreach ($a_node_array as $nodedata) {
      if ($nodedata['nodid'] == $v_dptid) {
        $v_dptnm = $nodedata['nodnm'];
        }
    }  
  }else{
    $v_dptnm='';
  }

if($v_phlnk!=''){
  $v_src=$v_phlnk;
}
else{
  $v_src='../../assets/images/img_avatar1.png';
}
echo '<tr style="vertical-align:middle;"><td>';
echo '<img class="img-thumbnail" style="max-height:30pt;width:30pt;"
        src="'.$v_src.'" alt="Card image">';
  echo '</td><td>';
  echo '<span class="m-2">' . $row['ftnam'].' '.$row['mdnam'].' '.$row['ltnam']. '</span>';
  echo '</td><td>';
  echo '<span class="m-2">' . $row['ofcont'] . '</span>';
  echo '</td><td>';
  echo '<span class="m-2">' . $row['oemail'] . '</span>';
  echo '</td><td>';
  echo '<span class="m-2">' . $v_dptnm. '</span>';
  echo '</td>';
  ?>
        <td>
          <span onclick="view_emp('employee_view.php','empid',<?=$v_empid;?>,'view')">
            <i class="bi-eye"></i>  
          </span>
        </td>
        <td>
          <span onclick="view_emp('employee_form.php','empid',<?=$v_empid;?>,'edit')">
            <i class="bi-pencil-square"></i>     
          </span>
        </td>
        <td>
          <span onclick="view_emp('employee_form.php','empid',<?=$v_empid;?>,'delete')">
            <i class="bi-trash"></i>
          </span>
        </td>
 <?php 
 echo '</tr>
 </tbody>';
 
            
}
echo '</table>'
?>