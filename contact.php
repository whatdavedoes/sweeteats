<?php
$page = 'Contact';
require 'inc/header.php';
?>
<div class="jumbotron sweetBack mb-0">
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumboCtn">
                    <h1 class="display-4 border-bottom mb-4">Contact</h1>
                    <p>Place an order, request a custom cake or ask a question.</p>
                    
                    <div class="cImgCtn mt-2">
                        <img class="locationImg" src="/img/location-min.png">
                        <a class="text-muted p-0 m-0 point"><?php echo getLocationTxt(); ?></a>
                    </div>
                    
                    <div class="cImgCtn mt-2">
                        <img class="phoneImg" src="/img/phone-min.png">
                        <a class="text-muted p-0 m-0 point"><?php echo getPhoneTxt(); ?></a>
                    </div>
                    
                    <div class="cImgCtn mt-2">
                        <img class="emailImg" src="/img/email-min.png">
                        <a class="text-muted p-0 m-0 point"><?php echo getEmailTxt(); ?></a>
                    </div>
                    
                    
                   
                    
            </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    

<?php 
require 'inc/footer.php';
?>