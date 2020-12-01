<?php
//ini_set('display_errors', 1);
require_once __DIR__ . '/inc/bootstrap.php';

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
        <a href="/"><img class="loginLogo mb-4" src="../img/sweet_logo-min.png"></a>
        
        <div class="card loginCtn mb-4 shadow">
            <div class="card-header">
            Admin Registration
            </div>
            <div class="card-body card-back">   

            <form class="form-signin" method="post" action="procedures/doRegister.php">
                <?php echo display_errors(); echo display_success(); ?>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <br>
                <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                <input type="password" id="inputConfirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                <br>
                
                <p class="text-muted font-italic">*After registration, you will need to be promoted to an admin by the website owner or another admin.</p>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                
                <div class="btn-toolbar mb-0 mt-4 mb-md-0">
                  <a class="rgLink" href="login.php">
                    <p class="text-muted font-italic mb-0">Already an Admin? - Sign In</p>
                  </a>
                </div>
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