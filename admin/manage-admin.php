<?php
include('partials/menu.php');
  ?>
        <!--  main-content   -->
<div class="main-content">
<div class="wrapper">

<h1>Manage Admin</h1>
<br>

<?php
if(isset($_SESSION['add'])){
  echo $_SESSION['add'];
  unset($_SESSION['add']);
}
if(isset($_SESSION['delete'])){
  echo $_SESSION['delete'];
  unset($_SESSION['delete']);
}
if(isset($_SESSION['update'])){
  echo $_SESSION['update'];
  unset($_SESSION['update']);
}
 ?>
 <br><br>
<a href="add-admin.php" class="btn-primary">Add Admin</a>
<br><br><br>


<table class="tbl-full">
  <tr>
    <th>S.N</th>
    <th>FULL NAME</th>
    <th>FIRST NAME</th>
    <th>ACTION</th>
  </tr>

  <?php
  $sql = "SELECT * FROM tbl_admin";
  $res = mysqli_query($con,$sql)or die(mysqli_error());

  if($res==true){
    $count = mysqli_num_rows($res);
     $sn = 1;
    if($count > 0){
      while ($rows = mysqli_fetch_assoc($res)) {
        $id = $rows['id'];
        $full_name = $rows['full_name'];
        $user_name = $rows['user_name'];


        ?>
        <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $full_name; ?> </td>
          <td><?php echo $user_name; ?></td>
          <td><a href="<?php echo URL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">update Admin</a>
              <a href="<?php echo URL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a></td>
        </tr>
        <?php
      }
    }else{

    }
  }

   ?>

</table>
<div class="clearfix">

</div>
</div>
</div>
    <!--  End-main-content   -->
    <?php
    include('partials/footer.php');
      ?>
