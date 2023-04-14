<!DOCTYPE html>
<html>
<head>
  <title><?php 
    if (isset($page_title)) {
            echo $page_title;
          } else {
            echo 'Title?';
          }
          $yr = date('Y');
          ?></title>
  <!-- file path information -->
  <?php 
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   $v_root_directory="/mainstream_v1_backup";
   $v_absolutePath="http://localhost".$v_root_directory;
   require_once('connec/connect.php');
   $urc='PDAS';
   require_once('connec/connect_btsp5.php');
   require_once('assets/parent_data_func.php');
  ?>
<script  src="<?=$v_absolutePath;?>/assets/jquery-2.0.3.min.js"></script> 
<link rel="stylesheet" href="<?=$v_absolutePath?>/assets/style.css" type="text/css" />
<link rel="stylesheet" href="<?=$v_absolutePath?>/assets/DataTable/css/jquery.dataTables.min.css" type="text/css" />
<link rel="stylesheet" href="<?=$v_absolutePath?>/assets/DataTable/css/dataTables.custom.css" type="text/css" /> 
</head>
<header class="bg-primary text-white py-2">
  <div class="container">
    <div class="row row justify-content-between">
      <div class="col-auto">
        <a href="#"><img src="<?=$v_absolutePath;?>/assets/images/magebaIndiatp2white.png" alt="Company logo" class="img-fluid" style="width:90pt;"></a>
      </div>
      <div class="col-auto">
        Welcome, <span id="username"><?=$urc;?></span>!
      </div>
    </div>
  </div>
</header>
