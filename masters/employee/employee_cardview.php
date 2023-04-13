
<div class="row" id="div-view">
<?php
$v_dsgnm='';
$v_ctynm ='';
$v_ofcont ='';
$v_oemail ='';
// Query the database
$result = mysqli_query($con,$v_query);
// Loop through the result set
while($row = mysqli_fetch_array($result)) {
  $v_empid=$row['empid'];
  $v_phlnk=$row['phlnk'];
  $v_dsgid=$row['dsgid'];
  $v_oemail=$row['oemail'];
  if(empty($v_oemail)){$v_oemail='-';}
  else{$v_oemail=$v_oemail;}
  $v_ofcont=$row['ofcont'];
  if(empty($v_ofcont)){$v_ofcont='-';}
  else{$v_ofcont=$v_ofcont;}
    // Get Designations data
    foreach ($a_role_array as $roledata) {
      if ($roledata['rolid'] == $v_dsgid) {
        $v_dsgnm=$roledata["rolnm"];
        }
    } 
  $v_dptid=$row['dptid'];
  if($v_dptid!='0'){
    // // Get Department data
    foreach ($a_node_array as $nodedata) {
      if ($nodedata['nodid'] == $v_dptid) {
        $v_dptnm = $nodedata['nodnm'];
        }
    }  
  }else{
    $v_dptnm='-';
  }
  $v_ctown=$row['ctown'];
    // Get City data
    foreach ($a_city_array as $citydata) {
      if ($citydata['ctyid'] == $v_ctown) {
        $v_ctynm=$citydata["ctynm"];
        }
    } 
  if($v_phlnk!=''){
    $v_src=$v_phlnk;
  }
  else{
    $v_src='../../assets/images/img_avatar1.png';
  }?>
    <div class="col-md-2 cards">
      <div class="card">
        <div class="shadow card-body" style="text-align:center;">
          <img class="card-img-top rounded-circle img-thumbnail" 
                  style="max-height:80pt;width:80pt;" src="<?=$v_src;?>" alt="Card image">
          <h6 class="card-title"><?php echo $row['ftnam'].' '.$row['mdnam'].' '.$row['ltnam'];?></h6>
           <p class="card-text">
            <div><?=$v_ofcont?></div>
            <div><?=$v_oemail?></div>
            <div><?=$v_dptnm?></div>
          </p>
            <div class="d-flex justify-content-center">
                <span onclick="view_emp('employee_view.php','empid',<?=$v_empid;?>,'view')">
                  <i class="bi-eye"></i>
                </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span onclick="view_emp('employee_form.php','empid',<?=$v_empid;?>,'edit')">
                  <i class="bi-pencil-square"></i>
                </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span onclick="view_emp('employee_form.php','empid',<?=$v_empid;?>,'delete')">
                  <i class="bi-trash"></i>
                </span>
            </div>
          </div>
         </div>
       </div>
<?php
}
function f_get_nm_from_id($v_id, $a_data)
{
  if(empty($a_data)){
    return "";
  }
  mysqli_data_seek($a_data,0);
  while($a_row = mysqli_fetch_array($a_data)){
    if($v_id==$a_row['id']){
      return $a_row['nm'];
    }
  }
  return "";
}
?>
</div>