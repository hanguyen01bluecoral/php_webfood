<?php
    include('particals/menu.php');
?>

    <!-- main content section start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage food</h1>
            
            <br>
            <!--button-->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add food</a>
            <br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Van Nam</td>
                    <td>vannam</td>
                    <td>
                        <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger"> Delete Admin</a>
                       
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Van Nam</td>
                    <td>vannam</td>
                    <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger"> Delete Admin</a>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Van Nam</td>
                    <td>vannam</td>
                    <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger"> Delete Admin</a>
                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Van Nam</td>
                    <td>vannam</td>
                    <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                        <a href="#" class="btn-danger"> Delete Admin</a>
                    </td>
                </tr>
            </table>
        </div>
        
    </div>
    <!-- main content section end -->

<?php
    include('particals/footer.php');
?>