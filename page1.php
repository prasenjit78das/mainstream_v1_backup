<?php 
$page_title='Index Page';
require_once('header.php');
require_once('navmenu.php');
$footer_position="fixed-bottom";
?>
<body>

<div class="container-fluid p-5 text-white text-center" style="background-color:#003A8C;">
<div class="col-auto">
        <a href="#"><img src="assets/images/n3.jpg" alt="Company logo" class="img-fluid"></a>
      </div>
</div>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <h3>Column 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>

</body>

<?php 
require_once('footer.php');
?>