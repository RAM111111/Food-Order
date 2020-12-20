<?php
if(!isset($_SESSION['user'])){
  $_SESSION['nologin'] = "<div class='error text-center'>no user login</div>";
  header('location:'.URL.'admin/login.php');
}
 ?>
