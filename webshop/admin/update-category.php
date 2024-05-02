<?php include('particals/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update category</h1>
        <br> <br>

        <?php
            //check whether the id is set or not
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_category WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }else {
                    $_SESSION['no-category-found'] = "cap nhat bi loi";
                    header("location:".SITEURL.'admin/manage-category.php');
                }

            }else {
                header("location:".SITEURL.'admin/manage-category.php');
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="title" name="title" id="" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Current image: </td>
                <td>
                  <?php
                        if($current_image != "") {
                            //display the image
                            ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" alt="">
                            <?php
                        }else {
                            echo "khong tim thay dia chi hinh anh";
                        }
                  ?>
                </td>
            </tr>

            <tr>
                <td>New image: </td>
                <td>
                <input type="file" name="image" id="" value="">
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes"> Yes
                    <input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="featured" value="no"> No
                </td>
            </tr>
            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="active" value="yes"> Yes
                    <input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="active" value="no"> No
                </td>
            </tr>


            <tr>
               <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="submit" name="submit" value="update category" class="btn-secondary">
               </td>
            </tr>
        </table>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //update new image if selected
                if(isset($_FILES['image']['name'])) {
                    //get the image dateail
                    $image_name = $_FILES['image']['name'];
                    if($image_name != "") {
                        //image avarible
                        $ext = end(explode('.', $image_name));

                        //rename the image
                        $image_name = "Food_category_" . rand(000, 999) . '.' . $ext;
    
    
                        $source_path = $_FILES['image']['tmp_name'];
                        $destinaltion_path = "../images/category" . $image_name;
    
                        $upload = move_uploaded_file($source_path, $destinaltion_path);
    
                        if ($upload == false) {
                            //set message
                            $_SESSION['upload'] = "upload thanh cong";
                            //chuyen trang
                            header("location:" . SITEURL . 'admin/manage-category.php');
                            //stop the process
                            die();
                        }
                        //xoa anh hien tai
                        $remove_path = "../images/category".$current_image;

                        $remove = unlink($remove_path);

                        //check wheter the image is removed or not
                        //if failed to removed then dispaly mess and stop the procces
                        if($remove==false) {
                            $_SESSION['failed-remove'] = "thay anh that bai";
                            header("location:".SITEURL."admin/manage-category.php");
                            die();
                        }

                    }else {
                        $image_name = $current_image;
                    }
                }else {
                    $image_name = $current_image;
                }

                //update database
                $sql2 = "UPDATE tbl_category SET title = '$title', image_name = '$image_name',
                featured = '$featured', active = '$active' WHERE 
                id=$id ";

                //thuc hien cau lenh
                $res2 = mysqli_query($conn, $sql2);

                //chuyen ve trang chu
                if($res2==true) {
                    //update category
                    $_SESSION['update'] = "cap nhat thanh cong";
                    header("location:".SITEURL."admin/manage-category.php");
                }else {
                    $_SESSION['update'] = "cap nhat that bai";
                    header("location:".SITEURL."admin/manage-category.php");
                }
            }
        ?>
    </div>
</div>

<?php include('particals/footer.php') ?>