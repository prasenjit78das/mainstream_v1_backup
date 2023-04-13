<?php 
$page_title='Employee Master';
//require_once('../../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
$v_class="";
if(isset($_POST['empid'])){
  $v_empid = mysqli_real_escape_string($con, $_POST['empid']);
  $v_mode = mysqli_real_escape_string($con, $_POST['mode']);
  //echo 'empid-'.$v_empid.'/'.$v_mode;
  if($v_mode=='view'){
    //all inputs disabled while viewing entry
    $v_jscript='<script>
      $(document).ready(function() {
        $("input,select").attr("disabled",true);
        $(".cls_by_pen").css("display","none");
      });
    </script>';
  }
  elseif($v_mode=='edit'){
    $v_jscript='<script>
    $(document).ready(function() {
     // alert("edit");
      var v_sts1 =0;
      var v_sts2 =0;
      var v_sts3 =0;
      var v_sts4 =0;
      var v_sts5 =0;
      var v_sts6 =0;
      var v_sts7 =0;
      $("#su_sav").hide();
      $(".btn_upld").attr("disabled","true");
      $("#bu_phlnk,#bu_otdoc").attr("disabled","true");
      $("input[type=text],input[type=date],input[type=email],input[type=number],"+
      "select").attr("readonly",true).css("pointer-events","none");
      $("#div_isdel").css("display","none");
      $("#hr_edtset_1").on("click",function(){

          $(".cls_edtset_1").removeAttr("readonly").css("pointer-events","all");
          $("#su_sav").removeAttr("readonly").show();
          $("#bu_phlnk,#bu_otdoc").removeAttr("disabled");

        // if(v_sts1==1){
        //   $(".cls_edtset_1").attr("readonly",true).css("pointer-events","none");
        //   $("#bu_phlnk,#bu_otdoc").attr("disabled","true").show();
        //   $("input[name=phlnk],input[name=otdoc]").hide();
        //   $("#su_sav").hide();
        //   v_sts1=2;
        // }else if(v_sts1!=1){
        //   v_sts1=1;
        // }
      });
      $("#hr_edtset_2").on("click",function(){

           $(".cls_edtset_2").removeAttr("readonly").css("pointer-events","all").show();
           $("#su_sav").show();
           $(".cls_fileset_2,.btn_upld").removeAttr("disabled");

        // if(v_sts2==1){
        //   $(".cls_edtset_2").attr("readonly",true).css("pointer-events","none").show();
        //   $("#su_sav,.cls_fileset_2").hide();
        //   $(".cls_fileset_2,.btn_upld").attr("disabled","true");
        //   v_sts2=2;
        //  }else if(v_sts2!=1){
        //    v_sts2=1;
        //  }
       });
       $("#hr_edtset_3").on("click",function(){

           $(".cls_edtset_3").removeAttr("readonly").css("pointer-events","all");
           $("#su_sav").removeAttr("readonly").show();
        //   if(v_sts3==1){
        //     $(".cls_edtset_3").attr("readonly",true).css("pointer-events","none");
        //     $("#su_sav").hide();
        //     v_sts3=2;
        //   }else if(v_sts3!=1){
        //    v_sts3=1;
        //  }
       });
       $("#hr_edtset_4").on("click",function(){

           $(".cls_edtset_4").removeAttr("readonly").css("pointer-events","all");
           $("#su_sav").removeAttr("readonly").show();

        //   if(v_sts4==1){
        //     $(".cls_edtset_4").attr("readonly",true).css("pointer-events","none");
        //     $("#su_sav").hide();
        //     v_sts4=2;
        //   }else if(v_sts4!=1){
        //     v_sts4=1;
        //  }
       });
       $("#hr_edtset_5").on("click",function(){

           $(".cls_edtset_5").removeAttr("readonly").css("pointer-events","all");
           $("#su_sav").removeAttr("readonly").show();

        // if(v_sts5==1){
        //   $(".cls_edtset_5").attr("readonly",true).css("pointer-events","none");
        //   $("#su_sav").hide();
        //   v_sts5=2;
        // }else if(v_sts5!=1){
        //    v_sts5=1;
        //  }
       });
       $("#hr_edtset_6").on("click",function(){

           $(".cls_edtset_6").removeAttr("readonly").css("pointer-events","all");
           $("#su_sav").removeAttr("readonly").show();
        // if(v_sts6==1){
        //   $(".cls_edtset_6").attr("readonly",true).css("pointer-events","none");
        //   $("#su_sav").hide();
        //   v_sts6=2;
        // }else if(v_sts6!=1){
        //    v_sts6=1;
        //  }
       });
       $("#hr_edtset_7").on("click",function(){

           $(".cls_edtset_7").removeAttr("readonly").css("pointer-events","all");
           $("#su_sav").removeAttr("readonly").show();
           
        // if(v_sts7==1){
        //   $(".cls_edtset_7").attr("readonly",true).css("pointer-events","none");
        //   $("#su_sav").hide();
        //   v_sts7=2;
        // }else if(v_sts7!=1){
        //    v_sts7=1;
        //  }
       });
    });
  </script>';
  }
  elseif($v_mode=='delete'){
    $v_jscript='<script>
    $(document).ready(function() {
      $("#su_sav").show();
      $("input[value=Upload]").attr("disabled","true");
      $("input[type=text],input[type=date],input[type=email],input[type=number],"+
      "select").attr("readonly",true).css("pointer-events","none");
      $("svg").css("display","none");
      $("#se_isdel").removeAttr("readonly").css("pointer-events","all");
    });
  </script>';
  }
  elseif($v_mode=='add'){
    //uploads disabled while adding entry
    $v_jscript='<script>
    $(document).ready(function() {
      $("#bu_phlnk,#bu_otdoc,#bu_pndlnk,#bu_aadlnk,#bu_ppdlnk").attr("disabled",true);
      $("#img_phlnk").attr("src","../../assets/images/img_avatar1.png");
      $("#div_isdel").css("display","none");
      $("svg").css("display","none");
    });
  </script>';
  }
  $v_btn_name = 'su_upd';
  // Construct the SELECT query
  $v_query = "SELECT * FROM `n_mast_emp` 
                     WHERE `empid` = '$v_empid'";
  // Execute the query
  $a_result = mysqli_query($con, $v_query);
  // Check the result
  if (!$a_result) {
  // The query failed, show an error message
  echo 'Error: '.mysqli_error($con);
  exit();
  }
  // Fetch the data into an array
  $a_data = mysqli_fetch_all($a_result, MYSQLI_ASSOC);
  // Return the data as JSON
  $json_emp= json_encode($a_data);
  ///get employee key-value pair
  $a_emp_array = json_decode($json_emp, true);
      // // Get Department data
      foreach ($a_emp_array as $empdata) {

          $v_selct_dept = $empdata['dptid'];
          }


}
else{ 
  $v_empid=0;
  $v_btn_name = 'su_sav';
  $json_emp='';
  $v_selct_dept='none';
}
echo $v_jscript;
?>
<script>
  $(document).ready(function() {
  $('#te_ftnam').val(<?=$json_emp?>[0].ftnam);
  $('#te_mdnam').val(<?=$json_emp?>[0].mdnam);
  $('#te_ltnam').val(<?=$json_emp?>[0].ltnam);
  $('#se_genid').val(<?=$json_emp?>[0].genid);
  $('#da_dob').val(<?=$json_emp?>[0].dob);
  $('#se_mlsid').val(<?=$json_emp?>[0].mlsid);
  $('#se_blgid').val(<?=$json_emp?>[0].blgid);
  $('#em_pemail').val(<?=$json_emp?>[0].pemail);
  $('#nu_prcont').val(<?=$json_emp?>[0].prcont);
  if(
      (<?=$json_emp?>[0].phlnk!='')
      &&(<?=$json_emp?>[0].phlnk!=null)
    )
    {
      $('#img_phlnk').attr('src',<?=$json_emp?>[0].phlnk);
    }
    else{
      $('#img_phlnk').attr('src','../../assets/images/img_avatar1.png');
    }

  $('#te_pnnum').val(<?=$json_emp?>[0].pnnum);
  if(<?=$json_emp?>[0].pndlnk!=''){
    $('#hr_pndlnk').attr('href',<?=$json_emp?>[0].pndlnk);
  }
  else{
    $('#hr_pndlnk').attr('href','#');
  }

  $('#nu_adnum').val(<?=$json_emp?>[0].adnum);
  if(<?=$json_emp?>[0].addlnk!=''){
    $('#hr_addlnk').attr('href',<?=$json_emp?>[0].addlnk);
  }
  else{
    $('#hr_addlnk').attr('href','#');
  }

  $('#te_ppnum').val(<?=$json_emp?>[0].ppnum);
  if(<?=$json_emp?>[0].ppdlnk!=''){
    $('#hr_ppdlnk').attr('href',<?=$json_emp?>[0].ppdlnk);
  }else{
    $('#hr_ppdlnk').attr('href','#');
  }

  $('#te_cadd1').val(<?=$json_emp?>[0].cadd1);
  $('#te_cadd2').val(<?=$json_emp?>[0].cadd2);
  $('#se_ctown').val(<?=$json_emp?>[0].ctown);
  $('#nu_cpncd').val(<?=$json_emp?>[0].cpncd);
  $('#se_cstt').val(<?=$json_emp?>[0].cstt);
  $('#se_ccntr').val(<?=$json_emp?>[0].ccntr);
  $('#te_padd1').val(<?=$json_emp?>[0].padd1);
  $('#te_padd2').val(<?=$json_emp?>[0].padd2);
  $('#se_ptown').val(<?=$json_emp?>[0].ptown);
  $('#nu_ppncd').val(<?=$json_emp?>[0].ppncd);
  $('#se_pstt').val(<?=$json_emp?>[0].pstt);
  $('#se_pcntr').val(<?=$json_emp?>[0].pcntr);
  $('#te_fanam').val(<?=$json_emp?>[0].fanam);
  $('#te_nxfkin').val(<?=$json_emp?>[0].nxfkin);
  $('#te_facont').val(<?=$json_emp?>[0].facont);
  $('#da_dofjn').val(<?=$json_emp?>[0].dofjn);
  $('#se_dsgid').val(<?=$json_emp?>[0].dsgid);
  $('#em_oemail').val(<?=$json_emp?>[0].oemail);
  $('#se_grdid').val(<?=$json_emp?>[0].grdid);
  $('#se_dptid').val(<?=$json_emp?>[0].dptid);
  $('#se_buid').val(<?=$json_emp?>[0].buid);
  $('#nu_ofcont').val(<?=$json_emp?>[0].ofcont);
  $('#se_typid').val(<?=$json_emp?>[0].typid);
  $('#se_rpmng').val(<?=$json_emp?>[0].rpmng);
  $('#se_dskid').val(<?=$json_emp?>[0].dskid);
  $('#se_sftid').val(<?=$json_emp?>[0].sftid);
  $('#se_vacci').val(<?=$json_emp?>[0].vacci);
  $('#te_esino').val(<?=$json_emp?>[0].esino);
  $('#te_epfno').val(<?=$json_emp?>[0].epfno);
  $('#se_bnkid').val(<?=$json_emp?>[0].bnkid);
  $('#te_pfnum').val(<?=$json_emp?>[0].pfnum);
  $('#se_insap').val(<?=$json_emp?>[0].insap);
  $('#te_mdlno').val(<?=$json_emp?>[0].mdlno);
  $('#se_apsts').val(<?=$json_emp?>[0].apsts);
  $('#se_stats').val(<?=$json_emp?>[0].stats);
  $('#te_cdnrs').val(<?=$json_emp?>[0].cdnrs);
  $('#te_adnrs').val(<?=$json_emp?>[0].adnrs);
  if(<?=$json_emp?>[0].otdoc!=''){
    $('#hr_otdoc').attr('href',<?=$json_emp?>[0].otdoc);
  }else{
    $('#hr_otdoc').attr('href','#');
  }
  $('#se_isdel').val(<?=$json_emp?>[0].isdel);
  });
  var phlnk_ext=['jpg','png','jpeg','JPG','PNG','JPEG'];
  var file_ext=['pdf','PDF'];
