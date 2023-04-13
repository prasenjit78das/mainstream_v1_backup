<?php 
$page_title='Employee Master';
//require_once('../../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
///get role key-value pair
$a_role_array = json_decode($json_role, true);
///get node key-value pair
$a_node_array = json_decode($json_node, true);
///get city key-value pair
$a_city_array = json_decode($json_city, true);
///get designation key-value pair
$a_desig_array = json_decode($json_desig, true);
?>
<style>.lists{display:none;}</style>
<body>
  <div class="container p-2">
    <div class="row">
      <div class="col-md-6">
        <form action="" method="get">
          <div class="input-group">
            <input type="text" name="search" class="form-control input-group-text" placeholder="Search..." 
              value="<?php echo (isset($_GET['search']) ? $_GET['search'] : ''); ?>">
            <input type="hidden" name="view_mode" class="cls_view_mode" value="">
            <button type="submit" class="btn btn-dark input-group-sm">
            <i class="bi-search"></i>
            </button>
          </div>
        </form>
      </div>
      <div class="col-md-2 ">
        <button type="button" class="btn btn-dark input-group-sm" 
                onclick="view_emp('employee_form.php','empid',0,'add')">
          Add Employees
        </button>
      </div>
      <div class="col-md-4 input-group-sm d-flex justify-content-end"
       onclick="toggl()" id="toggle-view">
          <i class="bi-card-list fa-2x" id="us_card"></i>
          <i class="bi-card-heading fa-2x" id="us_list" style="display:none;" ></i>
          <input type="hidden" id="hi_val">
      </div>
    </div>

    <div class="row">
     <div class="col-md-6  d-flex justify-content-right">
      <?php
        for($i=64;$i<=90;++$i){
          if($i==64){
            $v_chr='All';
            $v_chr_val='';
          }
          else{
            $v_chr=chr($i);
            $v_chr_val=$v_chr;
          };
          echo '
          <form action="" method="get">
          <input type="hidden" name="search1" value="'.$v_chr_val.'">
          <input type="hidden" name="view_mode" class="cls_view_mode" value="">
          <button type="submit" class="btn btn-dark p-1 m-1 input-group-sm" >
                '.$v_chr.'
                </button>
                </form>';
        }
      ?>
        
      </div>
      <div class="col-md-6 d-flex justify-content-center">
        
      </div>
    </div>
  </div>
  <div class="container p-1 cls_data_area">
    <?php
    // Search
    

    $where = "";
    if(isset($_GET['search']) && $_GET['search'] != "") {
      $v_srch=$_GET['search'];$v_vimod=$_GET['view_mode'];
      $where = "WHERE (`ftnam` LIKE '%".$v_srch."%'
                        OR `mdnam` LIKE '%".$v_srch."%' 
                        OR `ltnam` LIKE '%".$v_srch."%') 
                        AND `isdel`='N' ORDER BY `ftnam` ASC";
    }
    else if(isset($_GET['search1'])){
      $v_srch1=$_GET['search1'];$v_vimod=$_GET['view_mode'];
      if($_GET['search1'] != ""){
      $where = "WHERE `ftnam` LIKE '".$v_srch1."%' AND `isdel`='N' 
                ORDER BY `ftnam` ASC";
      }
      elseif($_GET['search1'] == ""){
        $where = "WHERE `isdel`='N' ORDER BY `ftnam` ASC";
      }
    }
    else{
      $where = "WHERE `isdel`='N' ORDER BY `ftnam` ASC";$v_vimod="card";
    }
     $v_query="SELECT * FROM `n_mast_emp` " . $where;
    ?>
    <!-- <ul class="list-group"> -->
      <div id="div_cavi">
        <?php include('employee_cardview.php');?>
      </div>
      <div id="div_livi">
        <?php  include('employee_tableview.php');?>
      </div>
    <!-- </ul> -->
  </div>
</body>
<?php 
mysqli_close($con);
require_once('../../footer.php');
?>
<script>
$(document).ready(function() {
  var vimode='<?=$v_vimod;?>';
  if(vimode=='card'){
    $('#div_livi').hide();
    $('#div_cavi').show();
    $('.cls_view_mode').val('card'); 
    $('#hi_val').val('5'); 
  }else if(vimode=='list'){
    $('#div_cavi').hide();
    $('#div_livi').show();
    $('.cls_view_mode').val('list');
    $('#hi_val').val('4');
  }
});

function toggl(){
var v_crdval=$('#hi_val').val();
//alert(v_crdval);
if((v_crdval=='')||(v_crdval=='5')){
  $('#hi_val').val('4');
  $('#div_cavi,#us_card').hide();
  $('#div_livi,#us_list').show();
  $('.cls_view_mode').val('list');
 }else{
  $('#hi_val').val('5'); 
  $('#div_cavi,#us_card').show();
  $('#div_livi,#us_list').hide();
  $('.cls_view_mode').val('card'); 
 }
}

function view_emp(page,arg,value,mode){
  //alert(value);
  var form = $('<form action="' + page + '" method="post">' +
               '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' +
               '<input type="hidden" name="mode" value="' + mode + '"></input>' +
               '</form>');
  $('body').append(form);
  $(form).submit();
};

</script>



