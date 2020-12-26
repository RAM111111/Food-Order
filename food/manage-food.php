<?php include('../admin/partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Food</h1>
    <br><br>
    <?php
      if(isset($_SESSION['uploade'])){
        echo $_SESSION['uploade'];
        unset($_SESSION['uploade']);
      }
      if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
     ?>
    <br><br>
    <a href="../food/add_food.php" class="btn-primary">Add Food</a>
    <br><br><br>
    <table class="tbl-full">
      <tr>
        <th>S.N</th>
        <th>FULL NAME</th>
        <th>FIRST NAME</th>
        <th>ACTION</th>
      </tr>
      <tr>
        <td>1.</td>
        <td>ram </td>
        <td>Ram</td>
        <td><a href="#" class="btn-secondary">update Admin</a>
            <a href="#" class="btn-danger">Delete Admin</a></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>ram </td>
        <td>Ram</td>
        <td><a href="#" class="btn-secondary">update Admin</a>
            <a href="#" class="btn-danger">Delete Admin</a></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>ram </td>
        <td>Ram</td>
        <td><a href="#" class="btn-secondary">update Admin</a>
            <a href="#" class="btn-danger">Delete Admin</a></td>
      </tr>
    </table>
  </div>


</div>
<?php include('../admin/partials/footer.php') ?>
