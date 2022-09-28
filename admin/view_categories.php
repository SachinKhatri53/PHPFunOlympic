<title>Admin: View All Categories</title>
<?php include "admin_header.php" ?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
<h4 class="text-center">Categories</h4>
        <?php
        if(recordCount('categories')==0){
            echo"<h5 class='text-danger'>No categories</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col-md-2'></div>
                <div class='col-md-8'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>";
                                deleteCategories();
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_categories)) {
                                $cid                = $row['cid'];
                                $category_title     = $row['category_title'];       
                                echo "<tr>
                                <td>$category_title</td>
                                <td><a href='view_categories.php?delete=$cid&title=$category_title' class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete? All videos related to this category will also be deleted.'); \">Delete</a></td>
                                </tr>";
                            }
                            echo "</tbody>
                        </table>
                    </div>
                </div>
            </div>";
                } ?>
</div>
<?php include "admin_footer.php" ?>