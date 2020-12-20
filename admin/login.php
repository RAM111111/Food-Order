
<?php include('../conf/constants.php') ?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../CSS/style.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <div class="login">
      <h1 class="text-center">login</h1>

      <?php
if(isset($_SESSION['login'])){
  echo $_SESSION['login'];
  unset($_SESSION['login']);
}
       ?>
      <br><br>
      <form class="text-center" action="" method="post">
        user name :<br>
        <input type="text" name="user_name"placeholder="Enter your user name">
        <br><br>
        password :<br>
        <input type="password" name="password" placeholder="Enter your password"><br>
<br>
        <input type="submit" name="submit" value="Login" class="btn-primary">
      </form>
      <p class="text-center">created by - <a href="#">ram</a></p>
    </div>
  </body>
</html>

<?php
if(isset($_POST['submit'])){
  $user_name1 = $_POST['user_name'];
  $password1 = md5($_POST['password']);


   $sql = "SELECT * FROM tbl_admin WHERE
user_name='$user_name1' AND
password='$password1'
  ";

   $res = mysqli_query($con,$sql);
   $count = mysqli_num_rows($res);

  if($count==1){
    $_SESSION['login'] = "<div class='success '> login successfuly</div>";
    header('location:'.URL.'admin/');
  }else {
    $_SESSION['login'] = "<div class='error text-center'> login err </div>";
    header('location:'.URL.'admin/login.php');
  }
}


 ?>
