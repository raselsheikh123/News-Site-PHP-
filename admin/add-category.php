<?php
include "header.php";
if ($_SESSION['role'] == "0") {
    header("location:post.php");
}
include "config.php";
global $conn;

if(isset($_POST['save']) &&  !empty($_POST['cat'])){
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat']);
    $submit = $_POST['save'];

    $sql = "SELECT * FROM category WHERE category_name = '{$cat_name}'";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0){
        echo "<div class='alert alert-danger text-center'>Category already exists</div>";
    }else{
        $sql_2 = "INSERT INTO category (category_name) VALUES ('{$cat_name}')";
        $result_2 = mysqli_query($conn, $sql_2);
        if($result_2){
            header("location:category.php");
            exit();
        }else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }

    }


}

mysqli_close($conn);
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
