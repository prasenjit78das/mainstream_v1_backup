<?php 
$page_title='Login Page';
require_once('header.php');
$footer_position="fixed-bottom";
?>
<body style="position:relative;top:0%;">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1>Login</h1>
        <?php $pageURL='page1.php'; ?>
        <form action="<?= urlencode($pageURL);?>" target="_top">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
<?php 
require_once('footer.php');
?>
