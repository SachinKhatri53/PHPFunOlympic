
<?php include "admin_header.php" ?>
<?php if(isset($_GET['view'])){
    $vid = $_GET['view'];
    $query = "SELECT * FROM videos WHERE vid = $vid";
    $select_video = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_video)) {
        $video_title = $row['title'];
        $video_path = $row['video_path'];
        $description= $row['description'];
        $upload_date = $row['upload_date'];
        $upload_time = $row['upload_time'];
} ?>
<title>Admin: <?php echo $video_title ?></title>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">

        <video width="100%" height="480px" controls autoplay>
            <source src="videos/<?php echo $video_path?>" type="video/mp4">
        </video>
        <h5 style="padding:10px 0"><?php echo $title ?></h5>
        <div class="row"  style="background:aliceblue; padding:10px 0">
            <div class="col-6">
                <div class="row">
                    <?php
                    $query = "SELECT * FROM video_statistics WHERE video_title = '$video_title'";
                    $select_video = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_video)) {
                        $views = $row['views'];
                    }?>
                    <div class="col-2">
                        <a href=""><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>12
                    </div>
                    <div class="col-2">
                        <a href=""><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>2
                    </div>
                    <div class="col-3">
                        <i class="fa fa-eye" aria-hidden="true"></i></a><?php echo $views?> views
                    </div>
                    <div class="col-3">
                        <a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i>share</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                Uploaded on: <?php echo $upload_date ?>
            </div>

        </div>
        <p style="text-align:justify; padding:10px 0"><?php echo $description ?></p>

        <?php } ?>
</div>
<?php include "admin_footer.php" ?>