<?php
require_once('../connec/connect.php');
require_once('parent_data_func.php');
///get Role key-value pair
$a_dept_array = json_decode($json_dept, true);
$v_option='';$v_deptid='';$v_deptnm='';
$v_buid=$_POST["buid"];
$v_selct_dept=$_POST["deptselct"];
// Get Employee data
$v_option.='<option value="">--Select--</option>';
    foreach ($a_dept_array as $deptdata) {
    if ($deptdata['pndid'] == $v_buid) {
        $v_deptnm=$deptdata["nodnm"];
        $v_deptid=$deptdata["nodid"];
        if($v_deptid==$v_selct_dept){
            $echo_selct='selected';
        }else{
            $echo_selct='';
        }
        $v_option.='<option value="'.$v_deptid.'" '.$echo_selct.'
        >'.$v_deptnm.'</option>';
        }     
    }
    echo $v_option;
?>