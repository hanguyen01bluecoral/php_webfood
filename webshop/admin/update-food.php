<?php include('particals/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Food</h1>
            <br> <br>

            <form action="" method="post" enctype="multipart/form-data">
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
                            <option value="0">No category found</option>
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
                            <input type="submit" name="submit" value="Update Food" class="btn btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php include('particals/footer.php') ?>