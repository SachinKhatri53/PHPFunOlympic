<?php
if(isset($_GET['category'])){
    $category_name = $_GET['category'];
}
?>
<title>HomePage: Enjoy every sports</title>
<?php include "header.php"?>
<div class="row" style="padding:20px 50px">
    <?php
                    $query = "SELECT * FROM videos WHERE category_title ='$category_name'";
                    $select_videos = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($select_videos);
                    if($count<1){
                        echo "<p class='text-danger'>No videos available</p>";
                    }
                    else{
                        while($row = mysqli_fetch_assoc($select_videos)) {
                            $vid                = $row['vid'];
                                $title     = $row['title'];
                                $video_path     = $row['video_path'];
                                $upload_date     = $row['upload_date']; ?>
    <div class="card-deck" style="margin-right:10px">
        <a href="play_video.php?vid=<?php echo $vid?>&title=<?php echo $title ?>">
            <div class="card">
                <div class="card-body">
                    <video controls height=200 width=250>
                        <source src='videos/<?php echo $video_path ?>' type='video/mp4'>

                </div>
                <div class="card-footer">
                    <h6 style="text-align:center"><?php echo $title ?></h6>
                    <small class="text-muted">Uploaded on:&nbsp;<?php echo $upload_date ?></small>
                </div>
            </div>
        </a>
    </div> <?php }
                    }
                     ?>
</div>
<?php include "footer.php"?>