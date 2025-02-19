<?php
if ($_SESSION['role'] == "0") {
    header("location:post.php");
}
include "config.php";
global $conn;

$cat_id = $_GET['cat_id'];

$sql = "DELETE FROM category WHERE category_id = {$cat_id}";
$result = mysqli_query($conn, $sql);

if($result){
    header("location:category.php");
    exit;
}else{
    echo "Error deleting record";
}


mysqli_close($conn);



