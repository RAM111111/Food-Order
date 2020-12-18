<?php include('partials/menu.php') ?>


<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>
     <br><br>

     <?php
     if(isset($_SESSION['add'])){
       echo $_SESSION['add'];
       unset($_SESSION['add']);
     }
      ?>

      
    <form class="" action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>full name</td>
          <td> <input type="text" name="fullName1" placeholder="Enter Your NAME"></td>
        </tr>
        <tr>
          <td>user name</td>
          <td> <input type="text" name="userName1" placeholder="Enter Your user name"></td>
        </tr>
        <tr>
          <td>password</td>
          <td> <input type="text" name="password1" placeholder="Enter Your password"></td>
        </tr>
        <tr>
          <td colspan="2"> <input type="submit" name="Submit" value="add-admin" class="btn-primary">
          </td>
        </tr>
      </table>
    </form>
  </div>


</div>
<?php include('partials/footer.php') ?>


<?php
if(isset($_POST['Submit'])){
$FullName=$_POST['fullName1'];
$UserName=$_POST['userName1'];
$Password=md5($_POST['password1']);

$sql = "INSERT INTO tbl_admin SET
full_name = '$FullName',
user_name = '$UserName',
password = '$Password'
";

$res = mysqli_query($con,$sql)or die(mysqli_error());

if($res ==true){
  $_SESSION['add'] = 'add admin successfuly';
  header("location:".URL.'admin/manage-admin.php');
}else{
  $_SESSION['add'] = 'faild to add admin';
  header("location:".URL.'admin/add-admin.php');
}

}
 ?>
