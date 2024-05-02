<?php include('particals/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update admin</h1>
        <br> <br> <br>

        <?php
            //1. lay ra cac gia tri tuong ung voi id
            $id = $_GET['id'];
            //2. tao cau truy van de update
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";
            //3. excute the query
            $res = mysqli_query($conn, $sql);
            //check whether the data is avariable or not
            if($res==true) {
                $count = mysqli_num_rows($res);
                //check number we have admin data or not
                if($count==1) {
                    //get the details
                    // echo "Admin avaliable";
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];

                } else {
                    //chuyen huong ve tranf admin page
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
        ?>
        
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //check wether the submit button is cliscked or not
    if(isset($_POST['submit'])) {
        // echo "Click";
        //get all the  values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //create a sql query to update admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = '$id'
        ";
        //thuc hien caau sql
        $res = mysqli_query($conn, $sql);

        //check wherther the query excuted sussec or not
        if($res == true) {
            $_SESSION['update'] = "Admin update sussecfluly";
            header("location:".SITEURL.'admin/manage-admin.php');
        }else {
            $_SESSION['update'] = "Admin update failed";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('particals/footer.php'); ?>