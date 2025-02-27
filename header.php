<?php
include "config.php";
global $conn;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    <?php
                    if(isset($_GET['cat_id'])){
                        $cat_id = $_GET['cat_id'];
                    }else{
                        $cat_id = 0;
                    }
                    $sql = "SELECT * FROM category 
                                ORDER BY category_name ASC";
                    $result = mysqli_query($conn, $sql) or die("Connection failed: " . mysqli_connect_error());
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $active = $row['category_id'] == $cat_id ? "active" : "";
                            ?>
                            <li><a class="<?php echo $active; ?>" href='category.php?cat_id=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a></li>
                            <?php
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
