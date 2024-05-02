<?php include('particals/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add category</h1>
        <br> <br>



        <br> <br> <br>

        <!--add category form satrt-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="category title">
                    </td>
                </tr>
                <tr>
                    <td>Selected image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featurea: </td>
                    <td>
                        <input type="radio" name="featured" value="yes"> Yes
                        <input type="radio" name="featured" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes"> Yes
                        <input type="radio" name="active" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!--add category form end-->
        <?php
        //check wheter the submit button is clisked or hot
        if (isset($_POST['submit'])) {
            // echo "clicked";

            //1.get the value from category form
            $title = $_POST['title'];
            //for radio input, we need to check the button is selected or not
            if (isset($_POST['featured'])) {
                //get the value from form
                $featured = $_POST['featured'];
            } else {
                //set the default value
                $featured = "no";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "no";
            }

            //check whether the images or not anhd set the values for images accordigiter
            // print_r($_FILES['image']);
            // die();
            if (isset($_FILES['image']['name'])) {
                //upload the image
                //to upload iamge we need image name, source path and des
                $image_name = $_FILES['image']['name'];
                //upload the image
                if ($image_name != "") {
                    //auto rename the image
                    //get the extension of our image(jpg, png, gif, etc) e.g, "foodj.jpg"
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
                        header("location:" . SITEURL . 'admin/add-category.php');
                        //stop the process
                        die();
                    }
                }
            } else {
                //don't upload image and set the image_name value anf bland
                $image_name = "";
            }

            //2.create sql query to onsert category into database
            $sql = "INSERT INTO tbl_category SET
                        title='$title',
                        image_name='$image_name',
                        featured='$featured',
                        active='$active'";
            //3.exture the query and save in database
            $res = mysqli_query($conn, $sql);

            //4.check wether the query extured or not and data added or bot
            if ($res == true) {
                //query excuted and category added
                $_SESSION['add'] = "thanh cong";
                //chuyen trang
                header("location:" . SITEURL . 'admin/manage-category.php');
            } else {
                //failse
                $_SESSION['add'] = "that bai";
                //chuyen trang
                header("location:" . SITEURL . 'admin/add-category.php');
            }
        }
        ?>

    </div>
</div>

<?php include('particals/footer.php') ?>