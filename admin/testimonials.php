<?php 
$page = 'Testimonials';
require 'inc/header.php';
require 'inc/menu.php';
requireAdmin();
?>
    
<?php require 'inc/menu.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <?php require 'inc/label.php'; ?>  

<?php echo display_success(); ?>
<?php echo display_errors(); ?>
        
<div class="card formCtn mb-4">
    <div class="card-header">
    Add a Testimonial
  </div>
<div class="card-body">
    <form method="post" action="procedures/addTestimonial.php">
      <div class="form-group">
        <label for="inputName">Name</label>
        <input name="inputName" type="text" class="form-control" id="inputName">
      </div>

      <div class="form-group">
        <label for="inputReview">Review</label>
        <textarea name="inputReview" class="form-control" id="inputReview" rows="3"></textarea>
      </div>

       <div class="form-group">
        <label for="inputStars">Stars</label>
        <select name="inputStars" class="form-control" id="inputStars">
          <option>5</option>
          <option>4</option>
          <option>3</option>
          <option>2</option>
          <option>1</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Add Testimonial</button>
    </form>
</div>
</div>
        
    <!--ADD CONTENT BELOW-->
<?php echo display_neutral(); ?>
        
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Review</th>
      <th scope="col">Stars</th>
      <th scope="col"></th>
    </tr>
  </thead>
<tbody>
        
    <?php
     $testimonials = getContent();
          
      foreach($testimonials as $testimonial) {
          echo '<tr>';
          echo '<td scope="col">' . $testimonial['name'] . '</td>';
          echo '<td scope="col">' . $testimonial['review'] . '</td>';
          echo '<td scope="col">' . $testimonial['stars'] . ' Stars</td>';
          echo '<td scope="col"><form method="post" action="procedures/deleteTestimonial.php"><input type="hidden" name="id" value="';
          echo $testimonial['t_id'];
          echo '"><button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></form></td>';
          echo '</tr>';
      }
    ?>
    
</tbody>
</table>
     
      
    </main>
      
<?php require 'inc/footer.php'; ?>
