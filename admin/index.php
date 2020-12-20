<?php
include('partials/menu.php');
  ?>

        <!--  main-content   -->
<div class="main-content">
<div class="wrapper">

<h1>Dashboard</h1>
<?php
if(isset($_SESSION['login'])){
echo $_SESSION['login'];
unset($_SESSION['login']);
}
 ?>
<br><br>
<div class="col-4 text-center">
  <h1>5</h1>
  Category
</div>

<div class="col-4 text-center">
  <h1>5</h1>
  Category
</div>

<div class="col-4 text-center">
  <h1>5</h1>
  Category
</div>

<div class="col-4 text-center">
  <h1>5</h1>
  Category
</div>



<div class="clearfix">

</div>
</div>
</div>
    <!--  End-main-content   -->
    <?php
    include('partials/footer.php');
      ?>
