<?php 
$page_title='Menu Master';
//require_once('../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
$i=0;

?>
<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>
<body>

<div class="row justify-content-left cls_data_area" >
  <div class="col-md-4 cards">
      <div class="card mb-4">
          <div class="shadow p-6 card-body">
              <h5 class="card-title">Menu Structure</h5>
              <p>          
                <ul id="myUL">
                  <?php print_tree_new_v1($i, $con);?>
                </ul>
              </p>
          </div>
      </div>
  </div>
    <div class="col-md-6 cards" id="div_adnod" style="display:none;">
        <div class="card mb-6 sticky-top">
            <div class="shadow p-2 card-body">
                <h5 class="card-title" id="h5_title"></h5>
                <p class="card-text">
                  <form action="menu_insup.php" method="POST" id="fo_insup">
                    <input type="hidden" name="menid" id="te_menid">
                    <div class="input-group mb-3 input-group-sm" id="div_modid">
                        <span class="input-group-text text-primary" style="width:140pt;">Module Name</span>
                        <select type="text" class="form-control"  name="modid" id="se_modid">
                        <option value="">--Select--</option>
                        <?php
                          // Get Module data
                          $v_qmodtyp = "SELECT `modid`,`modnm` FROM `n_mast_module`".
                                       "ORDER BY `modnm` ASC;";
                          $a_qmodtypdata=mysqli_query($con,$v_qmodtyp);
                          foreach($a_qmodtypdata as $a_moditems){
                                 $v_modid=$a_moditems['modid'];
                                 $v_modnm=$a_moditems['modnm'];
                        ?>
                        <option value="<?=$v_modid;?>">
                          <?=$v_modnm;?>
                        </option>
                        <?php 
                          }
                        ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 input-group-sm" id="div_mennm">
                        <span class="input-group-text text-primary" style="width:140pt;">Menu Name</span>
                        <input type="text" class="form-control" required name="mennm" id="te_mennm" required>
                        <input type="hidden" class="form-control"  name="old_mennm" id="te_old_mennm">
                    </div>
                    <div class="input-group mb-3 input-group-sm" id="div_pnmid" style="display:none;">
                        <span class="input-group-text text-primary" style="width:140pt;">Parent Menu</span>
                        <select type="text" class="form-control"  name="pnmid" id="se_pnmid">
                        <option value="">--Select--</option>
                        <?php
                          // Get Menu data
                          $v_qmentyp = "SELECT `menid`,`mennm` FROM `n_mast_menu`".
                                       "ORDER BY `mennm` ASC;";
                          $a_qmentypdata=mysqli_query($con,$v_qmentyp);
                          foreach($a_qmentypdata as $a_menitems){
                                 $v_menid=$a_menitems['menid'];
                                 $v_mennm=$a_menitems['mennm'];
                        ?>
                        <option value="<?=$v_menid;?>">
                          <?=$v_mennm;?>
                        </option>
                        <?php 
                          }
                        ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 input-group-sm" id="div_aspnm">
                        <span class="input-group-text text-primary" style="width:140pt;">Associated Page Name</span>
                        <input type="text" class="form-control" name="aspnm" id="te_aspnm">
                    </div>
                    <div class="input-group mb-3 input-group-sm" id="div_fsusr">
                        <span class="input-group-text text-primary" style="width:140pt;">Only for SuperUsers?</span>
                        <select id="se_fsusr" name="fsusr" class="form-control"  required>
                          <option value="">--Select--</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                    </div>
                    <div class="input-group mb-3 input-group-sm d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary" id="su_sub">Submit</button>
                    </div>
                  </form>
                </p>
            </div>
        </div>
    </div>
</div>

</body>
<script>
var toggler = document.getElementsByClassName("caret");
var i;
for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}
</script>
<?php
require_once('../../footer.php');
?>
<?php
function print_tree($i, $con){
    $qry="select * from `n_mast_menu` where `pnmid` = '$i';";
    $a_par=mysqli_query($con, $qry);
    $cnt=mysqli_num_rows($a_par);
    if($cnt==0){
        return(1);
    }
    else{
        foreach($a_par as $a_row){
          echo '<li style="max-width:500pt;"><span class="caret">';
          echo $a_row['mennm'];
          echo '<span style="position:absolute;right:2%;">';
          ?>
          <span onclick="open_add_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-plus-square"></i>
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_edt_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-pencil-square"></i> 
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_del_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-dash-circle"></i>
          </span>
          <?php
          echo '</span>';
          echo '</span>';
          echo '<ul class="nested">';
          print_tree($a_row['menid'], $con);
          echo '</ul></li>';
        }
    }
}

