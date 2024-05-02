<?php include('particals/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br> <br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>current password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="current password">
                    </td>
                </tr>
                <tr>
                    <td>new password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="new password">
                    </td>
                </tr>
                <tr>
                <td>confirm password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="new password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change password">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])) {
        //1. get th data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        $res = mysqli_query($conn, $sql);

        if($res == true) {
            $count = mysqli_num_rows($res);
            if($count==1) {
                // echo "user found";
                if($new_password == $confirm_password) {

                }else {
                    $_SESSION['pwd-not-match'] = "User not found";
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            } else {
                $_SESSION['user-not-found'] = "User not found";
                header("location:".SITEURL.'admin/manage-admin.php');
            }
        }
    }
?>

<?php include('particals/footer.php'); ?>