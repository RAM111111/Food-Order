
<?php include 'partials_front/menu.php'; ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
             $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

             $res = mysqli_query($con,$sql);

             $count = mysqli_num_rows($res);

             if($count>0){
               while ($row=mysqli_fetch_assoc($res)) {
                 $title=$row['title'];
                 $image = $row['image_name'];

                 ?>
                 <a href="category-foods.html">
                 <div class="box-3 float-container">
                  <?php if($image==""){
                    echo "no category image added";
                  }else {
                    ?>
                      <img src="<?php echo URL; ?>images/category/<?php echo $image; ?>" alt="Pizza" class="img-responsive img-curve">
                    <?php
                  } ?>


                     <h3 class="float-text text-white"><?php echo $title; ?></h3>
                 </div>
                 </a>

                 <?php
               }
             }else{
               echo "<div class='error'>no categories</div>";
             }
             ?>




            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include 'partials_front/footer.php'; ?>
