<title>Admin: View All Comments</title>
<?php include "admin_header.php" ?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Comments</h4>
        <?php
        if(recordCount('comments')==0){
            echo"<h5 class='text-danger'>No comments</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col-md-12'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Commentor</th>
                                    <th>Video Title</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>";
                            
                            deleteComments(); 
                            $query = 'SELECT * FROM comments';
                            $select_comments = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_comments)) {
                                $comment_id                = $row['comment_id'];
                                $commentor     = $row['uid'];
                                $vid = $row['vid'];
                                $comment     = $row['comment'];
                                $uploaded_date     = $row['date'];       
                                $uploaded_time     = $row['time'];

                                $query_video = "SELECT * FROM videos WHERE vid = $vid";
                                $select_video = mysqli_query($connection, $query_video);
                                while($row = mysqli_fetch_assoc($select_video)) {
                                    $video_title = $row['title'];
                                }
                                $query_user = "SELECT * FROM users WHERE uid = $commentor";
                                $select_user = mysqli_query($connection, $query_user);
                                while($row = mysqli_fetch_assoc($select_user)) {
                                    $username = $row['username'];
                                }
                                ?>
                                <?php
                                echo "<tr>                            
                            <td>$username</td>
                            <td>$video_title</td>
                            <td>$comment</td>
                            <td>$uploaded_date</td>
                            <td>$uploaded_time</td>
                            <td><a href='view_comments.php?delete=$comment_id&title=$video_title'  style='color:red;' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a></td>
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