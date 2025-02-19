<?php
global $conn;
include "header.php";
if ($_SESSION['role'] == "0") {
    header("location:post.php");
}
include "config.php";

$user_id = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = $user_id";

if(mysqli_query($conn, $sql)){
    header("Location:users.php");
}

include "footer.php";

