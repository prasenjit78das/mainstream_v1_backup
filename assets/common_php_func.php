<?php
//echo 'Common PHP function';
///function to capture error no and description
function f_error($con){
$v_errno= mysqli_errno($con);
$v_error= mysqli_error($con);
  if($v_errno==1062){
    echo 'Duplicate entry exists! Cannot proceed.';
  }elseif($v_errno==1451){
    echo 'Dependent element exists! Cannot proceed.';
  }else{
    die($v_error);
  }
}
//fetching yes/no for select element
function f_get_req_condition($v_cond){
  if($v_cond==0){
    return ('No');
  }
  else if($v_cond==1){
    return('Yes');
  }
  else{
    return ('Unknown');
  }
}
?>