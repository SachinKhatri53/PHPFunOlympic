<div class="row" style="padding:20px 50px">
    <div class="card-deck">
        <?php  
             $query = "SELECT * FROM videos ORDER BY upload_date DESC";
             $select_videos = mysqli_query($connection, $query);
             while($row = mysqli_fetch_assoc($select_videos)) {
                 $vid                = $row['vid'];
                 $title     = $row['title'];
                 $video_path     = $row['video_path'];
                 $upload_date     = $row['upload_date'];
                ?>

        <div class="card">
            <!-- <a href="video_streaming.php?vid=<?php echo $vid ?>"> -->
            <video width="100%" controls>
                <source src="videos/<?php echo $video_path ?>" type="video/mp4">
            </video>
            <div class="card-body">
                <a href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>&type=highlight">
                    <h5 class="card-title"
                        style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                    -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                        <?php echo $title ?></h5>
                </a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
            </div>
        </div>

        <?php } ?>
    </div>
</div>