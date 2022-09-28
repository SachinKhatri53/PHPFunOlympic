<?php
if(isset($_POST['btn-search'])){
    $search = $_POST['search'];
}?>
<title>Search: <?php echo $search ?></title>

<?php include "header.php" ?>
<?php record_activity("<strong>" . $_SESSION['username'] . "</strong> searched for <strong>".$search."</strong>", $_SESSION['ip_address'], $_SESSION['country_name']); ?>
<div class="row" style="margin:100px 0 10px 0; color:#ea540a;">
    <div class="col-md-4"></div>
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
<div class="row">
    <h6 style="color:#ea540a;">Results on: <?php echo $search ?></h6>
</div>
<div class="row justify-content-center">
    <div class="card-deck">
        <?php    
                 
        $query = "SELECT * FROM videos WHERE description LIKE '%$search%'";
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
        <?php }?>
    </div>
</div>
<?php include "footer.php" ?>