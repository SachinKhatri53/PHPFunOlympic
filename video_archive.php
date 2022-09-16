<title>Video Archive</title>
<?php include "header.php"?>

<div class="row" style="margin-top:100px">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="search" required name="search" id="" class="form-control" placeholder="Search"
                    autocomplete="on">
                <button type="submit" name="btn-search" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

</div>

<!-- --------------------------------------Recently Uploaded Videos-------------------------------------- -->

<div class="row">
    <div class="col-md-6">
        <p class="section-heading">Recently Uploaded Videos</p>
    </div>
    <div class="col-md-6">
        <p class="text-right" style="padding-top: 20px"><a href="" data-toggle="modal" data-target="#loginModal">view
                all <i class="fa-solid fa-arrow-right"></i></a></p>
    </div>
</div>

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
        <div class="col-md-4" style="margin-bottom:20px">
            <div class="card">
                <video width="100%" controls>
                    <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                </video>
                <div class="card-footer">
                    <a href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>&type=highlight">
                        <h5 class="card-title"
                            style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                    -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                            <?php echo $title ?></h5>
                    </a>
                    <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- --------------------------------------Most Liked Videos-------------------------------------- -->

<div class="row">
    <div class="col-md-6">
        <p class="section-heading">Most Liked Videos</p>
    </div>
    <div class="col-md-6">
        <p class="text-right" style="padding-top: 20px"><a href="" data-toggle="modal" data-target="#loginModal">view
                all <i class="fa-solid fa-arrow-right"></i></a></p>
    </div>
</div>

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
        <div class="col-md-4" style="margin-bottom:20px">
            <div class="card">
                <video width="100%" controls>
                    <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                </video>
                <div class="card-footer">
                    <a href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>&type=highlight">
                        <h5 class="card-title"
                            style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                    -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                            <?php echo $title ?></h5>
                    </a>
                    <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- --------------------------------------Favourite Videos-------------------------------------- -->

<div class="row">
    <div class="col-md-6">
        <p class="section-heading">Favourite Videos</p>
    </div>
    <div class="col-md-6">
        <p class="text-right" style="padding-top: 20px"><a href="" data-toggle="modal" data-target="#loginModal">view
                all <i class="fa-solid fa-arrow-right"></i></a></p>
    </div>
</div>
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
        <div class="col-md-4" style="margin-bottom:20px">
            <div class="card">
                <video width="100%" controls>
                    <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                </video>
                <div class="card-footer">
                    <a href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>&type=highlight">
                        <h5 class="card-title"
                            style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                    -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                            <?php echo $title ?></h5>
                    </a>
                    <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- --------------------------------------Recommended Videos-------------------------------------- -->

<div class="row">
    <div class="col-md-6">
        <p class="section-heading">Recommended Videos</p>
    </div>
    <div class="col-md-6">
        <p class="text-right" style="padding-top: 20px"><a href="" data-toggle="modal" data-target="#loginModal">view
                all <i class="fa-solid fa-arrow-right"></i></a></p>
    </div>
</div>

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
        <div class="col-md-4" style="margin-bottom:20px">
            <div class="card">
                <video width="100%" controls>
                    <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                </video>
                <div class="card-footer">
                    <a href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>&type=highlight">
                        <h5 class="card-title"
                            style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                    -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                            <?php echo $title ?></h5>
                    </a>
                    <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php"?>