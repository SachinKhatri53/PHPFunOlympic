<?php
if(isset($_GET['vid'])){
    $vid = $_GET['vid'];
    $title = $_GET['title'];
}
?>
<title><?php echo isset($title)?$title:''?></title>
<?php include "header.php" ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<?php
$uid = $_SESSION['uid'];
date_default_timezone_set("Asia/Kathmandu");
$date=date('d-m-Y');
$time = date("h:i:sa");

if(isset($_POST['favorite'])){
    if(add_to_favorite($uid, $vid)){
       echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Added to favourite videos.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    }
}
if(isset($_POST['undo-favorite'])){
    if(remove_from_favorite($uid, $vid)){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Removed from favourite videos.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>";
    }
}

?>
<style>
.button {
    background: aliceblue;
    color: black;
    padding: 0 20px 0 0;
    font-size: 0.8em;
    text-align: center;
    text-decoration: none;
    margin: 4px 2px;
    display: inline-block;
    border-radius: 16px;
}

.fa-thumbs-down,
.fa-thumbs-o-down {
    transform: rotateY(180deg);
    color: red;
}
</style>
<div class="row" style="margin:90px 0 10px 0">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="input-group">
            <input type="search" name="" id="" class="form-control" placeholder="Search">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-md-8">
        <?php
                    
          $query = "SELECT * FROM videos WHERE vid = $vid";
          $select_video = mysqli_query($connection, $query);
          while($row = mysqli_fetch_assoc($select_video)) {
              $video_title = $row['title'];
              $video_path = $row['video_path'];
              $description= $row['description'];
              $views = $row['views'];
              $upload_date = $row['upload_date'];
              $upload_time = $row['upload_time'];
              ?>
        <video width="100%" height="480px" controls autoplay>
            <source src="videos/<?php echo $video_path?>" type="video/mp4">
        </video>
        <h5 style="padding-top:10px" class="text-center"><?php echo $title ?></h5>
        <hr>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-thumbs-up like-btn"></i>
                                <span class="likes">22</span>
                            </div>
                            <div class="col-3">
                                <i class="fa fa-thumbs-down dislike-btn"></i>
                                <span class="dislikes">12</span>
                            </div>
                            <div class="col-3">
                                <i class="fa fa-eye" aria-hidden="true"></i> <?php echo $views?>
                            </div>
                            <div class="col-3">
                                <a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i> share</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                        if(is_favorite_video($uid,$vid)==0){
                            echo "<form action='' method='post'>
                                    <button type='submit' name='favorite' class='btn btn-sm btn-outline-success'>Add to Favourite</button>
                                </form>";
                        }
                        else{
                            echo "<form action='' method='post'>
                                    <button type='submit' name='undo-favorite' class='btn btn-sm btn-success'>Unsave</button>
                                </form>";
                        }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-right" style="font-size:15px">Uploaded on: <?php echo $upload_date ?></p>
            </div>

        </div>
        <p style="text-align:justify; padding:10px 0"><?php echo $description ?></p>

        <?php } ?>
        <?php
        ?>
        <hr>
        <!-- comments -->
        <?php
        if(commentsCount('comments', $vid) < 2){
            echo "<h6>" . commentsCount('comments', $vid) . " comment</h6>";
        }
        else{
            echo "<h6>" . commentsCount('comments', $vid) . " comments</h6>";
        }
        ?>

        <div class="row" style="padding:0 50px">

            <form method="post" role="form">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter you comment"
                        aria-describedby="button-comment-addon" name='content'>
                    <input class="btn btn-outline-secondary" type="submit" id="btn-comment-addon" name="comment"
                        value="Comment">
                </div>
            </form>
        </div>
        <?php
                    $query = "SELECT * FROM comments WHERE vid = $vid";
                    $select_comments = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_comments)) {
                        $content = $row['comment'];
                        $uid= $row['uid'];
                        $date = $row['date'];
                        ?>

        <?php
                    $query = "SELECT * FROM users WHERE uid = $uid";
                    $select_user = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_user)) {
                        $username = $row['username'];
                        $profile_image = $row['profile_image'];
                        echo"<div class='row button'>
                        <img src='images/$profile_image' alt='' height=50 width=50 style='border-radius:16px;'>                    
                        $content</div><br>";
                        } }?>


    </div>

    <div class="col-md-3">
        <p class="section-heading">Related Videos</p>
        <div class="card-deck">
            <?php     
                           $query = "SELECT * FROM videos ORDER BY upload_date DESC LIMIT 3";
                           $select_videos = mysqli_query($connection, $query);
                           while($row = mysqli_fetch_assoc($select_videos)) {
                               $vid                = $row['vid'];
                               $title     = $row['title'];
                               $video_path     = $row['video_path'];
                               $upload_date     = $row['upload_date'];
                              ?>
            <div class="row" style='margin-bottom:10px'>
                <div class="card">
                    <!-- <a href="video_streaming.php?vid=<?php echo $vid ?>"> -->
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
</div>

<?php include "footer.php" ?>