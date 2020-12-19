<?php include('partials/menu.php');?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Password</h1>
    <br><br>


    <?php
    $id = $_GET['id'];

    $sql = "SELECT password FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($con,$sql);
    if($res==true){
      $count = mysqli_num_rows($res);
      if($count==1){
        // echo"admin available";

        $rows = mysqli_fetch_assoc($res);
        $password = $rows['password'];

      }else {
        header('location:'.URL.'admin/manage-admin.php');
      }
    }
     ?>


    <form action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>Current Password</td>
          <td>
          <input type="password" name="Current_Password" value="" placeholder="current_password">
          </td>
        </tr>

        <tr>
          <td>New Password</td>
          <td>
          <input type="password" name="New_Password" value="" placeholder="new_password">
          </td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td>
          <input type="password" name="Confirm_Password" value="" placeholder="confirm_password">
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" name="submit" value="update_password" class="btn-secondary">
          </td>
        </tr>


      </table>
    </form>
  </div>
</div>
<?php
if(isset($_POST['submit'])){

  $id = $_POST['id'];

  $current_password = md5($_POST['Current_Password']);
  $new_password = md5($_POST['New_Password']);
  $confirm_password = md5($_POST['Confirm_Password']);


  $sql = "SELECT * FROM tbl_admin

  WHERE id = '$id' AND
  password = '$current_password'
  ";

  $res = mysqli_query($con,$sql);

  if($res==true){
    $count = mysqli_num_rows($res);

    if($count==1){
      if($new_password==$confirm_password){

        echo "password match";

        $sql2 = "UPDATE tbl_admin SET
        password = '$password'
        WHERE id = '$id' ";

        $res2 = mysqli_query($con,$sql);

        if($res==true)
        {
          $_SESSION['change_pwd'] = "<div class='success'>pwd_changed successfuly</div>";
          header('location:'.URL.'admin/manage-admin.php');
        }else {
          $_SESSION['change_pwd'] = "<div class='error'>pwd_changed feild</div>";
          header('location:'.URL.'admin/manage-admin.php');
        }

      }else{
        $_SESSION['pwd_not_match'] = "<div class='error'>pwd_not_match</div>";
        header('location:'.URL.'admin/manage-admin.php');
      }
    }else {
      $_SESSION['user_not_found'] = "<div class='error'>updated feild</div>";
      header('location:'.URL.'admin/manage-admin.php');
    }

  }


}
 ?>

<?php include('partials/footer.php');?>
