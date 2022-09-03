<title>Admin: View All Live Videos</title>
<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Live Videos</h4>
    <div class="row justify-content-center">
        <?php
        if(recordCount('live_videos')==0){
            echo"<h5 class='text-danger'>No live videos</h5>";
        }
        else{
            deleteLiveVideos();
            $query = "SELECT * FROM live_videos";
            $select_videos = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_videos)) {
                $lvid        = $row['lvid'];
                $video_title      = $row['video_title'];
                $video_category   = $row['video_category'];
                $video_description= $row['video_description']; 
                $video_url     = $row['video_url'];
                $uploaded_date= $row['uploaded_date'];
                $uploaded_time= $row['uploaded_time']; 
                echo "<div class='col-md-3' style='margin-bottom:20px'>
                        <div class='card'>
                            <iframe width='' height='' src='$video_url' autoplay>
                            </iframe>
                            <div class='card-footer'>
                                <small class='text-muted'>Uploaded: $uploaded_date</small>
                                <a href='' style='margin-left:5px;font-size:12px; color:orange' data-toggle='tooltip' data-placement='bottom' title='view'><i class='fa-solid fa-eye'></i></a>
                                <a href='' style='font-size:12px; color:blue' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a>
                                <a href='view_live_videos.php?delete=$lvid' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" style='font-size:12px; color:Red' data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a>
                            </div>
                        </div>
                    </div>";
            }
        }
        ?>
    </div>
</div>
<?php include "admin_footer.php" ?>