<?php
include "config.php";
global $conn;
session_start();
if(isset($_SESSION['user_id'])){
    header("location:post.php");
}

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_password = md5($_POST['password']);

    $sql = "SELECT user_id, first_name, username, role FROM user WHERE username = '{$username}' AND password = '{$user_password}'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("location:post.php");
        }
    }else{
        echo "<div class='alert alert-danger text-center'>Username Or Password is wrong</div>";
    }
}
?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

mysqli_close($conn);
?>
