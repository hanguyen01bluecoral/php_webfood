<?php 

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])) {
        //process to delete
        // echo "Procees to delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name != "") {
            $path = "../images/food/".$image_name;
            $remove = unlink($path);
            if($remove==false) {
                $_SESSION['upload'] = "xoa anh that bai";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==true) {
            $_SESSION['delete'] = "Xoa thanh cong";
            header('location:'.SITEURL.'admin/manage-food.php');
        }else{
            $_SESSION['delete'] = "Xoa that bai";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

    } else {
        //chuyen trang ve manage-food
        // echo "chuyen trang";
        $_SESSION['unauthorize'] = "Xoa that bai";
        header('loacation:'.SITEURL.'admin/manage-food.php');
    }
?>