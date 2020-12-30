


<?php include 'partials_front/menu.php'; ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="food_search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>


            <?php
            $sql = "SELECT * FROM tbl_category WHERE featured='Yes' AND active='Yes' LIMIT 3";
            $res = mysqli_query($con,$sql);
            $cont = mysqli_num_rows($res);
            if($cont>0){
              while($row=mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $image = $row['image_name'];

                ?>


                <a href="category_food.php?category_id=<?php echo $id; ?>">
                <div class="box-3 float-container">
                  <?php
                   if($image==""){
                     echo "<div class='error'>no image added</div>";
                   }else{
                     ?>
                     <img src="<?php echo URL; ?>images/category/<?php echo $image; ?>" alt="Pizza" class="img-responsive img-curve">
                     <?php
                   }
                   ?>


                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                </div>
                </a>

                <?php
              }
            }else{

            }
             ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php

            $sql2= "SELECT * FROM tbl_food WHERE feature='Yes' AND active='Yes'";
            $res2 = mysqli_query($con,$sql2);

            $count2 = mysqli_num_rows($res2);
            if($count2>0){
              while($row2=mysqli_fetch_assoc($res2)){
                $id1=$row2['id'];
                $title1 = $row2['title'];
                $image_name1 = $row2['image_name'];
                $price1 = $row2['price'];
                $description1 = $row2['description']


                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                      <?php
                      if($image_name1==""){
                        echo "<div class='error'>no image added</div>";
                      } else {
                        ?>
                          <img src="<?php echo URL; ?>images/food/<?php echo $image_name1; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        <?php

                      }?>

                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title1; ?></h4>
                        <p class="food-price">$
                          <?php echo $price1; ?></p>
                        <p class="food-detail">
                            <?php echo $description1; ?>
                        </p>
                        <br>
                          <a href="order.html" class="btn btn-primary">Order Now</a>

                            </div>
                             </div>

                <?php
              }
            }


             ?>


            <!-- <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoky Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Nice Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
 -->

            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
<?php include 'partials_front/footer.php'; ?>