</script>
<style>
  /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<body onload="f_fetch_bu_dept('se_buid','se_dptid','<?=$v_selct_dept;?>')">
<form method="POST" action="employee_post.php" enctype="multipart/form-data" >
  <div class='container-fluid cls_form_area'>
    <div class="row">
        <!-- Photo display div start-->
        <div class="col-md-2" style="text-align:center;">
        <div class="card">
         <div class="card-body">
          <input type="hidden" name="mode" value="<?=$v_mode;?>">
          <input type="hidden" name="empid" value="<?=$v_empid;?>">
          <img class="img-thumbnail" style="max-height:10em;width:auto;" id="img_phlnk" 
                alt="Card image" >
            <div id="div_phlnk"></div>
            <input type="button" class="btn btn-dark" value="Upload" id="bu_phlnk"
              onclick="f_upload_file('phlnk',500, phlnk_ext,'div_phlnk','bu_phlnk')">
              <i class="bi-pen"></i>
              </div>
          </div>
        </div>
        <!-- Photo display div end-->
        <div class="col-md-10">
          <div class="row">
           <div class="col-md-8">
            <div class="card">
             <div class="card-body">
              <div class="mb-1 d-flex justify-content-end">
                 <span style="padding:4pt;" class="cls_by_pen" id="hr_edtset_1">
                      <i class="bi-pen"></i>
                  </span>
               </div>
              <div class="input-group mb-1 input-group-sm" id="dv_fml">
                <span class="input-group-text text-primary" style="width:90pt;">First Name</span>
                <input type="text" class="form-control cls_edtset_1" name="ftnam" id="te_ftnam" 
                       pattern="^\S*$" title="Input must not contain spaces" required>
                <span class="input-group-text text-primary" style="width:90pt;">Middle Name</span>
                <input type="text" class="form-control cls_edtset_1" name="mdnam" id="te_mdnam" 
                     onkeyup ="f_block_specialChar('te_mdnam')" >
                <span class="input-group-text text-primary" style="width:90pt;">Last Name</span>
                <input type="text" class="form-control cls_edtset_1" name="ltnam" id="te_ltnam">
              </div>
              <div class="input-group mb-1 input-group-sm" id="dv_gdm">
                <span class="input-group-text text-primary" style="width:90pt;">Gender</span>
                  <select class="form-control cls_edtset_1" name="genid" id="se_genid" required>
                   <?= f_select_option('`n_mast_gender`','`genid`','`gennm`',$con) ?>
                  </select>
                <span class="input-group-text text-primary" style="width:90pt;">DoB</span>
                <input type="date" class="form-control cls_edtset_1"  name="dob" id="da_dob" required>
                <span class="input-group-text text-primary" style="width:90pt;">Marital Status</span>
                  <select class="form-control cls_edtset_1" name="mlsid" id="se_mlsid" required>
                   <?= f_select_option('`n_mast_marlsts`','`mlsid`','`mlsnm`',$con) ?>

                  </select>
              </div>
              <div class="input-group mb-1 input-group-sm" id="dv_bec">
                <span class="input-group-text text-primary" style="width:90pt;">Blood Group</span>
                  <select class="form-control cls_edtset_1" name="blgid" id="se_blgid">
                   <?= f_select_option('`n_mast_bdlgrp`','`blgid`','`blgnm`',$con) ?>
                  </select>
                <span class="input-group-text text-primary" style="width:90pt;">Email</span>
                <input type="email" class="form-control cls_edtset_1"  name="pemail" id="em_pemail" required>
                <span class="input-group-text text-primary" style="width:90pt;">Contact No</span>
                <input type="number" class="form-control cls_edtset_1"  name="prcont" id="nu_prcont"  required>
               </div>
              </div>
             </div>
            </div>
            <!-- PAN AADHAR PASSPORT SECTION Start-->
            <div class="col-md-4">
             <div class="card">
               <div class="card-body">
                <div class="mb-1 d-flex justify-content-end" >
                  <span style="padding:4pt;" class="cls_by_pen" id="hr_edtset_2">
                  <i class="bi-pen"></i>
                  </span>  
                </div>
                <div class="input-group mb-1 input-group-sm" id="div_pndlnk">
                  <span class="input-group-text text-primary" style="width:70pt;">PAN</span>
                  <input type="text" class="form-control cls_edtset_2"  name="pnnum" id="te_pnnum" 
                    minlength="10" maxlength="10">
                  <span class="input-group-text" onclick="">
                    <a href="#" id="hr_pndlnk" target="_blank">
                      <i class="bi-eye"></i>
                    </a>  
                  </span>
                  <input type="button" class="btn btn-dark cls_edtset_2 btn_upld" value="Upload" id="bu_pndlnk"
                    onclick="f_upload_file('pndlnk',1024,file_ext,'div_pndlnk','bu_pndlnk')">
                </div>
                <div class="input-group mb-1 input-group-sm" id="div_aadlnk">
                  <span class="input-group-text text-primary" style="width:70pt;">AADHAR</span>
                  <input type="number" class="form-control cls_edtset_2"  name="adnum" id="nu_adnum" 
                    minlength="12" maxlength="12">
                  <span class="input-group-text" onclick="">
                    <a href="#" id="hr_addlnk" target="_blank">
                      <i class="bi-eye"></i>
                    </a>  
                  </span>
                  <input type="button" class="btn btn-dark cls_edtset_2 btn_upld" value="Upload" id="bu_aadlnk"
                    onclick="f_upload_file('addlnk',1024,file_ext,'div_aadlnk','bu_aadlnk')">
                </div>
                <div class="input-group mb-1 input-group-sm" id="div_ppdlnk">
                  <span class="input-group-text text-primary" style="width:70pt;">Passport</span>
                  <input type="text" class="form-control cls_edtset_2"  name="ppnum" id="te_ppnum" >
                  <span class="input-group-text">
                    <a href="#" id="hr_ppdlnk" target="_blank">
                      <i class="bi-eye"></i>
                    </a>  
                  </span>
                  <input type="button" class="btn btn-dark cls_edtset_2 btn_upld" value="Upload" id="bu_ppdlnk"
                  onclick="f_upload_file('ppdlnk',1024,file_ext,'div_ppdlnk','bu_ppdlnk')">
                </div>
               </div>
             </div>
            </div>
            <!-- PAN AADHAR PASSPORT SECTION end-->
          </div>
          <div class="row">
            <!-- Current Address div start -->
            <div class="col-md-6" >
              <div class="card">
                <div class="card-body">  
                 <div class="row">
                   <div class="col-md-10">
                    <span class="mb-2">
                      Current Address
                    </span>
                  </div>
                  <div class="col-md-2" id="dv_cadd_edt">
                   <span style="padding:4pt;" class="cls_by_pen" id="hr_edtset_3">
                    <i class="bi-pen"></i>
                   </span>
                  </div>
                  <div class="input-group mb-1 input-group-sm" id="dv_cadd1">
                    <span class="input-group-text text-primary" style="width:110pt;">C.Address Line 1</span>
                    <input type="text" class="form-control cls_edtset_3"  name="cadd1" id="te_cadd1" required>
                  </div>
                  <div class="input-group mb-1 input-group-sm" id="dv_cadd2">
                    <span class="input-group-text text-primary" style="width:110pt;">C.Address Line 2</span>
                    <input type="text" class="form-control cls_edtset_3"  name="cadd2" id="te_cadd2" >
                  </div>
                  <div class="input-group mb-1 input-group-sm" id="dv_ctown">
                    <span class="input-group-text text-primary" style="width:110pt;">City/Town/Village</span>
                      <select class="form-control cls_edtset_3" name="ctown" id="se_ctown" required>
                      <?= f_select_option('`n_mast_city`','`ctyid`','`ctynm`',$con) ?>
                      </select>
                    <span class="input-group-text text-primary" style="width:110pt;">Pin Code</span>
                    <input type="number" class="form-control cls_edtset_3"  name="cpncd" id="nu_cpncd" required>
                  </div>
                  <div class="input-group mb-1 input-group-sm" id="dv_cstt">
                    <span class="input-group-text text-primary" style="width:110pt;">State</span>
                      <select class="form-control cls_edtset_3"  name="cstt" id="se_cstt" required>
                      <?= f_select_option('`n_mast_state`','`staid`','`stanm`',$con) ?>
                      </select>
                    <span class="input-group-text text-primary" style="width:110pt;">Country</span>
                      <select class="form-control cls_edtset_3"  name="ccntr" id="se_ccntr" required>
                      <?= f_select_option('`n_mast_country`','`cntid`','`cntnm`',$con) ?>
                      </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- Current Address div end -->
            <!-- Permanent Address div start -->
          <div class="col-md-6">
            <div class="card">
             <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                  <span class="mb-2">
                    Permanent Address
                  </span>
                </div>
                <div class="col-md-2" id="dv_cadd_edt">
                  <span style="padding:4pt;" class="cls_by_pen" id="hr_edtset_4">
                    <i class="bi-pen"></i>
                  </span>
                </div>
              </div>
              <div class="input-group mb-1 input-group-sm" id="dv_padd1">
                <span class="input-group-text text-primary" style="width:110pt;">P.Address Line 1</span>
                <input type="text" class="form-control cls_edtset_4"  name="padd1" id="te_padd1" >
              </div>
              <div class="input-group mb-1 input-group-sm" id="dv_padd2">
                <span class="input-group-text text-primary" style="width:110pt;">P.Address Line 2</span>
                <input type="text" class="form-control cls_edtset_4"  name="padd2" id="te_padd2" >
              </div>
              <div class="input-group mb-1 input-group-sm" id="dv_ptown">
                <span class="input-group-text text-primary" style="width:110pt;">City/Town/Village</span>
                  <select class="form-control cls_edtset_4" name="ptown" id="se_ptown">
                   <?= f_select_option('`n_mast_city`','`ctyid`','`ctynm`',$con) ?>
                  </select>
                <span class="input-group-text text-primary" style="width:110pt;">Pin Code</span>
                <input type="number" class="form-control cls_edtset_4"  name="ppncd" id="nu_ppncd" >
              </div>
              <div class="input-group mb-1 input-group-sm" id="dv_pstt">
                <span class="input-group-text text-primary" style="width:110pt;">State</span>
                  <select class="form-control cls_edtset_4"  name="pstt" id="se_pstt" >
                   <?= f_select_option('`n_mast_state`','`staid`','`stanm`',$con) ?>
                  </select>
                <span class="input-group-text text-primary" style="width:110pt;">Country</span>
                  <select class="form-control cls_edtset_4"  name="pcntr" id="se_pcntr" >
                   <?= f_select_option('`n_mast_country`','`cntid`','`cntnm`',$con) ?>
                  </select>
              </div>
            </div>
           </div>
          </div>  
          </div>
          <!-- Permanent Address div end -->
          <!-- Next of kin start-->
          <div class="row">
           <div class="col-md-12" id="dv_fnc">
            <div class="card">
             <div class="card-body">
              <div class="input-group mb-1 input-group-sm" id="dv_fanam">
                <span class="input-group-text text-primary" style="width:110pt;">Father's Name</span>
                <input type="text" class="form-control cls_edtset_5"  name="fanam" id="te_fanam" >
                <span class="input-group-text text-primary" style="width:110pt;">Next of Kin</span>
                <input type="text" class="form-control cls_edtset_5"  name="nxfkin" id="te_nxfkin" >
                <span class="input-group-text text-primary" style="width:110pt;">Contact No.</span>
                <input type="number" class="form-control cls_edtset_5"  name="facont" id="nu_facont" >
                <span style="padding:4pt;" class="cls_by_pen" id="hr_edtset_5">
                 <i class="bi-pen"></i>
                </span>
              </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
       <!-- Next of kin end-->
     <div class="row">
     <!-- DOC n certificate start-->  
     <div class="col-md-2"  style="text-align:center;">
      <div class="card">
       <div class="card-body">
        <a href="#" id="hr_otdoc" target="_blank">
            <img class="img-thumbnail" style="max-height:15em;width:auto;" 
             src="../../assets/images/doc.avif" alt="Doc image">
          </a>
          <div id="div_otdoc"></div>
          <input type="button" class="btn btn-dark" value="Upload" id="bu_otdoc"
            onclick="f_upload_file('otdoc',1024,file_ext,'div_otdoc','bu_otdoc')">
          <i class="bi-pen"></i>    
        </div>
      </div>
     </div>
     <!-- DOC n certificate end-->
        <div class="col-md-10">
          <div class="row">
          <!-- office details start -->
          <div class="col-md-12">
           <div class="card">
             <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="input-group mb-1 input-group-sm">
                    <span class="input-group-text text-primary" style="width:110pt;">Date of Joining</span>
                    <input type="date" class="form-control cls_edtset_6"  name="dofjn" id="da_dofjn" required>
                  </div>
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                  <span style="padding:4pt;" class="cls_by_pen" id="hr_edtset_6">
                    <i class="bi-pen"></i>
                  </span>
                </div>
              </div>
              <div class="row">
              <div class="input-group mb-1 input-group-sm" id="dv_jde">
              <span class="input-group-text text-primary" style="width:110pt;">Business Unit</span>
                  <select class="form-control cls_edtset_6" name="buid" id="se_buid" 
                    onchange="f_fetch_bu_dept('se_buid','se_dptid','<?=$v_selct_dept;?>')">
                    <option value="">--Select--</option>
                    <?php
                      // Get NODE data filter BU (pndid = 1)
                      $v_qdpt = "SELECT `nodid`,`nodnm` 
                                    FROM `mast_node`
                                    WHERE `isdel`='N' AND `pndid` = '1' 
                                    ORDER BY `nodnm` ASC;";
                      $a_qdptdata=mysqli_query($con,$v_qdpt);
                      foreach($a_qdptdata as $a_dptitems){
                              $v_tdptid=$a_dptitems['nodid'];
                              $v_tdptnm=$a_dptitems['nodnm'];
                    ?>
                      <option value="<?=$v_tdptid;?>">
                        <?=$v_tdptnm;?>
                      </option>
                    <?php 
                      }
                    ?>
                  </select>
                  <span class="input-group-text text-primary" style="width:110pt;">Department</span>
                  <select class="form-control cls_edtset_6" name="dptid" id="se_dptid" >
                  <option value="">--Select--</option>
                  </select>
                <span class="input-group-text text-primary" style="width:110pt;">Designation</span>
                  <select class="form-control cls_edtset_6" name="dsgid" id="se_dsgid"  >
                   <?= f_select_option('`n_mast_designation`','`desigid`','`designm`',$con) ?>
                  </select>
               </div>
            </div>
            <div class="col-md-12">
              <div class="input-group mb-1 input-group-sm" id="dv_gdc">
                <span class="input-group-text text-primary" style="width:110pt;">Grade</span>
                  <select class="form-control cls_edtset_6" name="grdid" id="se_grdid" required>
                   <?= f_select_option('`n_mast_grade`','`grdid`','`grdnm`',$con); ?>
                  </select>
                <span class="input-group-text text-primary" style="width:110pt;">Email ID</span>
                 <input type="email" class="form-control cls_edtset_6"  name="oemail" id="em_oemail" >
                <span class="input-group-text text-primary" style="width:110pt;">Contact</span>
                <input type="number" class="form-control cls_edtset_6"  name="ofcont" id="nu_ofcont" >
              </div>
            </div>
            <div class="col-md-12">
              <div class="input-group mb-1 input-group-sm" id="dv_trd">
                <span class="input-group-text text-primary" style="width:110pt;">Type</span>
                  <select class="form-control cls_edtset_6" name="typid" id="se_typid" required>
                   <?= f_select_option('`n_mast_type`','`typid`','`typnm`',$con) ?>
                  </select>
                <span class="input-group-text text-primary" style="width:110pt;">Reporting Manager</span>
                  <select class="form-control cls_edtset_6"  name="rpmng" id="se_rpmng" >
                   <?= f_select_option("`n_mast_emp`","`empid`","CONCAT(`ftnam`,' ',`mdnam`,' ',`ltnam`)",$con) ?>
                  </select>
                <span class="input-group-text text-primary" style="width:110pt;">Desk</span>
                  <select class="form-control cls_edtset_6" name="dskid" id="se_dskid" >
                   <?= f_select_option('`n_mast_desk`','`dskid`','`dsknm`',$con) ?>
                  </select>
              </div>
            </div>
           </div>
          </div>
            <!-- office details end -->
          <div class="col-md-12">
            <div class="card">
             <div class="card-body">
              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <span style="padding:4pt;" class="cls_by_pen" id="hr_edtset_7">
                    <i class="bi-pen"></i>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-group mb-1 input-group-sm" id="dv_sv">
                  <span class="input-group-text text-primary" style="width:110pt;">Shift</span>
                  <select class="form-control cls_edtset_7" name="sftid" id="se_sftid" >
                    <?= f_select_option('`n_mast_shift`','`sftid`','`sftnm`',$con) ?>
                  </select>
                  <span class="input-group-text text-primary" style="width:110pt;">Vaccination</span>
                  <select class="form-control cls_edtset_7"  name="vacci" id="se_vacci" >
                    <option value="">--Select--</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>
                <div class="input-group mb-1 input-group-sm" id="dv_eb">
                  <span class="input-group-text text-primary" style="width:110pt;">ESICNo</span>
                  <input type="text" class="form-control cls_edtset_7" name="esino" id="te_esino" >
                  <span class="input-group-text text-primary" style="width:110pt;">Bank</span>
                    <select class="form-control cls_edtset_7" name="bnkid" id="se_bnkid">
                      <?= f_select_option('`n_mast_bank`','`bnkid`','`bnknm`',$con) ?>
                    </select>
                </div>
                <div class="input-group mb-1 input-group-sm" id="dv_ep">
                  <span class="input-group-text text-primary" style="width:110pt;">EPFONo</span>
                  <input type="text" class="form-control cls_edtset_7" name="epfno" id="te_epfno" >
                  <span class="input-group-text text-primary" style="width:110pt;">PFNo</span>
                  <input type="text" class="form-control cls_edtset_7" name="pfnum" id="te_pfnum" >
                </div>
                <div class="input-group mb-1 input-group-sm" id="dv_im">
                  <span class="input-group-text text-primary" style="width:110pt;">InsuranceApplicable</span>
                    <select class="form-control cls_edtset_7"  name="insap" id="se_insap" >
                      <option value="">--Select--</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  <span class="input-group-text text-primary" style="width:110pt;">Medicliam No</span>
                  <input type="text" class="form-control cls_edtset_7"  name="mdlno" id="te_mdlno" >
                </div>
                <div class="input-group mb-1 input-group-sm" id="dv_as">
                  <span class="input-group-text text-primary" style="width:110pt;">Approval Status</span>
                  <input type="text" class="form-control cls_edtset_7"  name="apsts" id="se_apsts" >
                  <span class="input-group-text text-primary" style="width:110pt;">Status</span>
                  <input type="text" class="form-control cls_edtset_7"  name="stats" id="se_stats" >
                </div>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="input-group mb-1 input-group-sm" id="dv_ca">
                    <span class="input-group-text text-primary" style="width:110pt;">Checking Denial reason</span>
                    <input type="text" class="form-control cls_edtset_7"  name="cdnrs" id="te_cdnrs" >
                  </div>
                  <div class="input-group mb-1 input-group-sm" id="dv_adr">
                    <span class="input-group-text text-primary" style="width:110pt;">Approval Denial reason</span>
                    <input type="text" class="form-control cls_edtset_7"  name="adnrs" id="te_adnrs" >
                  </div>
                </div>
              </div>
            <div class="col-md-4">
              <div class="row">
                <div class="input-group mb-2 input-group-sm" id="div_isdel">
                 <span class="input-group-text text-primary">Delete</span>
                    <select class="form-control"  name="isdel" id="se_isdel" >
                      <option value="N">No</option>
                      <option value="Y">Yes</option>
                    </select>
                </div>
                <div class="input-group mb-2 input-group-sm" id="dv_sbtn">
                  <input type="submit" value="Save" name="<?=$v_btn_name;?>" id="su_sav" class="btn btn-primary">
                </div>
              </div>
            </div>
           </div>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
