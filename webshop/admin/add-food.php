<?php include('particals/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add food</h1>

            <br> <br>
            <?php
                if(isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="title of the food">
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="des" id="" cols="30" rows="5" placeholder="mo ta"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="num" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>category: </td>
                        <td>
                            <select name="category" id="">
                                <?php
                                    $sql = "SELECT * FROM tbl_category WHERE active='yes'";
                                    $res = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($res);

                                    if($count>0) {
                                        //we have category
                                        while($row=mysqli_fetch_assoc($res)) {
                                            //get the value details of categories
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>
                                                 <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                            <?php
                                        }
                                    } else {
                                        //we do not have category
                                        ?>
                                             <option value="0">No category found</option>
                                        <?php
                                    }
                                ?>

                                

                              
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Feature: </td>
                        <td>
                            <input type="radio" value="yes" name="feature"> Yes
                            <input type="radio" value="no" name="feature"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                        <input type="radio" value="yes" name="active"> Yes
                            <input type="radio" value="no" name="active"> No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food" class="btn btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>

            <?php
                //check the buttons is clicked 
                if(isset($_POST['submit'])) {
                    // echo "clicked";
                    //1. lay data tu form
                    $title = $_POST['title'];
                    $des = $_POST['des'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];
                    //check radio button xe dang o trang thai noa
                    if(isset($_POST['featured'])) {
                        $featured = $_POST['featured'];
                    }else {
                        $featured = "no";

                    }

                    if(isset($_POST['active'])) {
                        $active = $_POST['active'];
                    }else {
                        $active = "no";
                        
                    }
                    //2. cap nhat hinh
                    if(isset($_FILES['image']['name'])) {
                        //get the details of the selected image
                        $image_name = $_FILES['image']['name'];
                        if($image_name != "") {
                            $ext = end(explode('.', $image_name));
                            $image_name = "Food-name-".rand(0000,9999).".".$ext;
                            $src = $_FILES['image']['tmp_name'];
                            $dst = "../images/food/".$image_name;
                            $upload = move_uploaded_file($src, $dst);
                            if($upload==false) {
                                $_SESSION['upload'] = "Cap nhat thanh cong";
                                header('location:'.SITEURL.'admin/add-food.php');
                                die();
                            } else {

                            }
                        }
                    }else {
                        $image_name = "";
                    }
                    //3. truyen du lieu vao database
                    $sql2 = "INSERT INTO tbl_food SET 
                            title = '$title',
                            des = '$des',
                            price = $price,
                            image_name = '$image_name',
                            category_id = $category,
                            featured = '$featured',
                            active = '$active'
                    ";
                    //thuc thi
                    $res2 = mysqli_query($conn, $sql2);
                    if($res2 == true) {
                        $_SESSION['add'] = "Them san pham thanh cong";
                        header('location:'.SITEURL.'admin/manage-food.php');
                    } else {
                        $_SESSION['add'] = "Them san pham that bai";
                        header('location:'.SITEURL.'admin/manage-food.php');
                    }

                    
                }
            ?>
        </div>
    </div>
<?php include('particals/footer.php'); ?>