<?php
include "header.php";
include "config.php";
global $conn;


$sql_2 = "SELECT * FROM post";
$result_2 = mysqli_query($conn, $sql_2) or die('mysqli_error');

$item_per_page = 3;
$total_records = mysqli_num_rows($result_2);
$total_pages = ceil($total_records / $item_per_page);


$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;

if($_SESSION['role'] == 1){
    $sql = "SELECT * FROM post 
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN user ON post.author = user.user_id
        ORDER BY post.post_id DESC
        LIMIT $item_per_page OFFSET $offset";
}else{
    $sql = "SELECT * FROM post
             LEFT JOIN category ON post.category = category.category_id
            LEFT JOIN user ON post.author = user.user_id
            WHERE author = '{$_SESSION['user_id']}' ||
            'ORDER BY post.post_id DESC
            LIMIT $item_per_page OFFSET $offset' ";
}



$result = mysqli_query($conn, $sql) or die('mysqli_error');

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-post.php">add post</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class='id'><?php echo $row['post_id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['post_date']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><img class="admin_post_img" src="upload/<?php echo $row['post_img']; ?>" alt=""></td>
                                <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id']; ?>&cat_id=<?php echo $row['category']; ?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    <?php
                    if ($current_page > 1){
                        echo "<li><a href='?page=" . $current_page - 1 . "'>Prev</a></li>";
                    }
                    ?>
                    <?php
                    for ($x = 1; $x <= $total_pages; $x++) {
                        $active =  ($current_page == $x) ? "active" : "";
                        echo "<li class='{$active}'><a href='?page=$x'>$x</a></li>";
                    }
                    ?>
                    <?php if ($current_page < $total_pages) {
                        echo "<li><a href='?page=" . $current_page + 1 . "'>Next</a></li>";
                    }?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
