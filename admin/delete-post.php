<?php

include "config.php";
global $conn;

$post_id = $_GET['id'];
$cat_id = $_GET['cat_id'];

$sql_2 = "SELECT * FROM post WHERE post_id= {$post_id}";
$result_2 = mysqli_query($conn, $sql_2);
$row_2 = mysqli_fetch_assoc($result_2);

unlink("upload/".$row_2['post_img']);

$sql = "DELETE FROM post WHERE post_id = {$post_id};";
$sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$cat_id};}";
if(mysqli_multi_query($conn, $sql)){
    header("Location:post.php");
}else{
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

