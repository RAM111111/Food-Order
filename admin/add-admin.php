<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>
     <br><br>
    <form class="" action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>full name</td>
          <td> <input type="text" name="fullName" placeholder="Enter Your NAME"></td>
        </tr>
        <tr>
          <td>user name</td>
          <td> <input type="text" name="userName" placeholder="Enter Your user name"></td>
        </tr>
        <tr>
          <td>password</td>
          <td> <input type="text" name="password" placeholder="Enter Your password"></td>
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
$FullName=$_POST['fullName'];
$UserName=$_POST['userName'];
$Password=$_POST['password'];

$sql = "INSERT INTO food_order SET
full_name = '$FullName',
user_name = '$UserName',
password = '$Password'
";
echo $sql;
  echo"button y";
  $con = mysqli_connect('localhost','root','') or die (mysqli_error());
  $db = mysqli_select_db($con,'food') or die (mysqli_error());
  // $res = mysqli_query($con,$sql) or die (mysqli_error());

}else{
  echo"button n";

}
 ?>
