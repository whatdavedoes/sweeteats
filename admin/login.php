<?php
//ini_set('display_errors', 1);
require_once __DIR__ . '/inc/bootstrap.php';
      
if(isAuthenticated()) {
    redirect('/admin/dash.php');
}
      
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <div class="card-header lightBack">
            Admin Sign In
            </div>
            <div class="card-body card-back">   

            <form class="form-signin" method="post" action="procedures/doLogin.php">
                <?php echo display_errors(); display_neutral();?>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                
                <div class="btn-toolbar mb-0 mt-4 mb-md-0">
                  <a class="rgLink" href="register.php">
                    <p class="text-muted font-italic mb-0">Admin Registration</p>
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
