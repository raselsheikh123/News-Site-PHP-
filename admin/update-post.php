<?php
include "header.php";
include "config.php";
global $conn;


if (isset($_POST['submit'])) {


    if(!empty($_FILES['new-image']['name'])){
        $error = array();
        $img_name = $_FILES['new-image']['name'];
        $img_full_path = $_FILES['new-image']['full_path'];
        $img_tmp_name = $_FILES['new-image']['tmp_name'];
        $img_size = $_FILES['new-image']['size'];
        $img_max_filesize = 2 * 1024 * 1024;
        $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $img_allowed_extensions = array("jpeg", "jpg", "png", "webp");

        if ($img_size > $img_max_filesize) {
            $error[] = "File size must be less than or equal to 2 MB";
        }

        if (!in_array($img_extension, $img_allowed_extensions)) {
            $error[] = "Allowed file types are jpg, jpeg, png, webp";
        }

        if (empty($error)) {
            move_uploaded_file($img_tmp_name, "upload/" . $img_full_path);
        } else {
            foreach ($error as $err) {
                echo "<div class='alert alert-danger'>" . $err . "</div>";
            }
            die();
        }
    }else{
        $img_name = $_POST['old-image'];
    }


    $post_id = $_POST['post_id'];
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_description = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $post_category = mysqli_real_escape_string($conn, $_POST['category']);
    $post_author = $_SESSION['user_id'];




    $sql = "UPDATE post Set title = '{$post_title}', description = '{$post_description}', category = '{$post_category}', post_img ='{$img_name}'  WHERE post_id = '$post_id';";
    $sql .= "UPDATE category SET post = post + 1 WHERE category_id = '{$post_category}';";

    if (mysqli_multi_query($conn, $sql)) {
        header("location:post.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


}

$sql = "SELECT * FROM post WHERE post_id = {$_GET['id']} ";
$result = mysqli_query($conn, $sql);

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $img_name = $row['post_img'];
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTile">Title</label>
                                <input type="text" name="post_title" class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Description</label>
                                <textarea name="postdesc" class="form-control" required rows="5"><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCategory">Category</label>
                                <select class="form-control" name="category">
                                    <?php
                                    $cat_sql = "SELECT * FROM category";
                                    $cat_result = mysqli_query($conn, $cat_sql);
                                    if (mysqli_num_rows($cat_result) > 0) {
                                        while ($category_row = mysqli_fetch_assoc($cat_result)) {
                                            $cat_selected = $row['category'] == $category_row['category_id'] ? "selected" : "";
                                            echo "<option $cat_selected value='" . $category_row['category_id'] . "'>" . $category_row['category_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Post image</label>
                                <input type="file" name="new-image">
                                <img src="upload/<?php echo $img_name; ?>" height="150px">
                                <input type="hidden" name="old-image" value="<?php echo $img_name; ?>">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update"/>
                            <?php
                        }
                    }
                    ?>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>

<?php

mysqli_close($conn);
?>
<?php include "footer.php"; ?>
