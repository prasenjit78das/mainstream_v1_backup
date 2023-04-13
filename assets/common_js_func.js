//
function searchAndHideTableRows(src_id) {
    //alert(src_id);
    var searchQuery = document.getElementById(src_id).value;
    //alert(searchQuery);
    const tbody = document.querySelector('tbody'); // select the tbody element
    const rows = tbody.querySelectorAll('tr'); // get all rows in the tbody
    
    rows.forEach(row => {
      const cells = row.querySelectorAll('td'); // get all cells in the row
      let matchFound = false; // flag to indicate if a cell in the row contains the search query
      
      cells.forEach(cell => {
        const cellText = cell.textContent.toLowerCase(); // get the text content of the cell in lowercase
        
        if (cellText.includes(searchQuery.toLowerCase())) { // check if the cell text contains the search query (also in lowercase)
          matchFound = true; // set the flag to true if a match is found
        }
      });
      
      if (matchFound) {
        row.style.display = ''; // show the row if a match is found
      } else {
        row.style.display = 'none'; // hide the row if no match is found
      }
    });
  }
//function to check alphanumeric characters of input element with ID 
function f_allow_alphanumeric(strid) {
    var str1 = document.getElementById(strid).value;
    var str = String(str1);
    var msg='';
    // Check for alphanumeric characters
    var regex = /^[a-zA-Z0-9]+$/;
    if(!regex.test(str)) {
      msg = "String should contain only alphanumeric characters.";
      alert(msg);
    }else{
    }
   }
//function to block special characters of input element with ID 
function f_block_specialChar(strid) {
    var str1 = document.getElementById(strid).value;
    var str = String(str1);
    var msg='';
    // Check for special characters
    var specialChar = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if(specialChar.test(str)) {
      msg = "String should not contain special characters.";
      alert(msg);
    }else{
    }
   }
//function to Check for length of string (should be between 6 to 16 characters)
// of input element with ID 
function f_check_strlng(strid) {
      var str1 = document.getElementById(strid).value;
      var str = String(str1);
      var msg='';
    // Check for length of string
    if(str.length < 6 || str.length > 16) {
     msg= "String should be between 6 and 16 characters.";
    alert(msg);
  }else{
 }
}
///File upload check Size and array of extensions
function f_upload_file(arg,size,ext,apendto,uldbtn){
  var blnk="";
  var v_file = $('<input type="file" name="'+ arg +'" class="input-group-sm btn btn-dark '+ 
                 'form-control cls_fileset_2" style="width:100%;">');
  //alert(v-file);
  $('#'+apendto).append(v_file);
  $('#'+uldbtn).hide();
//section controlling file size and extension
  $('input[name='+arg+']').change(function () {
    var szj = this.files[0].size/1024;
    var extj = this.value.match(/\.(.+)$/)[1];
    if(szj > size){
      var v_flmsg='Maximum '+size+'Kb is allowed. '
    }else{
      var v_flmsg='';
    }
    if($.inArray(extj, ext) !== -1){
      var v_msg='';
    }
    else{
      var v_msg='Allowed file etensions are '+ext+'.';
    }
    if((szj <= size)&&($.inArray(extj, ext) !== -1)){
        $('input[type="submit"]').attr('disabled', false);  
    }
    else {
          $('input[type="submit"]').attr('disabled', true);
          $('input[name='+arg+']').val(blnk);  
          alert(''+v_flmsg+v_msg+'');
    }

});

};
///Delete confirmation 
function f_del_conf(append_id){
  //alert(append_id);
  $('#'+append_id)
  .append( 
    '<div class="container mt-3 del_alert"><div class="alert alert-warning" ><strong id="alert-text">Are you sure to delete the entry ?</strong></div><input type="button" class="btn btn-secondary btn-sm"  name="su_del" value="Delete" onclick="deleteRecord()"/></div>'
    );
    $('#bu_btn').hide(); 
}
