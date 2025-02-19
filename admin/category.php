<?php
include "header.php";
if ($_SESSION['role'] == "0") {
    header("location:post.php");
}
include "config.php";
global $conn;

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql) or die('mysqli_error');

$item_per_page = 3;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;

$total_records = mysqli_num_rows($result);
$total_pages = ceil($total_records / $item_per_page);

$sql_2 = "SELECT * FROM category LIMIT $item_per_page OFFSET $offset";
$result_2 = mysqli_query($conn, $sql_2) or die("Query Error");
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                    <th>S.No.</th>
                    <th>Category Name</th>
                    <th>No. of Posts</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($result_2) > 0) {
                        while ($row = mysqli_fetch_assoc($result_2)) {
                            ?>
                            <tr>
                                <td class='id'><?php echo $row['category_id']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['post']; ?></td>
                                <td class='edit'><a href='update-category.php?cat_id=<?php echo $row['category_id']; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-category.php?cat_id=<?php echo $row['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    mysqli_close($conn);
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
