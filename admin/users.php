<?php
global $conn;
include "header.php";
if ($_SESSION['role'] == "0") {
    header("location:post.php");
}
include "config.php";

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$total_records = mysqli_num_rows($result);
$records_per_page = 3;
$total_pages = ceil($total_records / $records_per_page);
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

$sql2 = "SELECT * FROM user LIMIT 3 OFFSET {$offset}";
$result2 = mysqli_query($conn, $sql2);
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                    <th>S.No.</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($result2)) {
                        while ($row = mysqli_fetch_assoc($result2)) {
                            ?>
                            <tr>
                                <td class='id'><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td>
                                    <?php
                                    if ($row['role'] == 1) {
                                        echo "Admin";
                                    } else {
                                        echo "Normal User";
                                    }
                                    ?>
                                </td>
                                <td class='edit'><a href='update-user.php?id=<?php echo $row['user_id']; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-user.php?id=<?php echo $row['user_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    <?php
                    if ($current_page > 1) {
                        ?>
                        <li><a href="?page=<?php echo $current_page - 1; ?>">Prev</a></li>
                        <?php
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active = ($current_page == $i) ? "active" : "";
                        ?>
                        <li class="<?php echo $active; ?>"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                    }
                    if ($current_page < $total_pages) {
                        echo "<li><a href='?page=" . $current_page + 1 . "'>Next</a></li>";
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "header.php"; ?>
