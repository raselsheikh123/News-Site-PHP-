<?php
include "header.php";
include "config.php";
global $conn;


?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control">
                            <option disabled> Select Category</option>
                            <?php
                            $cat_sql = "SELECT * FROM category";
                            $cat_result = mysqli_query($conn, $cat_sql);
                            if (mysqli_num_rows($cat_result) > 0) {
                                while ($row = mysqli_fetch_assoc($cat_result)) {
                                    echo "<option value='" . $row['category_id'] . "'> " . $row['category_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required/>
                </form>
                <!--/Form -->
                <?php

                if (isset($_POST['submit'])) {

                    $error = array();
                    $img_name = $_FILES['fileToUpload']['name'];
                    $img_full_path = $_FILES['fileToUpload']['full_path'];
                    $img_tmp_name = $_FILES['fileToUpload']['tmp_name'];
                    $img_size = $_FILES['fileToUpload']['size'];
                    $img_max_filesize = 2 * 1024 * 1024;
                    $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    $img_allowed_extensions = array("jpeg", "jpg", "png", "webp");

                    if ($img_size > $img_max_filesize) {
                        $error[] = "File size must be less than or equal to 2 MB";
                    }

                    if (!in_array($img_extension, $img_allowed_extensions)) {
                        $error[] = "Allowed file types are jpg, jpeg, png";
                    }

                    if (empty($error)) {
                        move_uploaded_file($img_tmp_name, "upload/" . $img_full_path);
                    } else {
                        foreach ($error as $err) {
                            echo "<div class='alert alert-danger'>" . $err . "</div>";
                        }
                        die();
                    }

                    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
                    $post_description = mysqli_real_escape_string($conn, $_POST['postdesc']);
                    $post_category = mysqli_real_escape_string($conn, $_POST['category']);
                    $post_date = date("d M, Y");
                    $post_author = $_SESSION['user_id'];


                    $sql = "INSERT INTO post (title, description, category, post_date, author, post_img)
                            VALUES ('$post_title', '$post_description', '$post_category', '$post_date', '$post_author', '$img_full_path');";

                    $sql .= "UPDATE category Set post = post + 1 WHERE category_id = '$post_category'";

                    if (mysqli_multi_query($conn, $sql)) {
                        header("location:post.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }


                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>
