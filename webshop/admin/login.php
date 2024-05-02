<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - footer systems</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login1">
        <h1 class="text-center">Login</h1>
        <br> <br>
        <?php
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br>
            <form action="" method="POST">
                username:
                <input type="text" name="username" placeholder="enter username">
                password:
                <input type="password" name="password" placeholder="enter password">

                <input type="submit" name="submit" value="login" class="btn-primary">
            </form>
        <p>Created By . <a href="#">Vijay Name</a></p>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1) {
            $_SESSION['login'] = "Dang nhap thanh cong";
            $_SESSION['user'] = $username;
            //di chuyen den trang index.php
            header("location:".SITEURL.'admin/');
        }else {
            $_SESSION['login'] = "username va password khong dung";
            header("location:".SITEURL.'admin/login.php');
        }
    }
?>