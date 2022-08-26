<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <h4>Category List</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php     
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_categories)) {
                        $cid                = $row['cid'];
                        $category_title     = $row['category_title'];       
                        echo "<tr>";
                    echo "<td>$cid </td>";
                    echo "<td>$category_title</td>";
                    echo "<td><a href='comments.php?delete=$cid' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>