<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <h4>Videos List</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Video</th>
                            <th>Upload Date</th>
                            <th>Upload Time</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php     
                    $query = "SELECT * FROM videos";
                    $select_videos = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_videos)) {
                        $vid        = $row['vid'];
                        $title      = $row['title'];
                        $category_title   = $row['category_title'];
                        $description= $row['description']; 
                        $video_path      = $row['video_path'];
                        $upload_date= $row['upload_date'];
                        $upload_time= $row['upload_time'];     
                        echo "<tr>";
                        echo "<td>$vid </td>";
                        echo "<td>$title</td>";
                        echo "<td>$category_title </td>";
                        echo "<td>$description</td>";
                        echo "<td><video width='50' height='50px'><source src='../videos/$video_path' type='video/mp4'></td>";
                        echo "<td>$upload_date</td>";
                        echo "<td>$upload_time</td>";
                        echo "<td><a href='comments.php?delete=$vid' class='btn btn-warning'>View</a></td>";
                        echo "<td><a href='comments.php?delete=$vid' class='btn btn-primary'>Edit</a></td>";
                        echo "<td><a href='comments.php?delete=$vid' class='btn btn-danger'>Delete</a></td>";
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