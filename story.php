<?php
$page = 'Story';
require 'inc/header.php';
?>
<div class="jumbotron sweetBack mb-0">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumboCtnStory pb-5">
                    
                    <h1 class="display-4">Our Story</h1>
                    <p style="max-width: 450px;" class="mt-0 lead font-weight-normal centerPara"><?php echo getStoryTxt(); ?></p>
                    
                    
                    
                    
            </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="cakeModal" tabindex="-1" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cakeModalLabel">Almond Cocoa Cake</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img class="modalImg" src="img/cake-min.jpg">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="frostingModal" tabindex="-1" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="frostingModalLabel">Frosting Swirl Technique</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img class="modalImg" src="img/frosting-min.jpg">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="cutoutsModal" tabindex="-1" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cutoutsModalLabel">Cutout Classics</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img class="modalImg" src="img/cutouts-min.jpg">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!--<div class="modal fade bd-example-modal-xl" id="cakeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <img class="modalImg" src="img/cake-min.jpg">
    </div>
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>-->

<div class="container">
    <h1 class="display-4 mt-4 text-center">Our Creations</h1>
    <div class="row">
        
    <div class="col-md-4">
        <a data-toggle="modal" data-target="#cakeModal">
          <img class="imgPreview shadow" src="img/cake-min.jpg">
        </a>
    </div>
        
    <div class="col-md-4">
        <a data-toggle="modal" data-target="#frostingModal">
          <img class="imgPreview shadow" src="img/frosting-min.jpg">
        </a>
    </div>
        
    <div class="col-md-4">
        <a data-toggle="modal" data-target="#cutoutsModal">
          <img class="imgPreview shadow" src="img/cutouts-min.jpg">
        </a>
    </div>
                    
               
    </div>

    

<?php 
require 'inc/footer.php';
?>