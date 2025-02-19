<?php
include "header.php";
if ($_SESSION['role'] == "0") {
    header("location:post.php");
}
include "config.php";
global $conn;


$category_id = $_GET['cat_id'];
if (isset($_POST['submit'])) {
    $category_name = $_POST['cat_name'];
    $category_id_2 = $_POST['cat_id'];
    $sql_2 = "UPDATE category SET category_name = '{$category_name}' WHERE category_id = '{$category_id_2}'";
    $result_2 = mysqli_query($conn, $sql_2);
    if ($result_2) {
        header("location:category.php");
    }
}


?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php
                    $sql = "SELECT * FROM category WHERE category_id = '$category_id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="cat_id" class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>" placeholder="" required>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required/>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>
