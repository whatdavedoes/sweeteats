<?php 
$page = 'Home';
require 'inc/header.php';
require 'inc/menu.php';
requireAdmin();
$bannerTxt = getBannerTxt();

$promoActive = getPromoActive();
$promoDay = getPromoDay();
?>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mainSection">
    <?php require 'inc/label.php'; ?>  
        
    <!--ADD CONTENT BELOW-->
    <?php echo display_success(); ?>
        
    <div class="card formCtn mb-4">
    <div class="card-header">
    Home Banner Text
    </div>
    <div class="card-body">   
        <form method="post" action="procedures/updateBannerTxt.php">
        <div class="form-group">
            <label class="sr-only" for="inputBannerTxt">Text</label>
            <textarea name="inputBannerTxt" class="form-control" id="inputBannerTxt" rows="5"><?php echo $bannerTxt; ?></textarea>
        </div>
            
        <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div> 
    </div>
        
        
     <div class="card formCtn mb-4">
    <div class="card-header">
    <img class="colorCake mr-2" src="img/color-cake-min.png"> Free Cupcake Promotion
    </div>
    <div class="card-body">   
        
        
        <form method="post" action="procedures/updatePromo.php">
        <div class="form-group">
            
            <span class="lead mr-1"><strong>Free Cupcake</strong></span>
            
            <div class="cPromoSelect">
                <select name="inputDay" class="form-control" id="inputDay">
                  <option <?php if ($promoDay == 1){echo 'selected';} ?> value="1">Monday</option>
                  <option <?php if ($promoDay == 2){echo 'selected';} ?> value="2">Tuesday</option>
                  <option <?php if ($promoDay == 3){echo 'selected';} ?> value="3">Wednesday</option>
                  <option <?php if ($promoDay == 4){echo 'selected';} ?> value="4">Thursday</option>
                  <option <?php if ($promoDay == 5){echo 'selected';} ?> value="5">Friday</option>
                  <option <?php if ($promoDay == 6){echo 'selected';} ?> value="6">Saturday</option>
                  <option <?php if ($promoDay == 7){echo 'selected';} ?> value="7">Sunday</option>
                </select>
            </div>
            
            <span class="lead mx-1"><strong>is</strong></span>
            
            <div class="cPromoSelect">
                <select name="inputActive" class="form-control" id="inputActive">
                  <option <?php if ($promoActive == 1){echo 'selected';} ?> value="1">Active</option>
                  <option <?php if ($promoActive == 0){echo 'selected';} ?> value="0">Not Active</option>
                </select>
            </div>
            
            <span class="lead"><strong>.</strong></span>
            
            
            
        </div>
            
            <ul>
        <li>Color Changing Dismissable Alert Box</li>
        <li>Sprinkle Animation</li>
        <li>Logo Animation</li>
        </ul>
            
        <button type="submit" class="btn btn-primary">Update Promotion</button>

        </form>
    </div> 
    </div>
        
        
    </main>
      
<?php require 'inc/footer.php'; ?>
