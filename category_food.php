<?php include 'partials_front/menu.php'; ?>

<?php
if(isset($_GET['category_id'])){
  $category1 = $_GET['category_id'];
  $sql = "SELECT title FROM tbl_category WHERE id = '$category'";
  $res = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($res);
  $category = $row['title'];
}else {
  $_SESSION['no_cat_id']="no category_id";
  header('location:'.URL.category_food.php);


}

 ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <h2>Foods on <a href="#" class="text-white"><?php echo $category; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            $sql1 = "SELECT * FROM tbl_food WHERE category_id='$category1'";
            $res1 = mysqli_query($con,$sql1);
            $count1 = mysqli_num_rows($res1);
            if($count1>0){
              while ($row1=mysqli_fetch_assoc($res1)) {
                $title = $row1['title'];
                $price = $row1['price'];
                $image_name = $row1['image_name'];
                $description = $row1['description'];

                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                <?php
                if($image_name != ""){
                  ?>
                <img src=" <?php echo URL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                  <?php

                }else {
                  echo "no food";
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
              echo "no ";
            }


             ?>





            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
<?php include 'partials_front/footer.php'; ?>
