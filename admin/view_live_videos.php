<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <h4>Live Videos List</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>URL</th>
                            <th>Category</th>
                            <th>Uploaded Date</th>
                            <th>Uploaded Time</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php     
                    $query = "SELECT * FROM live_videos";
                    $select_news = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_news)) {
                        $lvid                = $row['lvid'];
                        $video_title     = $row['video_title'];
                        $video_description     = $row['video_description'];
                        $video_url     = $row['video_url'];
                        $video_category     = $row['video_category']; 
                         
                        $uploaded_date     = $row['uploaded_date'];       
                        $uploaded_time     = $row['uploaded_time']; 
                        echo "<tr>";
                    echo "<td>$lvid</td>";
                    echo "<td>$video_title</td>";
                    echo "<td>$video_description</td>";
                    echo "<td><a href='$video_url' target='_blank'>link</a></td>";
                    echo "<td>$video_category</td>";
                    
                    echo "<td>$uploaded_date</td>";
                    echo "<td>$uploaded_time</td>";
                    echo "<td><a href='comments.php?delete=$lvid' class='btn btn-primary'>View</a></td>";
                    echo "<td><a href='comments.php?delete=$lvid' class='btn btn-warning'>Edit</a></td>";
                    echo "<td><a href='comments.php?delete=$lvid' class='btn btn-danger'>Delete</a></td>";
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