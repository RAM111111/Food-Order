<?php include 'partials_front/menu.php'; ?>
<?php
$search = $_POST['search'];
 ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
      <div class="container">
          <h2 class="text-center">Food Menu</h2>

      <?php

      $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
      $res = mysqli_query($con,$sql);

      $count = mysqli_num_rows($res);
      if($count>0){
      while($row = mysqli_fetch_assoc($res)){
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $image_name = $row['image_name'];

        ?>

        <div class="food-menu-box">
            <div class="food-menu-img">
              <?php
              if($image_name !=""){
                ?>
                <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                <?php
              }else {
                echo "no image added";
              }
              ?>

            </div>

            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price">$<?php echo $price; ?></p>
                <p class="food-detail">
                  <?php echo $description; ?>
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>



        <?php
      }
      }else {
        echo "nothing match";
      }

       ?>

            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
<?php include 'partials_front/footer.php'; ?>
