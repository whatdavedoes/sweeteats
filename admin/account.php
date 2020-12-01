<?php
//ini_set('display_errors', 1);
require_once __DIR__ . '/inc/bootstrap.php';
requireAuth();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title><?php echo $company; ?> Dashboard | NibTrek</title>

     <link rel="icon" type="image/png" href="/admin/img/logo-ico-min.png">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="/admin/css/bootstrap.min.css">

      
      
    <!-- Custom styles for this template -->
    
    <link href="/css/style.css" rel="stylesheet">
  </head>
    
    
  <body>


<div class="container">
    <div class="row">
    <div class="col-md-12">
        <img class="loginLogo" src="../img/sweet_logo-min.png">
        <a style="text-align: center; display: block;" href="/admin/dash.php">Back to Dashboard</a>
        <div class="card loginCtn mb-4">
            <div class="card-header">
            Change Password
            </div>
            <div class="card-body card-back">   

            <form class="form-signin" method="post" action="procedures/changePassword.php">
                <?php echo display_errors(); echo display_success(); ?>
                <label for="inputCurrentPassword" class="sr-only">Current Password</label>
                <input type="password" id="inputCurrentPassword" name="current_password" class="form-control" placeholder="Current Password" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">New Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder=" New Password" required>
                <br>
                <label for="inputConfirmPassword" class="sr-only">Confirm New Password</label>
                <input type="password" id="inputConfirmPassword" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
            </form>

            </div> 
        </div>
        
        <div class="btn-toolbar mb-2 mb-md-0">
          <a class="nbLink" href="http://www.nibtrek.com" target="_blank">
            <p class="text-muted font-italic mb-0">Powered by <img style="max-width:30px; position:relative; top: -8px;" src="img/nibtrek_logo_sm.png"> NibTrek</p>
          </a>
        </div>
        
    </div>
    </div>
</div>

<?php require_once __DIR__ . '/inc/footer.php'; ?>