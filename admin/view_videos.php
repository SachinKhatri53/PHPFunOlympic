<title>Admin: View All Highlights</title>
<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Highlights</h4>
    <div class="row justify-content-center">
        <?php
        if(recordCount('videos')==0){
            echo"<h5 class='text-danger'>No videos</h5>";
        }
        else{
            deleteHighlights();
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
                echo "<div class='col-md-3' style='margin-bottom:20px'>
                        <div class='card'>
                            <video width='100%'>
                                <source src='../videos/$video_path' type='video/mp4'>
                            </video>
                            
                            <div class='card-footer'>
                                <small class='text-muted'>Uploaded: $upload_date</small>
                                <a href='' style='margin-left:5px;font-size:12px; color:orange' data-toggle='tooltip' data-placement='bottom' title='view'><i class='fa-solid fa-eye'></i></a>
                                <a href='' style='font-size:12px; color:blue' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a>
                                <a href='new_view.php?delete=$vid' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" style='font-size:12px; color:Red' data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a>
                            </div>
                        </div>
                    </div>";
            }
        }
       
        ?>
    </div>
</div>
<?php include "admin_footer.php" ?>