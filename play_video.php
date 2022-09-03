<?php if(isset($_GET['vid'])){
    $vid = $_GET['vid'];
    $title = $_GET['title'];
}
?>
<title><?php echo isset($title)?$title:''?></title>
<?php include "header.php" ?>
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


<style>
.button {
    background:aliceblue;
    color: black;
    padding: 0 20px 0 0;
    font-size:0.8em;
    text-align: center;
    text-decoration: none;
    margin: 4px 2px;
    display:inline-block;
    border-radius: 16px;
}
</style>
<div class="row" style="margin:90px 0 10px">
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
                        $upload_date = $row['upload_date'];
                        $upload_time = $row['upload_time'];
                        ?>
        <video width="100%" height="480px" controls autoplay>
            <source src="videos/<?php echo $video_path?>" type="video/mp4">
        </video>
        <h5 style="padding:10px 0"><?php echo $title ?></h5>
        <div class="row"  style="background:aliceblue; padding:10px 0">
            <div class="col-6">
                <div class="row">
                    <?php
                    $query = "SELECT * FROM video_statistics WHERE video_title = '$title'";
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

        <?php update_view_count($views, $title) ?>
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
                        // echo "<div class='row button'>
                        // <img src='images/$profile_image' alt='' height=50 width=50 style='border-radius:16px'>
                        // $content (<small class='text-info'> $date</small>)</div>";
                        } }?>


    </div>
    <div class="col-md-4"></div>
</div>
<?php include "footer.php" ?>