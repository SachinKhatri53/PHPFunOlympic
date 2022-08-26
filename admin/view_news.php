<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <h4>Category List</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Thumbnail</th>
                            <th>Uploaded Date</th>
                            <th>Uploaded Time</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php     
                    $query = "SELECT * FROM news";
                    $select_news = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_news)) {
                        $nid                = $row['nid'];
                        $news_title     = $row['news_title'];
                        $news_description     = $row['news_description'];
                        $news_category     = $row['news_category']; 
                        $news_thumbnail     = $row['news_thumbnail']; 
                        $uploaded_date     = $row['uploaded_date'];       
                        $uploaded_time     = $row['uploaded_time']; 
                        echo "<tr>";
                    echo "<td>$nid</td>";
                    echo "<td>$news_title</td>";
                    echo "<td>$news_description</td>";
                    echo "<td>$news_category</td>";
                    echo "<td><img class='img-responsive' src = '../images/$news_thumbnail' height=50 width=50></td>";
                    echo "<td>$uploaded_date</td>";
                    echo "<td>$uploaded_time</td>";
                    echo "<td><a href='comments.php?delete=$nid' class='btn btn-primary'>View</a></td>";
                    echo "<td><a href='comments.php?delete=$nid' class='btn btn-warning'>Edit</a></td>";
                    echo "<td><a href='comments.php?delete=$nid' class='btn btn-danger'>Delete</a></td>";
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