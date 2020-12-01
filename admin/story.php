<?php 
//ini_set('display_errors', 1);

$page = 'Story';

require 'inc/header.php';
require 'inc/menu.php';

requireAdmin();

$storyTxt = getStoryTxt();

?>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mainSection">
    <?php require 'inc/label.php'; ?>  
        
    <!--ADD CONTENT BELOW-->
    <?php echo display_success(); ?>
        
    <div class="card formCtn mb-4">
    <div class="card-header">
    Update Story Text
    </div>
    <div class="card-body">   
        <form method="post" action="procedures/updateStoryTxt.php">
        <div class="form-group">
            <label for="inputStory">Text</label>
            <textarea name="inputStoryTxt" class="form-control" id="inputStoryTxt" rows="5"><?php echo $storyTxt; ?></textarea>
        </div>
            
        <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div> 
    </div>
        
        
    </main>
      
<?php require 'inc/footer.php'; ?>