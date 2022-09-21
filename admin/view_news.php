<title>Admin: View All News</title>
<?php include "admin_header.php" ?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">News</h4>
        <?php
        if(recordCount('news')==0){
            echo"<h5 class='text-danger'>No news</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col-md-12'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Uploaded Date</th>
                                    <th>Uploaded Time</th>
                                    <th colspan='3'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>";
                            
                            deleteNews(); 
                            $query = 'SELECT * FROM news';
                            $select_news = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_news)) {
                                $nid                = $row['nid'];
                                $news_title     = $row['news_title'];
                                $news_description     = $row['news_description'];
                                $news_category     = $row['news_category']; 
                                $news_thumbnail     = $row['news_thumbnail']; 
                                $uploaded_date     = $row['uploaded_date'];       
                                $uploaded_time     = $row['uploaded_time']; 
                                echo "<tr>
                            
                            <td>$news_title</td>
                            <td>$news_category</td>
                            <td>$uploaded_date</td>
                            <td>$uploaded_time</td>
                            <td><a href='edit_news.php?edit=$nid&title=$news_title' style='color:blue' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a></td>
                            <td><a href='view_news.php?delete=$nid'  style='color:Red' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>";
                            }
                            echo "</tbody>
                        </table>
                    </div>
                </div>
            </div>";
        }?>
</div>
<?php include "admin_footer.php" ?>