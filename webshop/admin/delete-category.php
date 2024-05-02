<?php
include('particals/menu.php');
   
   if(isset($_GET['id']) AND isset($_GET['image_name'])) {
        //get the values and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "") {
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failse to remove image then add an error message and stop the procces
            if($remove==false) {
                $_SESSION['remove'] = "xoa that bai";
                header("location:".SITEURL.'admin/manage-category.php');
                die();
            }
        }
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        //check whether the data is delete from database or not
        if($res==true) {
            $_SESSION['delete'] = "Xoa thanh cong";
            //chuyen trang ve manage-category
            header("location:".SITEURL.'admin/manage-category.php');
        }else {
            //set falise
            $_SESSION['delete'] = "Xoa that bai";
            //chuyen trang ve manage-category
            header("location:".SITEURL.'admin/manage-category.php');
        }

   }else {
        header("location:".SITEURL.'admin/manage-category.php');
   }
?>