<?php
require 'admin/inc/admin-config.php'; 
require 'admin/inc/database.php';
require 'admin/inc/functions.php';
?>

 <!-- 32 x 32 icon -->    
    <link rel="icon" type="image/png" href="/img/sweet_logo_notxt-min.png">

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
      
    <link rel="stylesheet" href="/css/style.css">

    <title>Sweet Eats | Nowhere, NY</title>
  </head>
  <body>

      
<nav class="sweetNav navbar  navbar-expand-lg navbar-light bg-light sticky-top">
   <div class="container">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <a class="navbar-brand" href="/index.php"><img class="sLogoNoTxt" src="img/sweet_logo_notxt-min.png"></a>
     
  <div class="collapse navbar-collapse" id="navbarsExample08">
    <ul class="navbar-nav">
        
      <li class="nav-item <?php if ($page == 'Home'){echo 'active';} ?>">
        <a class="nav-link" href="/">Home <?php if ($page == 'home'){echo '<span class="sr-only">(current)</span>';} ?></a>
      </li>
        
      <li class="nav-item <?php if ($page == 'Story'){echo 'active';} ?>">
        <a class="nav-link" href="/story.php">Our Story <?php if ($page == 'story'){echo '<span class="sr-only">(current)</span>';} ?></a>
      </li>
        
      <li class="nav-item <?php if ($page == 'Contact'){echo 'active';} ?>">
        <a class="nav-link" href="/contact.php">Contact <?php if ($page == 'contact'){echo '<span class="sr-only">(current)</span>';} ?></a>
      </li>
        
        
    </ul>
  </div>
        
        
  <div class="justify-content-end">
      <img class="locationImg" src="/img/location-min.png">
      <a class="text-muted p-0 m-0 point"><?php echo getLocationTxt(); ?></a>
  </div>        
        
            
  </div>
</nav>
      
<div class="colorBorder sticky-top shadow"></div> 