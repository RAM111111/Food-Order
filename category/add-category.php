<?php include('../admin/partials/menu.php') ?>

<div class="main-content">
  <div class="wrapper">
    <h1>add Category</h1>
    <br><br>
    <?php
    if(isset($_SESSION['add_cat'])){
      echo $_SESSION['add_cat'];
      unset($_SESSION['add_cat']);
    }
     ?>
     <br><br>
    <form action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>Title:</td>
          <td>
          <input type="text" name="title" placeholder="category title">
          </td>
        </tr>

        <tr>
          <td>Featured:</td>
          <td>
          <input type="radio" name="Featured" value="yes"> yes
          <input type="radio" name="Featured" value="no"> no
          </td>
        </tr>

        <tr>
          <td>Active:</td>
          <td>
          <input type="radio" name="Active" value="yes"> yes
          <input type="radio" name="Active" value="no"> no
          </td>
        </tr>

        <tr>
          <td colspan="2">
          <input type="submit" name="Submit" value="add category" class="btn-secondary">

          </td>
        </tr>
      </table>
    </form>



    <?php
if(isset($_POST['Submit'])){

  $titlee = $_POST['title'];

  if(isset($_POST['Featured'])){
    $featured = $_POST['Featured'];
  }else {
    $featured = "No";
  }

  if(isset($_POST['Active'])){
    $active = $_POST['Active'];
  }else {
    $active = "No";
  }

  $sql = "INSERT INTO tbl_category SET
          title ='$titlee',
          featured ='$featured',
          active ='$active'
            ";

            echo $titlee;
            echo $featured;
            echo $active;



$res = mysqli_query($con,$sql);
if($res==true){
  $_SESSION['add_cat'] = "<div class='success'>successfuly</div>";
  header('location:'.URL.'admin/manage-category.php');
}else{
  $_SESSION['add_cat'] = "<div class='error'>err</div>";
  header('location:'.URL.'category/add-category.php');
}

}
     ?>
  </div>
</div>

<?php include('../admin/partials/footer.php') ?>