</body>
<?php
require_once('../../footer.php');
function f_select_option($v_tblnm,$v_selval,$v_seloptset,$con){
  echo'<option value="">--Select--</option>';
  $v_selqr = "SELECT $v_selval as selval, $v_seloptset as selopt FROM $v_tblnm".
               "ORDER BY selopt ASC;";
    $a_seldata=mysqli_query($con,$v_selqr);
    foreach($a_seldata as $a_selitems){
      $v_selvl=$a_selitems['selval'];
      $v_selpt=$a_selitems['selopt'];                   
      echo'<option value="'.$v_selvl.'">'.$v_selpt.'</option>';
    }
}
function f_set_selection($v_cond, $v_val){
  if($v_cond==$v_val){
    return ('selected');
  }
  else {
    return(' ');
  }
    return (' ');
  
}
?>
<script>
 //fetch Department name as per BU selection
//and append the department select element.
function f_fetch_bu_dept(get_id,append_id,selct) {// alert('clicked');
  var id = $('#'+get_id).val(); //alert(id);
  if(selct=='none'){}else{};
  alert(selct);
// Make an AJAX request to the server-side script to 
$.ajax({
  url: '../../assets/employee_bu_dept.php',
  type: 'POST',
  data: {
    buid: id,
    deptselct: selct
  },
  success: function(response) {
    //alert('test');  
    //alert(response);            
      //clear previously filled data
      $('#'+append_id).empty();
      var option = response;
      // Append the option received to select element of id 'append_id'
      $('#'+append_id).append(option);
  },
  error: function(response) {
    // The request failed, show an error message
    alert('Error: '+response.responseText);
  }
});
} 

</script>