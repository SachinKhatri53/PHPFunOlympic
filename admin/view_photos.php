<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <h4>Photos List</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Caption</th>
                            <th>Category</th>
                            <th>Photo</th>
                            <th>Upload Date</th>
                            <th>Upload Time</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php     
                    $query = "SELECT * FROM photos";
                    $select_photos = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_photos)) {
                        $pid        = $row['pid'];
                        $caption      = $row['caption'];
                        $category_title   = $row['category_title'];
                        $image_path      = $row['image_path'];
                        $upload_date= $row['upload_date'];
                        $upload_time= $row['upload_time'];     
                        echo "<tr>";
                        echo "<td>$pid </td>";
                        echo "<td>$caption</td>";
                        echo "<td>$category_title </td>";
                        echo "<td><img width='50' height='50px' src='../images/$image_path'></td>";
                        echo "<td>$upload_date</td>";
                        echo "<td>$upload_time</td>";
                        echo "<td><a href='comments.php?delete=$pid' class='btn btn-warning'>View</a></td>";
                        echo "<td><a href='comments.php?delete=$pid' class='btn btn-primary'>Edit</a></td>";
                        echo "<td><a href='comments.php?delete=$pid' class='btn btn-danger'>Delete</a></td>";
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