<?php 
$page_title='Menu-Role';
//require_once('../../connec/session.php');
require_once('../../header.php');
require_once('../../navmenu.php');
$footer_position="fixed-bottom";
$v_disp='';
?>
<body>
<div class="container-fluid">
    <div class="row justify-content-left" >
      <div class="col-md-10">
        <div class="col-md-4 cards" id="div_adnod">
          <div class="card mb-4">
            <div class="shadow p-2 card-body">
              <h5 class="card-title" id="h5_title"></h5>
              <div class="input-group mb-3 input-group-sm" id="div_nodid">
                  <span class="input-group-text text-primary" style="width:100pt;">
                    Business unit
                  </span>
                  <select type="text" class="form-control"  name="nodid" id="se_nodid" 
                    onchange="f_search_combi(),f_fetch_bu_dept('se_nodid','se_depid')">
                  <option value="">--Select--</option>
                  <?php
                    // Get node data
                    $v_qnod = "SELECT `nodid`,`nodnm` FROM `mast_node`
                                  WHERE `pndid`='1'
                                  ORDER BY `nodnm` ASC;";
                    $a_qnoddata=mysqli_query($con,$v_qnod);
                    foreach($a_qnoddata as $a_noditems){
                            $v_tnodid=$a_noditems['nodid'];
                            $v_tnodnm=$a_noditems['nodnm'];
                  ?>
                    <option value="<?=$v_tnodid;?>">
                      <?=$v_tnodnm;?>
                    </option>
                  <?php 
                    }
                  ?>
                  </select>
                </div>
                <div class="input-group mb-3 input-group-sm" id="div_depid">
                  <span class="input-group-text text-primary" style="width:100pt;">
                    Department
                  </span>
                  <select type="text" class="form-control"  name="depid" id="se_depid" onchange="f_search_combi()">
                  <option value="">--Select--</option>
                  </select>
                </div>

                <div class="input-group mb-3 input-group-sm" id="div_modid">
                  <span class="input-group-text text-primary" style="width:100pt;">Module</span>
                  <select type="text" class="form-control"  name="modid" id="se_modid" onchange="f_search_combi()">
                  <option value="">--Select--</option>
                  <?php
                    // Get module data
                    $v_qmod = "SELECT `modid`,`modnm` FROM `n_mast_module`".
                                  "ORDER BY `modnm` ASC;";
                    $a_qmoddata=mysqli_query($con,$v_qmod);
                    foreach($a_qmoddata as $a_moditems){
                            $v_tmodid=$a_moditems['modid'];
                            $v_tmodnm=$a_moditems['modnm'];
                  ?>
                    <option value="<?=$v_tmodid;?>">
                      <?=$v_tmodnm;?>
                    </option>
                  <?php 
                    }
                  ?>
                  </select>
                </div>
                <div class="input-group mb-3 input-group-sm" id="div_rolid">
                  <span class="input-group-text text-primary" style="width:100pt;">Role</span>
                  <select type="text" class="form-control"  name="rolid" id="se_rolid" onchange="f_search_combi()">
                  <option value="">--Select--</option>
                  <?php
                    // Get Role data
                    $v_qrole = "SELECT `rolid`,`rolnm` FROM `n_mast_role_name`".
                                  "ORDER BY `rolnm` ASC;";
                    $a_qroledata=mysqli_query($con,$v_qrole);
                    foreach($a_qroledata as $a_rolitems){
                            $v_trolid=$a_rolitems['rolid'];
                            $v_trolnm=$a_rolitems['rolnm'];
                  ?>
                  <option value="<?=$v_trolid;?>">
                    <?=$v_trolnm;?>
                  </option>
                  <?php 
                    }
                  ?>
                  </select>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="input-group p-2 input-group-sm d-flex justify-content-end"
            onclick="f_add_combi()">
         <span class="input-group-text text-light bg-dark">Map Menu->Role</span>
        <button type='button' class="bi-plus-square" >
        </button>
      </div>
    </div>
    <div class="col-md-12 cards cls_data_area" id="div_tree_view">
      
    </div>
  </div>
</div>
</body>
<?php
 require_once('../../footer.php');
?>
<script>
  function f_search_combi(){
       var blank ='';
       var v_nodid=$('#se_nodid').val();
       var v_modid=$('#se_modid').val();
       var v_rolid=$('#se_rolid').val();
       var v_depid=$('#se_depid').val();
       if((v_nodid!='')&&(v_modid!='')&&(v_rolid!='')&&(v_depid!='')){
        var txt = v_nodid+'~'+v_modid+'~'+v_rolid+'~'+v_depid;
        //alert(txt);
        $.post('menu_role_getiddata.php', {qs: txt}, function(result){
          //alert(result);
          $("#div_tree_view").html(result);
          $('#se_nodid').val(v_nodid);
          $('#se_modid').val(v_modid);
          $('#se_rolid').val(v_rolid);
          $('#se_depid').val(v_depid);
        });
      }else{
        //alert('Select all');
        $("#div_tree_view").html(blank);
      }
    }
    function f_add_combi(){
       var blank ='';
       var v_nodid=$('#se_nodid').val();
       var v_modid=$('#se_modid').val();
       var v_depid=$('#se_depid').val();
       var v_rolid=$('#se_rolid').val();
       if((v_nodid!='')&&(v_modid!='')&&(v_rolid!='')&&(v_depid!='')){
        var txt = v_nodid+'~'+v_modid+'~'+v_rolid+'~'+v_depid;
        //alert(txt);
        $.post('menu_role_ins_form.php', {qs: txt}, function(result){
          //alert(result);
          $("#div_tree_view").html(result);
          $('#se_nodid').val(v_nodid);
          $('#se_modid').val(v_modid);
          $('#se_rolid').val(v_rolid);
          $('#se_depid').val(v_depid);
        });
      }else{
        //alert('Select all');
        $("#div_tree_view").html(blank);
      }
    }
</script>
<script>
 //fetch Department name as per BU selection
//and append the department select element.
function f_fetch_bu_dept(get_id,append_id) { //alert('clicked');
  var id = $('#'+get_id).val(); //alert(id);
// Make an AJAX request to the server-side script to 
$.ajax({
  url: '../../assets/employee_bu_dept.php',
  type: 'POST',
  data: {buid: id},
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