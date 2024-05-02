<?php
    include('../config/constants.php');

    //1.get the id of admin to be delete
    $id = $_GET['id'];
    //2.create sql qr to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    //excuted the query
    $res = mysqli_query($conn, $sql);
    //check whether the query excuted sussecfully or not
    if($res==true) {
        //query excuted sussecfully and admin delete
        // echo "delet admin";
        //create session variable to display mess
        $_SESSION['delete'] = "<div class='susscess'>Admin delete sussces. </div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
        // echo "Failse";
        $_SESSION['delete'] = "<div class='err'>Admin delete failse. </div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    //3. chuyen huong den trang admin voi hop thoai
    
?>