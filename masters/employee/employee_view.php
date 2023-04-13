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
  $json_data= json_encode($a_data);
}
else{ 
  $v_empid=0;
  $v_btn_name = 'su_sav';
  $json_data='';
}
echo $v_jscript;
?>
<script>
  $(document).ready(function() {
  $('#te_ftnam').val(<?=$json_data?>[0].ftnam);
  $('#te_mdnam').val(<?=$json_data?>[0].mdnam);
  $('#te_ltnam').val(<?=$json_data?>[0].ltnam);
  $('#se_genid').val(<?=$json_data?>[0].genid);
  $('#da_dob').val(<?=$json_data?>[0].dob);
  $('#se_mlsid').val(<?=$json_data?>[0].mlsid);
  $('#se_blgid').val(<?=$json_data?>[0].blgid);
  $('#em_pemail').val(<?=$json_data?>[0].pemail);
  $('#nu_prcont').val(<?=$json_data?>[0].prcont);
  if(
      (<?=$json_data?>[0].phlnk!='')
      &&(<?=$json_data?>[0].phlnk!=null)
    )
    {
      $('#img_phlnk').attr('src',<?=$json_data?>[0].phlnk);
    }
    else{
      $('#img_phlnk').attr('src','../../assets/images/img_avatar1.png');
    }

  $('#te_pnnum').val(<?=$json_data?>[0].pnnum);
  if(<?=$json_data?>[0].pndlnk!=''){
    $('#hr_pndlnk').attr('href',<?=$json_data?>[0].pndlnk);
  }
  else{
    $('#hr_pndlnk').attr('href','#');
  }

  $('#nu_adnum').val(<?=$json_data?>[0].adnum);
  if(<?=$json_data?>[0].addlnk!=''){
    $('#hr_addlnk').attr('href',<?=$json_data?>[0].addlnk);
  }
  else{
    $('#hr_addlnk').attr('href','#');
  }

  $('#te_ppnum').val(<?=$json_data?>[0].ppnum);
  if(<?=$json_data?>[0].ppdlnk!=''){
    $('#hr_ppdlnk').attr('href',<?=$json_data?>[0].ppdlnk);
  }else{
    $('#hr_ppdlnk').attr('href','#');
  }

  $('#te_cadd1').val(<?=$json_data?>[0].cadd1);
  $('#te_cadd2').val(<?=$json_data?>[0].cadd2);
  $('#se_ctown').val(<?=$json_data?>[0].ctown);
  $('#nu_cpncd').val(<?=$json_data?>[0].cpncd);
  $('#se_cstt').val(<?=$json_data?>[0].cstt);
  $('#se_ccntr').val(<?=$json_data?>[0].ccntr);
  $('#te_padd1').val(<?=$json_data?>[0].padd1);
  $('#te_padd2').val(<?=$json_data?>[0].padd2);
  $('#se_ptown').val(<?=$json_data?>[0].ptown);
  $('#nu_ppncd').val(<?=$json_data?>[0].ppncd);
  $('#se_pstt').val(<?=$json_data?>[0].pstt);
  $('#se_pcntr').val(<?=$json_data?>[0].pcntr);
  $('#te_fanam').val(<?=$json_data?>[0].fanam);
  $('#te_nxfkin').val(<?=$json_data?>[0].nxfkin);
  $('#te_facont').val(<?=$json_data?>[0].facont);
  $('#da_dofjn').val(<?=$json_data?>[0].dofjn);
  $('#se_dsgid').val(<?=$json_data?>[0].dsgid);
  $('#em_oemail').val(<?=$json_data?>[0].oemail);
  $('#se_grdid').val(<?=$json_data?>[0].grdid);
  $('#se_dptid').val(<?=$json_data?>[0].dptid);
  $('#nu_ofcont').val(<?=$json_data?>[0].ofcont);
  $('#se_typid').val(<?=$json_data?>[0].typid);
  $('#se_rpmng').val(<?=$json_data?>[0].rpmng);
  $('#se_dskid').val(<?=$json_data?>[0].dskid);
  $('#se_sftid').val(<?=$json_data?>[0].sftid);
  $('#se_vacci').val(<?=$json_data?>[0].vacci);
  $('#te_esino').val(<?=$json_data?>[0].esino);
  $('#te_epfno').val(<?=$json_data?>[0].epfno);
  $('#se_bnkid').val(<?=$json_data?>[0].bnkid);
  $('#te_pfnum').val(<?=$json_data?>[0].pfnum);
  $('#se_insap').val(<?=$json_data?>[0].insap);
  $('#te_mdlno').val(<?=$json_data?>[0].mdlno);
  $('#se_apsts').val(<?=$json_data?>[0].apsts);
  $('#se_stats').val(<?=$json_data?>[0].stats);
  $('#te_cdnrs').val(<?=$json_data?>[0].cdnrs);
  $('#te_adnrs').val(<?=$json_data?>[0].adnrs);
  if(<?=$json_data?>[0].otdoc!=''){
    $('#hr_otdoc').attr('href',<?=$json_data?>[0].otdoc);
  }else{
    $('#hr_otdoc').attr('href','#');
  }
  $('#se_isdel').val(<?=$json_data?>[0].isdel);
  });
  var phlnk_ext=['jpg','png','jpeg','JPG','PNG','JPEG'];
  var file_ext=['pdf','PDF'];
</script>
<body>
  <div class="containor-fluid">
    <!-- Section for (photo),(personal details),(PAN, AADHAR, Passport) -->
    <div class="row">
      <!-- Section for photo -->
      <div class="col-md-2">
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Photo&nbsp;
            <span class="bi-pen"></span>
          </h5>
          </div>
        </div>
      </div>
      <!-- Section for Personal Deatails -->
      <div class="col-md-6">
        <div class="card" >
          <div class="card-body">
           <h5 class="card-title">Personal Details&nbsp;
            <span class="bi-pen"></span>
            </h5></h5>
          </div>
        </div>
      </div>
      <!-- Section for (PAN, AADHAR, Passport) -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Identity Documents&nbsp;
            <span class="bi-pen"></span>
           </h5>
          </div>
        </div>
      </div>
    </div>
    <!-- Section for (current Address),(permanent Address),(next to Kin) -->
    <div class="row">
      <!-- Section for (current Address)  -->
      <div class="col-md-2">
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Current Address&nbsp;
            <span class="bi-pen"></span>
           </h5>
          </div>
        </div>
      </div>
      <!-- Section for (permanent Address) -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Permanent Address&nbsp;
            <span class="bi-pen"></span>
           </h5>
          </div>
        </div>
      </div>
      <!-- Section for (next to Kin) -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Next to Kin&nbsp;
            <span class="bi-pen"></span>
           </h5>
          </div>
        </div>
      </div>
    </div>
    <!-- Section for (certificates),(office details1) -->
    <div class="row">
    <!-- Section for (Certificates) -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Certificates&nbsp;
            <span class="bi-pen"></span>
           </h5>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Section for (Office details) -->
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Office details1&nbsp;
            <span class="bi-pen"></span>
           </h5>
          </div>
        </div>
      </div>
      
    </div>
    <!-- Section for (office details2),(delete icon) -->
    <div class="row">

    </div>
  </div>
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