?>
<?php
function print_tree_new($i, $con){
  $v_modnm='';
    $qry="select * from `n_mast_menu` where `pnmid` = '$i';";
    $a_par=mysqli_query($con, $qry);
    $cnt=mysqli_num_rows($a_par);
    if($cnt==0){
        return(1);
    }
    else{
        foreach($a_par as $a_row){
          echo '<li style="max-width:500pt;"><span class="caret">';
          ///get module name
          $v_modid= $a_row['modid'];
          $qryy="SELECT `modnm` FROM `n_mast_module` where `modid` = '$v_modid';";
          $a_pary=mysqli_query($con, $qryy);
            foreach ($a_pary as $moddata) {
              $v_modnm=false;
              if(isset($moddata['modnm'])){
                $v_modnm = $moddata['modnm'];
              }else{$v_modnm='';}
            }
         echo$v_modnm; 
          echo $a_row['mennm'];
          echo '<span style="position:absolute;right:2%;">';
          ?>
          <span onclick="open_add_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-plus-square"></i>
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_edt_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-pencil-square"></i> 
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_del_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-dash-circle"></i>
          </span>
          <?php
          echo '</span>';
          echo '</span>';
          echo '<ul class="nested">';
          print_tree_new($a_row['menid'], $con);
          echo '</ul></li>';
        }
    }
}
?>
<?php
function print_tree_new_v1($i, $con){
  $v_modnm='';
  $v_qurmod="SELECT Distinct(`modid`) FROM `n_mast_menu` ORDER BY `modid` ASC";
  $a_module=mysqli_query($con, $v_qurmod);
  foreach($a_module as $a_modnm){
    $v_modid= $a_modnm['modid']; 
      ///get module name
      $qryy="SELECT `modnm` FROM `n_mast_module` where `modid` = '$v_modid';";
      $a_pary=mysqli_query($con, $qryy);
        foreach ($a_pary as $moddata) {
          $v_modnm=false;
          if(isset($moddata['modnm'])){
            $v_modnm = $moddata['modnm'];
          }else{$v_modnm='';}
        }
      echo$v_modnm;
  
    $qry="select * from `n_mast_menu` where `pnmid` = '$i' AND ``='$v_modid';";
    $a_par=mysqli_query($con, $qry);
    $cnt=mysqli_num_rows($a_par);
    if($cnt==0){
        return(1);
    }
    else{
        foreach($a_par as $a_row){
          echo '<li style="max-width:500pt;"><span class="caret">';
 
          echo $a_row['mennm'];
          echo '<span style="position:absolute;right:2%;">';
          ?>
          <span onclick="open_add_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-plus-square"></i>
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_edt_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-pencil-square"></i> 
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_del_div(<?=$a_row['menid'];?>,'<?=$a_row['mennm'];?>','<?=$a_row['modid'];?>')">
            <i class="bi-dash-circle"></i>
          </span>
          <?php
          echo '</span>';
          echo '</span>';
          echo '<ul class="nested">';
          print_tree_new_v1($a_row['menid'], $con);
          echo '</ul></li>';
        }
    }
}
}
?>

<script>
    function open_add_div(menid,mennm,modid){
        //alert(pndid);
        var v_mssg='';
        if(menid==0){
            var v_mssg ='Add New Menu';
        }
        else if(menid!=0){
            var v_mssg ='Add menu under "'+ mennm +'"';
        }
        if(modid==0){
           // var v_mssg ='Add New Menu';
           $('#se_modid').removeAttr('readonly');
        }
        else if(modid!=0){
            //var v_mssg ='Add menu under "'+ mennm +'"';
            $('#se_modid').attr('readonly',true).css('pointer-events','none');
        }
        $('#fo_insup').attr('action','menu_insup.php');
        var blnk="";
        $('#div_adnod').show();
        $('#se_modid').val(modid);
        $('#te_menid').val(menid);//
        $('#h5_title').html(v_mssg);
        $('#su_sub').html('Add Menu').attr('name','su_add');
        $('#te_mennm,#se_pnmid,#te_aspnm,#se_fsusr,#te_old_mennm').val(blnk);
        $('#te_mennm,#se_menid,#se_pnmid,#te_aspnm,#se_fsusr').removeAttr('disabled');
    }
    function open_edt_div(menid,mennm,modid){
        //alert(nodid);
        $('#fo_insup').attr('action','menu_insup.php');
        $('#se_modid').val(modid);
        $('#te_menid').val(menid);
        $('#h5_title').html('Edit Menu "'+ mennm +'"');
        $('#su_sub').html('Edit Menu').attr('name','su_edt');
        $('#te_mennm,#se_menid,#se_pnmid,#te_aspnm,#se_fsusr').removeAttr('disabled');
        // Make an AJAX request to the server-side script 
        //to get the data for the selected record
      $.ajax({
        url: 'menu_getiddata.php',
        type: 'get',
        dataType: 'json',
        data: {
          menid: menid
        },

        success: function(response) { //alert(response);
            $('#div_adnod').show();
            // The request was successful, update the form with the returned data
            $('#te_mennm,#te_old_mennm').val(response[0].mennm);
            $('#te_menid').val(response[0].menid);
            $('#se_modid').val(response[0].modid);
            $('#se_pnmid').val(response[0].pnmid);
            $('#te_aspnm').val(response[0].aspnm);
            $('#se_fsusr').val(response[0].fsusr);
          // Add more form fields for each column in the table
        },
        error: function(response) {
          // The request failed, show an error message
          alert('Error: ' + response.responseText);
        }
      });
    }
    function open_del_div(menid,mennm,modid){
        //alert(nodid);
        $('#fo_insup').attr('action','menu_del.php');
        $('#se_modid').val(modid);
        $('#te_menid').val(menid);
        $('#h5_title').html('Delete Menu "'+ mennm +'"');
        $('#su_sub').html('Delete Menu').attr('name','su_del');
        $('#te_mennm,#se_menid,#se_pnmid,#se_modid,#te_aspnm,#se_fsusr').attr('disabled',true);
        // Make an AJAX request to the server-side script 
        //to get the data for the selected record
      $.ajax({
        url: 'menu_getiddata.php',
        type: 'get',
        dataType: 'json',
        data: {
          menid: menid
        },
        success: function(response) { //
            $('#div_adnod').show();
            // The request was successful, update the form with the returned data
            $('#te_mennm').val(response[0].mennm);
            $('#se_modid').val(response[0].modid);
            $('#se_menid').val(response[0].menid);
            $('#se_pnmid').val(response[0].pnmid);
            $('#te_aspnm').val(response[0].aspnm);
            $('#se_fsusr').val(response[0].fsusr);
          // Add more form fields for each column in the table
        },
        error: function(response) {
          // The request failed, show an error message
          alert('Error: ' + response.responseText);
        }
      });
    }
</script>