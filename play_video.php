
<?php if(isset($_GET['vid'])){
    $vid = $_GET['vid'];
    $title = $_GET['title'];
}
?>

<?php
date_default_timezone_set("Asia/Kathmandu");
$date=date('d-m-Y');
$time = date("h:i:sa");

if(isset($_POST['comment'])){
    $content = $_POST['content'];
    if(add_comment($_SESSION['uid'], $vid, $content, $date, $time)){
        echo "alert('Comment added')";
    }
    else{
        echo "alert('Comment failed')";
    }
    
}
?>

    <title><?php echo isset($title)?$title:''?></title>
<?php include "header.php" ?>
        <div class="row" style="padding:20px 0">
            <div class="col-md-8">
                <?php
                    $query = "SELECT * FROM videos WHERE vid = $vid";
                    $select_video = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_video)) {
                        $video_title = $row['title'];
                        $video_path = $row['video_path'];
                        $description= $row['description'];
                        $upload_date = $row['upload_date'];
                        $upload_time = $row['upload_time'];
                        ?>
                <video width="100%" height="400px" controls autoplay>
                    <source src="videos/<?php echo $video_path?>" type="video/mp4">
                </video>
                <h2><?php echo $title ?></h2>
                <div class="row">
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
                <h6>Description:</h6>
                <p style="text-align:justify"><?php echo $description ?></p>

                <?php } ?>
                
                <?php update_view_count($views, $video_title) ?>
            </div>
            <div class="col-md-4">

                <form method="post" role="form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter you comment"
                            aria-describedby="button-comment-addon" name='content'>
                        <input class="btn btn-outline-secondary" type="submit" id="btn-comment-addon" name="comment"
                            value="Comment">
                    </div>
                </form>
<hr>
                <?php
                    $query = "SELECT * FROM comments WHERE vid = $vid";
                    $select_comments = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_comments)) {
                        $content = $row['comment'];
                        $uid= $row['uid'];
                        $date = $row['date'];
                        ?>

                <div class="input-group mb-3" style="width:100%;padding:15px 0 0 15px;background:#f0f2f5; border:1px solid grey; border-radius:10px; margin-bottom:10px">
                    <div class="comment-header">
                        <?php
                    $query = "SELECT * FROM users WHERE uid = $uid";
                    $select_user = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_user)) {
                        $username = $row['username'];
                        echo "<p style='font-weight:bold'>$username</p>"; 
                        } ?>
                        <p style="margin-top:-20px"><?php echo $content ?>(<small class="text-info"><?php echo $date ?></small>)</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>