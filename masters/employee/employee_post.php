<?php
  // Connect to the database
  //require_once('../../connec/session.php');
  require_once('../../connec/connect.php');
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
  // Get the form data
  $v_msg=''; //container for various messages
  $v_mdnam='';
  $v_ltnam='';
  $v_genid='';
  $v_dob='';
  $v_mlsid='';
  $v_blgid='';
  $v_pemail='';
  $v_prcont='';
  $v_pnnum='';
  $v_adnum='';
  $v_ppnum='';
  $v_cadd1='';
  $v_cadd2='';
  $v_ctown='';
  $v_cpncd='';
  $v_cstt='';
  $v_ccntr='';
  $v_padd1='';
  $v_padd2='';
  $v_ptown='';
  $v_ppncd='';
  $v_pstt='';
  $v_pcntr='';
  $v_fanam='';
  $v_nxfkin='';
  $v_facont='';
  $v_dofjn='';
  $v_dsgid='';
  $v_oemail='';
  $v_grdid='';
  $v_dptid='';
  $v_ofcont='';
  $v_typid='';
  $v_rpmng='';
  $v_dskid='';
  $v_sftid='';
  $v_vacci='';
  $v_esino='';
  $v_epfno='';
  $v_bnkid='';
  $v_pfnum='';
  $v_insap='';
  $v_mdlno='';
  $v_apsts='';
  $v_stats='';
  $v_cdnrs='';
  $v_adnrs='';
  $v_isdel='';

  if(isset($urc)){
    $v_urc=$urc;
  }
  $v_tstamp=date('Y-m-d H:i:s');
  if(isset($_POST['empid'])){
    $v_empid= mysqli_real_escape_string($con, $_POST['empid']);
  }
  if(isset($_POST['ftnam'])){
    $v_ftnam= mysqli_real_escape_string($con, $_POST['ftnam']);
    $v_mdnam= mysqli_real_escape_string($con, $_POST['mdnam']);
    $v_ltnam= mysqli_real_escape_string($con, $_POST['ltnam']);
    $v_genid= mysqli_real_escape_string($con, $_POST['genid']);
    $v_dob= mysqli_real_escape_string($con, $_POST['dob']);
    $v_mlsid= mysqli_real_escape_string($con, $_POST['mlsid']);
    $v_blgid= mysqli_real_escape_string($con, $_POST['blgid']);
    $v_pemail= mysqli_real_escape_string($con, $_POST['pemail']);
    $v_prcont= mysqli_real_escape_string($con, $_POST['prcont']);
    $v_pnnum= mysqli_real_escape_string($con, $_POST['pnnum']);
    $v_adnum= mysqli_real_escape_string($con, $_POST['adnum']);
    $v_ppnum= mysqli_real_escape_string($con, $_POST['ppnum']);
    $v_cadd1= mysqli_real_escape_string($con, $_POST['cadd1']);
    $v_cadd2= mysqli_real_escape_string($con, $_POST['cadd2']);
    $v_ctown= mysqli_real_escape_string($con, $_POST['ctown']);
    $v_cpncd= mysqli_real_escape_string($con, $_POST['cpncd']);
    $v_cstt= mysqli_real_escape_string($con, $_POST['cstt']);
    $v_ccntr= mysqli_real_escape_string($con, $_POST['ccntr']);
    $v_padd1= mysqli_real_escape_string($con, $_POST['padd1']);
    $v_padd2= mysqli_real_escape_string($con, $_POST['padd2']);
    $v_ptown= mysqli_real_escape_string($con, $_POST['ptown']);
    $v_ppncd= mysqli_real_escape_string($con, $_POST['ppncd']);
    $v_pstt= mysqli_real_escape_string($con, $_POST['pstt']);
    $v_pcntr= mysqli_real_escape_string($con, $_POST['pcntr']);
    $v_fanam= mysqli_real_escape_string($con, $_POST['fanam']);
    $v_nxfkin= mysqli_real_escape_string($con, $_POST['nxfkin']);
    $v_facont= mysqli_real_escape_string($con, $_POST['facont']);
    $v_dofjn= mysqli_real_escape_string($con, $_POST['dofjn']);
    $v_dsgid= mysqli_real_escape_string($con, $_POST['dsgid']);
    $v_oemail= mysqli_real_escape_string($con, $_POST['oemail']);
    $v_grdid= mysqli_real_escape_string($con, $_POST['grdid']);
    $v_dptid= mysqli_real_escape_string($con, $_POST['dptid']);
    $v_buid= mysqli_real_escape_string($con, $_POST['buid']);
    $v_ofcont= mysqli_real_escape_string($con, $_POST['ofcont']);
    $v_typid= mysqli_real_escape_string($con, $_POST['typid']);
    $v_rpmng= mysqli_real_escape_string($con, $_POST['rpmng']);
    $v_dskid= mysqli_real_escape_string($con, $_POST['dskid']);
    $v_sftid= mysqli_real_escape_string($con, $_POST['sftid']);
    $v_vacci= mysqli_real_escape_string($con, $_POST['vacci']);
    $v_esino= mysqli_real_escape_string($con, $_POST['esino']);
    $v_epfno= mysqli_real_escape_string($con, $_POST['epfno']);
    $v_bnkid= mysqli_real_escape_string($con, $_POST['bnkid']);
    $v_pfnum= mysqli_real_escape_string($con, $_POST['pfnum']);
    $v_insap= mysqli_real_escape_string($con, $_POST['insap']);
    $v_mdlno= mysqli_real_escape_string($con, $_POST['mdlno']);
    $v_apsts= mysqli_real_escape_string($con, $_POST['apsts']);
    $v_stats= mysqli_real_escape_string($con, $_POST['stats']);
    $v_cdnrs= mysqli_real_escape_string($con, $_POST['cdnrs']);
    $v_adnrs= mysqli_real_escape_string($con, $_POST['adnrs']);
    $v_isdel= mysqli_real_escape_string($con, $_POST['isdel']);
  }

    if($v_empid==0){//construct insert query
      $v_query="INSERT INTO `n_mast_emp` (`empid`, `ftnam`, `mdnam`, `ltnam`, `genid`,
                `dob`, `mlsid`, `blgid`, `pemail`, `prcont`,  `pnnum`,  
                `adnum`,  `ppnum`,  `cadd1`, `cadd2`, `ctown`, `cpncd`, 
                `cstt`, `ccntr`, `padd1`, `padd2`, `ptown`, `ppncd`, `pstt`, `pcntr`, 
                `fanam`, `nxfkin`, `facont`, `dofjn`, `dsgid`, `oemail`, `grdid`, 
                `dptid`, `buid`,`ofcont`, `typid`, `rpmng`, `dskid`, `sftid`, `vacci`, 
                `esino`, `epfno`, `bnkid`, `pfnum`, `insap`, `mdlno`, `apsts`, `stats`, 
                `cdnrs`, `adnrs`,  `isdel`, `crtby`) 
               VALUES (NULL,'$v_ftnam', '$v_mdnam', '$v_ltnam', '$v_genid', '$v_dob', '$v_mlsid', 
                '$v_blgid', '$v_pemail', '$v_prcont',  '$v_pnnum',  
                '$v_adnum',  '$v_ppnum',  '$v_cadd1', '$v_cadd2', 
                '$v_ctown', '$v_cpncd', '$v_cstt', '$v_ccntr', '$v_padd1', '$v_padd2', '$v_ptown',
                '$v_ppncd', '$v_pstt', '$v_pcntr', '$v_fanam', '$v_nxfkin', '$v_facont', '$v_dofjn',
                '$v_dsgid', '$v_oemail', '$v_grdid', '$v_dptid','$v_buid', '$v_ofcont', '$v_typid', '$v_rpmng',
                '$v_dskid', '$v_sftid', '$v_vacci', '$v_esino', '$v_epfno', '$v_bnkid', '$v_pfnum', 
                '$v_insap', '$v_mdlno', '$v_apsts', '$v_stats', '$v_cdnrs', '$v_adnrs',  
                '$v_isdel', '$v_urc');";

    }
    elseif($v_empid!=0){
      // Specify the directory where the file should be uploaded
      $v_target_dir = "../../uploads/";
      if(isset($_FILES['phlnk'])){//photo upload
        //New name
        $v_pht_name=$v_empid.'_photo';
        // Specify the name of the  file after it has been uploaded
        $v_pht_file = $v_target_dir . basename($_FILES["phlnk"]["name"]);
        // file type
        $v_phtfile_type = strtolower(pathinfo($v_pht_file,PATHINFO_EXTENSION));
        // Combine the target directory, new name, and file extension to create the new file name
        $v_pht_file = $v_target_dir . $v_pht_name . "." . $v_phtfile_type;
        $v_photo_lnk="`phlnk`='$v_pht_file',";
      }
      else{
        $v_photo_lnk="";
      }
      if(isset($_FILES['pndlnk'])){//PAN upload
        //New name
        $v_pan_name=$v_empid.'_pan';
        // Specify the name of the  file after it has been uploaded
        $v_pan_file = $v_target_dir . basename($_FILES["pndlnk"]["name"]);
        // file type
        $v_panfile_type = strtolower(pathinfo($v_pan_file,PATHINFO_EXTENSION));
        // Combine the target directory, new name, and file extension to create the new file name
        $v_pan_file = $v_target_dir . $v_pan_name . "." . $v_panfile_type;
        $v_pan_lnk="`pndlnk`='$v_pan_file',";
      }
      else{
        $v_pan_lnk="";
      }
      if(isset($_FILES['addlnk'])){//Aadhar upload
        //New name
        $v_add_name=$v_empid.'_aadhar';
        // Specify the name of the  file after it has been uploaded
        $v_add_file = $v_target_dir . basename($_FILES["addlnk"]["name"]);
        // file type
        $v_addfile_type = strtolower(pathinfo($v_add_file,PATHINFO_EXTENSION));
        // Combine the target directory, new name, and file extension to create the new file name
        $v_add_file = $v_target_dir . $v_add_name . "." . $v_addfile_type;
        $v_add_lnk="`addlnk`='$v_add_file',";
      }
      else{
        $v_add_lnk="";
      }
      if(isset($_FILES['ppdlnk'])){//Passport upload
        //New name
        $v_ppd_name=$v_empid.'_passport';
        // Specify the name of the  file after it has been uploaded
        $v_ppd_file = $v_target_dir . basename($_FILES["ppdlnk"]["name"]);
        // file type
        $v_ppdfile_type = strtolower(pathinfo($v_ppd_file,PATHINFO_EXTENSION));
        // Combine the target directory, new name, and file extension to create the new file name
        $v_ppd_file = $v_target_dir . $v_ppd_name . "." . $v_ppdfile_type;
        $v_ppd_lnk="`ppdlnk`='$v_ppd_file',";
      }
      else{
        $v_ppd_lnk="";
      }
      if(isset($_FILES['otdoc'])){//Other document upload
        //New name
        $v_otd_name=$v_empid.'_other_doc';
        // Specify the name of the  file after it has been uploaded
        $v_otd_file = $v_target_dir . basename($_FILES["otdoc"]["name"]);
        // file type
        $v_otdfile_type = strtolower(pathinfo($v_otd_file,PATHINFO_EXTENSION));
        // Combine the target directory, new name, and file extension to create the new file name
        $v_otd_file = $v_target_dir . $v_otd_name . "." . $v_otdfile_type;
        $v_otd_lnk="`otdoc`='$v_otd_file',";
      }
      else{
        $v_otd_lnk="";
      }
      //constuct update query 
      $v_query="UPDATE `n_mast_emp` 
                SET `ftnam`='$v_ftnam',`mdnam`='$v_mdnam',`ltnam`='$v_ltnam',
                    `genid`='$v_genid',`dob`='$v_dob',`mlsid`='$v_mlsid',
                    `blgid`='$v_blgid',`pemail`='$v_pemail',`prcont`='$v_prcont',
                    ".$v_photo_lnk.$v_pan_lnk.$v_add_lnk.$v_ppd_lnk.$v_otd_lnk."
                    `pnnum`='$v_pnnum',`adnum`='$v_adnum',`ppnum`='$v_ppnum',
                    `cadd1`='$v_cadd1',`cadd2`='$v_cadd2',`ctown`='$v_ctown',
                    `cpncd`='$v_cpncd',`cstt`='$v_cstt',`ccntr`='$v_ccntr',
                    `padd1`='$v_padd1',`padd2`='$v_padd2',`ptown`='$v_ptown',
                    `ppncd`='$v_ppncd',`pstt`='$v_pstt',`pcntr`='$v_pcntr',
                    `fanam`='$v_fanam',`nxfkin`='$v_nxfkin',`facont`='$v_facont',
                    `dofjn`='$v_dofjn',`dsgid`='$v_dsgid',`oemail`='$v_oemail',
                    `grdid`='$v_grdid',`dptid`='$v_dptid',`ofcont`='$v_ofcont',
                    `buid`='$v_buid',
                    `typid`='$v_typid',`rpmng`='$v_rpmng',`dskid`='$v_dskid',
                    `sftid`='$v_sftid',`vacci`='$v_vacci',`esino`='$v_esino',
                    `epfno`='$v_epfno',`bnkid`='$v_bnkid',`pfnum`='$v_pfnum',
                    `insap`='$v_insap',`mdlno`='$v_mdlno',`apsts`='$v_apsts',
                    `stats`='$v_stats',`cdnrs`='$v_cdnrs',`adnrs`='$v_adnrs',
                    `isdel`='$v_isdel',`updby`='$v_urc',`updon`='$v_tstamp' 
                WHERE `empid`='$v_empid';";
    }
    // Execute the query
  try{
    mysqli_autocommit($con,false);
    if(mysqli_query($con, $v_query)){
      echo $v_query;
        if($v_msg==''){
          if($v_empid!=0){
            ///photo file upload
            if($v_photo_lnk!=''){
              // Check if Photo already exists
              if (file_exists($v_pht_file)) {
                unlink($v_pht_file);//delete it
              }else{}
                if (move_uploaded_file($_FILES["phlnk"]["tmp_name"], $v_pht_file)) {
                  echo "<br>The file ".$v_pht_file. " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                } 
            }
            else{
            }
            //PAN file upload
            if($v_pan_lnk!=''){
              // Check if PAN Doc already exists
              if (file_exists($v_pan_file)) {
                unlink($v_pan_file);//delete it
              }else{}
                if (move_uploaded_file($_FILES["pndlnk"]["tmp_name"], $v_pan_file)) {
                  echo "<br>The file ".$v_pan_file. " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                } 
            }
            else{
            }
            //Aadhar file upload
            if($v_add_lnk!=''){
              // Check if PAN Doc already exists
              if (file_exists($v_add_file)) {
                unlink($v_add_file);//delete it
              }else{}
                if (move_uploaded_file($_FILES["addlnk"]["tmp_name"], $v_add_file)) {
                  echo "<br>The file ".$v_add_file. " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                } 
            }
            else{
            }
            //Passport file upload
            if($v_ppd_lnk!=''){
              // Check if PAN Doc already exists
              if (file_exists($v_ppd_file)) {
                unlink($v_ppd_file);//delete it
              }else{}
                if (move_uploaded_file($_FILES["ppdlnk"]["tmp_name"], $v_ppd_file)) {
                  echo "<br>The file ".$v_ppd_file. " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                } 
            }
            else{
            }
            //Other documents upload
            if($v_otd_lnk!=''){
              // Check if other Doc already exists
              if (file_exists($v_otd_file)) {
                unlink($v_otd_file);//delete it
              }else{}
                if (move_uploaded_file($_FILES["otdoc"]["tmp_name"], $v_otd_file)) {
                  echo "<br>The file ".$v_otd_file. " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                } 
            }
            else{
            }
          }
          else{

          }
        mysqli_commit($con);
        $v_updategoto= "employee_list.php";
        header(sprintf("Location: %s" ,$v_updategoto));
        }
        elseif($v_msg!=''){
        echo $v_msg;
        }
        f_error($con);
    }
    else{
      f_error($con);
    }
  }catch(mysqli_sql_exception $e){
    f_error($con); 
  }
mysqli_rollback($con);
// Close the connection
mysqli_close($con);
?>
