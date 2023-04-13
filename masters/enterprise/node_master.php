<?php 
$page_title='Node Master';
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
  -webkit-transform: rotate(90deg); /* Safari */'
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
  <div class="cls_data_area">
    <div class="row justify-content-left" >
      <div class="col-md-4 cards">
          <div class="card mb-4">
              <div class="shadow p-6 card-body">
                  <h5 class="card-title">Enterprise Structure</h5>
                  <p>          
                    <ul id="myUL">
                      <?php print_tree($i, $con);?>
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
                      <form action="node_insup.php" method="POST" id="fo_insup">
                        <input type="hidden" name="nodid" id="te_nodid">
                        <div class="input-group mb-3 input-group-sm" id="div_nodnm">
                            <span class="input-group-text text-primary" style="width:140pt;">Node Name</span>
                            <input type="text" class="form-control" required name="nodnm" id="te_nodnm" required>
                            <input type="hidden" class="form-control"  name="old_nodnm" id="te_old_nodnm">
                        </div>
                        <div class="input-group mb-3 input-group-sm" id="div_ntpid">
                            <span class="input-group-text text-primary" style="width:140pt;">Node Type</span>
                            <select type="text" class="form-control" required name="ntpid" id="se_ntpid">
                            <option value="">--Select--</option>
                            <?php
                              // Get Node Type data
                              $v_qnodtyp = "SELECT `ntpid`,`ntpnm` FROM `mast_nodtyp`".
                                "ORDER BY `ntpid` ASC;";
                              $a_qnodtypdata=mysqli_query($con,$v_qnodtyp);
                              foreach($a_qnodtypdata as $a_noditems){
                                    $v_ntpid=$a_noditems['ntpid'];
                                    $v_ntpnm=$a_noditems['ntpnm'];
                            ?>
                            <option value="<?=$v_ntpid;?>">
                              <?=$v_ntpnm;?>
                            </option>
                            <?php 
                              }
                            ?>
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-sm" id="div_pndid" style="display:none;">
                            <span class="input-group-text text-primary" style="width:140pt;">Parent Node</span>
                            <select type="text" class="form-control"  name="pndid" id="se_pndid">
                            <option value="">--Select--</option>
                            <?php
                              // Get Node data
                              $v_qmentyp = "SELECT `nodid`,`nodnm` FROM `mast_node`".
                                          "ORDER BY `nodnm` ASC;";
                              $a_qmentypdata=mysqli_query($con,$v_qmentyp);
                              foreach($a_qmentypdata as $a_menitems){
                                    $v_nodid=$a_menitems['nodid'];
                                    $v_nodnm=$a_menitems['nodnm'];
                            ?>
                            <option value="<?=$v_nodid;?>">
                              <?=$v_nodnm;?>
                            </option>
                            <?php 
                              }
                            ?>
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-sm" id="div_descr">
                            <span class="input-group-text text-primary" style="width:140pt;">Description</span>
                            <input type="text" class="form-control" name="descr" id="te_descr">
                        </div>
                        <div class="input-group mb-3 input-group-sm" id="div_addrs">
                            <span class="input-group-text text-primary" style="width:140pt;">Address</span>
                            <textarea  rows="1" class="form-control" name="addrs" id="te_addrs"></textarea>
                        </div>
                        <div class="input-group mb-3 input-group-sm" id="div_gstin">
                            <span class="input-group-text text-primary" style="width:140pt;">GSTIN</span>
                            <input type="text" class="form-control" name="gstin" id="te_gstin">
                        </div>
                        <div class="input-group mb-3 input-group-sm" id="div_bnkdtl">
                            <span class="input-group-text text-primary" style="width:140pt;">Bank Details</span>
                            <input type="text" class="form-control" name="bnkdtl" id="te_bnkdtl">
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
    $qry="select * from `mast_node` where `pndid` = '$i';";
    $a_par=mysqli_query($con, $qry);
    $cnt=mysqli_num_rows($a_par);
    if($cnt==0){
        return(1);
    }
    else{
        foreach($a_par as $a_row){
          echo '<li style="max-width:500pt;"><span class="caret">';
          echo $a_row['nodnm'];
          echo '<span style="position:absolute;right:2%;">';
          ?>
          <span onclick="open_add_div(<?=$a_row['nodid'];?>,'<?=$a_row['nodnm'];?>')">
            <i class="bi-plus-square"></i>
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_edt_div(<?=$a_row['nodid'];?>,'<?=$a_row['nodnm'];?>')">
            <i class="bi-pencil-square"></i>   
          </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span onclick="open_del_div(<?=$a_row['nodid'];?>,'<?=$a_row['nodnm'];?>')">
            <i class="bi-dash-circle"></i>
          </span>
          <?php
          echo '</span>';
          echo '</span>';
          echo '<ul class="nested">';
          print_tree($a_row['nodid'], $con);
          echo '</ul></li>';
        }
    }
}
?>
<script>
    function open_add_div(nodid,nodnm){
        //alert(nodid);
        var v_mssg='';
        if(nodid==0){
            var v_mssg ='Add New Node';
        }
        else if(nodid!=0){
            var v_mssg ='Add node under "'+ nodnm +'"';
        }
        $('#fo_insup').attr('action','node_insup.php');
        var blnk="";
        $('#div_adnod').show();
        $('#te_nodid,#se_pndid').val(nodid);//
        $('#h5_title').html(v_mssg);
        $('#su_sub').html('Add node').attr('name','su_add');
        $('#te_nodnm,#se_ntpid,#te_descr,#te_addrs,#te_gstin,#te_bnkdtl,#te_old_nodnm').val(blnk);
        $('#te_nodnm,#se_ntpid').removeAttr('disabled');
        $('#div_descr,#div_addrs,#div_gstin,#div_bnkdtl').show();
    }
    function open_edt_div(nodid,nodnm){
        //alert(nodid);
        $('#fo_insup').attr('action','node_insup.php');
        $('#te_nodid').val(nodid);
        $('#h5_title').html('Edit Node '+ nodnm);
        $('#su_sub').html('Edit node').attr('name','su_edt');
        $('#te_nodnm,#se_ntpid').removeAttr('disabled');
        $('#div_descr,#div_addrs,#div_gstin,#div_bnkdtl').show();
        // Make an AJAX request to the server-side script 
        //to get the data for the selected record
      $.ajax({
        url: 'node_getiddata.php',
        type: 'get',
        dataType: 'json',
        data: {
          nodid: nodid
        },

        success: function(response) { //alert(response);
            $('#div_adnod').show();
            // The request was successful, update the form with the returned data
            $('#te_nodnm,#te_old_nodnm').val(response[0].nodnm);
            $('#te_nodid').val(response[0].nodid);
            $('#se_pndid').val(response[0].pndid);
            $('#se_ntpid').val(response[0].ntpid);
            $('#te_descr').val(response[0].descr);
            $('#te_addrs').val(response[0].addrs);
            $('#te_gstin').val(response[0].gstin);
            $('#te_bnkdtl').val(response[0].bnkdtl);
          // Add more form fields for each column in the table
        },
        error: function(response) {
          // The request failed, show an error message
          alert('Error: ' + response.responseText);
        }
      });
    }
    function open_del_div(nodid,nodnm){
        //alert(nodid);
        $('#fo_insup').attr('action','node_del.php');
        $('#h5_title').html('Delete Node '+ nodnm);
        $('#su_sub').html('Delete node').attr('name','su_del');
        $('#te_nodnm,#se_ntpid').attr('disabled',true);
        $('#div_descr,#div_addrs,#div_gstin,#div_bnkdtl').css('display','none');
        // Make an AJAX request to the server-side script 
        //to get the data for the selected record
      $.ajax({
        url: 'node_getiddata.php',
        type: 'get',
        dataType: 'json',
        data: {
          nodid: nodid
        },
        success: function(response) { //
            $('#div_adnod').show();
            // The request was successful, update the form with the returned data
            $('#te_nodnm').val(response[0].nodnm);
            $('#te_nodid').val(response[0].nodid);
            $('#se_pndid').val(response[0].pndid);
            $('#se_ntpid').val(response[0].ntpid);
          // Add more form fields for each column in the table
        },
        error: function(response) {
          // The request failed, show an error message
          alert('Error: ' + response.responseText);
        }
      });
    }
</script>