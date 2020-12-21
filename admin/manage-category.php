<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Category</h1>
    <br><br>

    <?php
    if(isset($_SESSION['add_cat'])){
      echo $_SESSION['add_cat'];
      unset($_SESSION['add_cat']);
    }
     ?>
<br><br>
    <a href="../category/add-category.php" class="btn-primary">Add category</a>
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
<?php include('partials/footer.php') ?>
