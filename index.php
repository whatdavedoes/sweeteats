<?php
$page = 'Home';
require 'inc/header.php';

$promoActive = getPromoActive();
$promoDay = getPromoDay();

if ( strtolower(Date("l")) == "monday") {
    $dayOfWeek = 1;
} elseif ( strtolower(Date("l")) == "tuesday") {
    $dayOfWeek = 2;
} elseif ( strtolower(Date("l")) == "wednesday") {
    $dayOfWeek = 3;
} elseif ( strtolower(Date("l")) == "thursday") {
    $dayOfWeek = 4;
} elseif ( strtolower(Date("l")) == "friday") {
    $dayOfWeek = 5;
} elseif ( strtolower(Date("l")) == "saturday") {
    $dayOfWeek = 6;
} elseif ( strtolower(Date("l")) == "sunday") {
    $dayOfWeek = 7;
}

?>

<div class="jumbotron sweetBack mb-0">
    
<?php if ($promoActive == 1 && $promoDay == $dayOfWeek) : ?>
    
    <div id="sprinkles">
        
            <div id="sprinkleOne">
                <img class="sprinkle" src="img/r-sprinkle-min.png">
            </div>
        
        <div id="sprinkleTwo">
                <img class="sprinkle" src="img/p-sprinkle-min.png">
            </div>
        
        <div id="sprinkleThree">
                <img class="sprinkle" src="img/y-sprinkle-min.png">
            </div>
        
        <div id="sprinkleFour">
                <img class="sprinkle" src="img/g-sprinkle-min.png">
            </div>
        
           <div id="sprinkleFive">
                <img class="sprinkle" src="img/r-sprinkle-min.png">
            </div>
        
        <div id="sprinkleSix">
                <img class="sprinkle" src="img/p-sprinkle-min.png">
            </div>
        
        <div id="sprinkleSeven">
                <img class="sprinkle" src="img/y-sprinkle-min.png">
            </div>
        
        <div id="sprinkleEight">
                <img class="sprinkle" src="img/g-sprinkle-min.png">
            </div>
        
        <div id="sprinkleNine">
                <img class="sprinkle" src="img/g-sprinkle-min.png">
            </div>
        
        
    </div>

<?php endif; ?>
    
    <div class="container">
        
        
        
        <div class="row">
            <div class="col">
                <div class="jumboCtn mt-2 shadow-lg">
                    
                    <img class="wifi" src="img/wifi-min.png">
                    
                    <div class="sweetLogoCtn mt-2">
                        
                        <?php if ($promoActive == 1 && $promoDay == $dayOfWeek) : ?>

                        <div class="logoGroupCtn">
                            <div class="cakeCtn">
                                <img class="cakeAni" src="img/cupcake-ani-min.png">
                            </div> 
                        </div>

                        <?php endif; ?>
                        
                        <img class="sweetLogo" src="img/sweet_logo-min.png">
                                                
                    </div>
                    
                    
                    <?php if ($promoActive == 1 && $promoDay == $dayOfWeek) : ?> 
                    
                    <div class="alertColor alert alert-dismissible fade show" role="alert">
                          <strong>It's free cupcake <?php echo date("l"); ?>!</strong> Stop in today and grab one.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                    
                    <?php endif; ?>
                    
                    <p style="max-width: 450px;" class="mt-0 lead font-weight-normal text-center centerPara"><?php echo getBannerTxt(); ?></p>
                    
                    
                    <div class="text-center mt-3 mb-2">
                        <a class="btnStory btn btn-outline-secondary" href="/story.php">Our Story</a>
                        <a class="btnVisit btn btn-secondary" href="/contact.php">Contact Us</a>
                    </div>   
            </div>
            </div>
        </div>
    </div>
    
    
    
    
    
</div>

<!--Cakes made to order, treats, delivery, and coffee, we do it all! Stop by your local nowhere, NY USA shop for some sweet eats & coffee.-->

<!--<img class="sweetBorder p-0 m-0" src="img/sweet_border-min.jpg"> -->  
            
            
<div class="container mb-5">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="joe">
                <img class="joeImg" src="img/best_coffee-min.png">
                <span class="joeTxt text-small text-muted"><small>*<?php echo date('Y'); ?> local Upsate, NY region survey</small></span>
                </div>
                
                <div class="mobileFeatures">
                    <img class="javaWifi" src="img/javawifi-min.png">

                    <div class="text-right" style="max-width: 400px; display: block; margin: 0 auto;">
                        <p style="max-width: 160px;" class="text-small text-muted text-left"><small class="text-left">*<?php echo date('Y'); ?> local Upsate, NY region survey</small></p>
                    </div>
                </div>      
                

               
                
                <h1 class="text-center mt-5 mb-4 display-4">What Others Are Saying</h1>
                
            </div>
         
            
<!--<div class="col-md-4 mt-4 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="starCtn">
                        
                        <img class="star" src="img/star-min.png"> 
                        <img class="star" src="img/star-min.png"> 
                        <img class="star" src="img/star-min.png"> 
                        <img class="star" src="img/star-min.png"> 
                        <img class="star" src="img/star-min.png"> 
                    </div>
                    <img class="quote" src="img/quote-min.png">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <footer class="blockquote-footer"><cite title="Source Title">Source Title</cite></footer>
                  </div>
                </div>
    </div> -->     
            
            
                <?php
                 $testimonials = getContent();

                  foreach($testimonials as $testimonial) {
                      $stars = $testimonial['stars'];
                      
                      echo ' <div class="col-md-4 mt-4 mb-4">
                <div class="card">
                  <div class="card-body"><div class="starCtn">';
                      
                      for ($x = 1; $x <= $stars; $x++) {
                          echo '<img class="star" src="img/star-min.png">';
                      }
                      
                      echo '</div><img class="quote" src="img/quote-min.png">
                    <p class="card-text">' . $testimonial['review'] . '</p>';
                      echo '<footer class="blockquote-footer"><cite title="Source Title">' . $testimonial['name'] . '</cite></footer>
                  </div>
                </div>
    </div>       ';
                  }
                ?>
            
        </div>
    

    
    

    
    
    
    
    
    

<?php 
require 'inc/footer.php';
?>