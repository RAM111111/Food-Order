<?php include('partials/menu.php');?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Admin</h1>
    <br><br>


    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($con,$sql);
    if($res==true){
      $count = mysqli_num_rows($res);
      if($count==1){
        // echo"admin available";

        $rows = mysqli_fetch_assoc($res);
        $full_name = $rows['full_name'];
        $user_name = $rows['user_name'];
      }else {
        header('location:'.URL.'admin/manage-admin.php');
      }
    }
     ?>


    <form action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>Full Name</td>
          <td>
          <input type="text" name="full_name" value="<?php echo $full_name; ?>">
          </td>
        </tr>

        <tr>
          <td>User Name</td>
          <td>
          <input type="text" name="user_name" value="<?php echo $user_name; ?>">
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" name="submit" value="update_admin" class="btn-secondary">
          </td>
        </tr>


      </table>
    </form>
  </div>
</div>
<?php
if(isset($_POST['submit'])){

  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $user_name = $_POST['user_name'];


  $sql = "UPDATE tbl_admin SET
  full_name = '$full_name',
  user_name = '$user_name'
  WHERE id = '$id'
  ";

  $res = mysqli_query($con,$sql);

  if($res==true){
    $_SESSION['update'] = "<div class='success'>updated successfuly</div>";
    header('location:'.URL.'admin/manage-admin.php');
  }else{
    $_SESSION['update'] = "<div class='error'>updated feild</div>";
    header('location:'.URL.'admin/manage-admin.php');
  }


}
 ?>

<?php include('partials/footer.php');?>
