<?php 
//ini_set('display_errors', 1);
require 'bootstrap.php';

//tells system where to find .env file
/*$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();*/

/*$session = new \Symfony\Component\HttpFoundation\Session\Session();
$session->start();*/

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
    <link href="/admin/css/dashboard.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">
  </head>
    
    
  <body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/index.php"><?php echo $company; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
        
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    <?php
        /*if (request()->cookies->has('access_token')) {
            echo "logged in";
        } 
        
        if (!isAuthenticated()) : */?>
      <a class="navLink" href="/admin/account.php">Change Password</a>
      <a class="navLink" href="/admin/procedures/doLogout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">