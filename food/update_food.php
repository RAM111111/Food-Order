<?php include '../admin/partials/menu.php';?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update food</h1>
    <br><br>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <table class="tbl-30">

        <tr>
          <td>title</td>
          <td>
           <input type="text" name="title">
          </td>
        </tr>



        <tr>
          <td>description</td>
          <td>
           <textarea type="text" name="description" cols="30" rows="5">
           </textarea>
          </td>
        </tr>

        <tr>
          <td>price</td>
          <td>
           <input type="number" name="price">
          </td>
        </tr>


        <tr>
          <td>Current image </td>
          <td>
           here..!
          </td>
        </tr>

        <tr>
          <td>select new image </td>
          <td>
           <input type="file" name="img">
          </td>
        </tr>



        <tr>
          <td>category</td>
          <td>
          <select name="category">
            <option value="0">test</option>
            <option value="1">test</option>
          </select>
          </td>
        </tr>




        <tr>
          <td>feature</td>
          <td>
           <input type="radio" name="feature" value="Yes"> Yes
           <input type="radio" name="feature" value="No"> No
          </td>
        </tr>

        <tr>
          <td>active</td>
          <td>
           <input type="radio" name="active" value="Yes"> Yes
           <input type="radio" name="active" value="No"> No
          </td>
        </tr>



      </table>
    </form>
  </div>
</div>




<?php include '../admin/partials/footer.php';?>
