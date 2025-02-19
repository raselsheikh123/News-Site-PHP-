<?php
include 'header.php';
include "config.php";
global $conn;

if(isset($_GET['author_id'])){
$author_id = $_GET['author_id'];
}else{
    $author_id = 0;
}

$item_per_page = 2;
$total_records = mysqli_num_rows( mysqli_query($conn, "SELECT * FROM post WHERE author = {$author_id}"));
$total_pages = ceil($total_records / $item_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $item_per_page;

$sql = "SELECT * FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN user ON post.author = user.user_id
         WHERE author = {$author_id}
         ORDER BY post.post_id DESC
         LIMIT $item_per_page OFFSET $offset";

$result = mysqli_query($conn, $sql) or die("Connection failed: " . mysqli_error($conn));

$sql_2 = "SELECT first_name FROM user WHERE user_id = {$author_id}";
$result_2 = mysqli_query($conn, $sql_2);
$author_assc_array = mysqli_fetch_assoc($result_2);

?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->

                <div class="post-container">
                    <h2 class="page-heading">Author: <?php echo $author_assc_array['first_name']; ?></h2>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>">
                                            <img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3>
                                                <a href='single.php?id=<?php echo $row['post_id']; ?>'>
                                                    <?php echo $row['title']; ?>
                                                </a>
                                            </h3>
                                            <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cat_id=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a>
                                            </span>
                                                <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?author_id=<?php echo $row['user_id']; ?>'><?php echo $row['first_name']; ?></a>
                                            </span>
                                                <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']; ?>
                                            </span>
                                            </div>
                                            <p class="description">
                                                <?php echo substr($row['description'], 0, 150); ?>
                                            </p>
                                            <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <ul class='pagination'>
                        <?php
                        if ($current_page > 1){
                            ?>
                            <li><a href='?author_id=<?php echo $author_id; ?>&page=<?php echo $current_page - 1; ?>'>Prev</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        for ($x = 1; $x <= $total_pages; $x++) {
                            $active =  ($current_page == $x) ? "active" : "";
                            echo "<li class='{$active}'><a href='?author_id={$author_id}&page={$x}'>$x</a></li>";
                        }
                        ?>
                        <?php if ($current_page < $total_pages) {
                            ?>
                            <li><a href='?author_id=<?php echo $author_id; ?>&page=<?php echo $current_page + 1; ?>'>Next</a></li>
                            <?php
                        }?>
                    </ul>
                </div>


                <!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
