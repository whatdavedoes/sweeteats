<?php 
$page = 'Dash';
require 'inc/header.php';
require 'inc/menu.php'; 
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mainSection">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          
          
        <div class="btn-toolbar mb-2 mb-md-0">
          <a class="nbLink" href="http://www.nibtrek.com" target="_blank">
            <p class="text-muted font-italic mb-0">Powered by <img style="max-width:30px; position:relative; top: -8px;" src="img/nibtrek_logo_sm.png"> NibTrek</p>
          </a>
        </div>
          
      </div>
        
    <?php echo display_success(); ?>
        
    <?php if (isAdmin()): ?>
      <p>Welcome to the admin area for the website of <?php echo $company ?>. Edit content by clicking on the associated page or post.</p>
        
         <div class="card formCtn mb-4">
    <div class="card-header">
    Company Details
    </div>
    <div class="card-body">   
        <form method="post" action="procedures/updateDetails.php">
        <div class="form-group">
            <label for="inputLocation">Location</label>
            <input value="<?php echo getLocationTxt(); ?>" name="inputLocation" class="form-control" id="inputLocation">
        </div>
        <div class="form-group">
            <label for="inputPhone">Phone</label>
            <input value="<?php echo getPhoneTxt(); ?>" name="inputPhone" class="form-control" id="inputPhone">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input value="<?php echo getEmailTxt(); ?>" name="inputEmail" class="form-control" id="inputEmail">
        </div>
            
        <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div> 
    </div>
        
      <?php elseif(!isAdmin()): ?>
        <div class="alert alert-danger" role="alert">
          You are not an admin and not authorized to update content. Please contact the website owner to become an administrator.
        </div>
        
    <?php endif; ?>
     
      <img class="mt-4" style="display: block; margin: 0 auto; max-width: 300px;" src="img/gear_back-min.png">
      
        
    </main>
      
<?php require 'inc/footer.php'; ?>

