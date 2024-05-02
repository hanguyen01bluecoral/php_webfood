<?php
include('particals/menu.php');
?>

<!-- main content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br>
        <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['pwd-not-match'])) {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }
        ?>
        <br> <br> <br>
        <!--button-->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br>

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>

            <?php
            //query 
            $sql = "SELECT * FROM tbl_admin";
            //excute the query 
            $res = mysqli_query($conn, $sql);
            if ($res == TRUE) {
                //count rows to check wheater we have data
                $count = mysqli_num_rows($res);
                $sn = 1; //crete  varialble and assgin the values

                if ($count > 0) {
                    //we have in database
                    while ($rows = mysqli_fetch_assoc($res)) {
                        //using white loop to get all the data to database
                        //and white loop will run as we have data in database

                        //get invidual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //display the values in out table

            ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change passowrd</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delete Admin</a>

                            </td>
                        </tr>
            <?php
                    }
                } else {
                }
            }
            ?>
        </table>
    </div>

</div>
<!-- main content section end -->

<?php
include('particals/footer.php');
?>