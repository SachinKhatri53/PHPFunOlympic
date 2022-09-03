<?php include "db.php" ?>
<?php
session_start();

function redirect($location){
    return header("Location: " . $location);
    exit;
}

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}
function register_user($fullname, $phone, $email, $nationality, $username, $password){
    global $connection;
    date_default_timezone_set("Asia/Kathmandu");
    $date=date('d-m-Y');
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
    $stmt = mysqli_prepare($connection, "INSERT INTO users(fullname, phone, email, profile_image nationality, username, password, registered_date, is_admin) VALUES(?,?,?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'ssssssss', $fullname, $phone, $email, 'profile.png', $nationality, $username, $password, $date, 0);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

function login_user($username, $password){
    global $connection;
    
    $query = "SELECT * FROM users WHERE (email = '{$username}' OR username = '{$username}') AND status = 'active'";
    $select_user = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_array($select_user)) {
    $db_uid = $row ['uid'];
    $db_username = $row ['username'];
    $db_email = $row ['email'];
    $db_password = $row ['password'];
    $is_admin = $row['is_admin'];
        if (password_verify($password, $db_password)) {
        $_SESSION['uid'] = $db_uid;
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_user_email;
        $_SESSION['logged_in'] = "logged_in";
        if($is_admin == 0){
            redirect("home.php");
        }
        else{
            redirect("admin/index.php");
        }
        
        }
    }
}

function add_comment($uid, $vid, $content, $date, $time){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO comments(uid, vid, comment, date, time) VALUES(?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'sssss', $uid, $vid, $content, $date, $time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

function update_view_count($views, $video_title){
    global $connection;
    $query = "UPDATE video_statistics SET views = $views+1 WHERE video_title = '$video_title'";
    $update_views = mysqli_query($connection, $query);
}

function fetch_highlights(){
    global $connection;
    $query = "SELECT * FROM videos";
        $select_videos = mysqli_query($connection, $query);
        $count = mysqli_num_rows($select_videos);
        while($row = mysqli_fetch_assoc($select_videos)) {
            $vid                = $row['vid'];
            $title     = $row['title'];
            $video_path     = $row['video_path'];
            $upload_date     = $row['upload_date'];
            echo "<div class='col-md-3'>
                    <div class='card-deck' style='margin-right:10px'>
                        <a href='play_video.php?vid=$vid?>&title= $title'>
                            <div class='card'>
                                <div class='card-body'>
                                    <video controls height=200 width=250>
                                        <source src='videos/$video_path' type='video/mp4'>
                                </div>
                                <div class='card-footer'>
                                    <h6 style='text-align:center'>$title</h6>
                                    <small class='text-muted'>Uploaded on:&nbsp; $upload_date</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>";
        }
}

function fetch_live_videos(){
global $connection;
$query = "SELECT * FROM live_videos";
$select_videos = mysqli_query($connection, $query);
$count = mysqli_num_rows($select_videos);
while($row = mysqli_fetch_assoc($select_videos)) {
$lvid = $row['lvid'];
$title = $row['video_title'];
$video_url = $row['video_url'];
$upload_date = $row['uploaded_date'];
echo "<div class='col-md-3'>
        <div class='card-deck' style='margin-right:10px'>
            <a href='play_video.php?lvid=$lvid?>&title= $title'>
                <div class='card'>
                    <div class='card-body'>
                        <iframe width='' height='' src='$video_url' autoplay>
                        </iframe>
                    </div>
                    <div class='card-footer'>
                        <h6 style='text-align:center'>$title</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>";
}
}
function fetch_videos_by_categories($category_name){
    global $connection;
    $query = "SELECT * FROM videos WHERE category_title ='$category_name'";
    $select_videos = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select_videos);
    if($count<1){
        echo "<p class='text-danger'>No videos available</p>" ;
    }
    else{
        while($row=mysqli_fetch_assoc($select_videos)) {
            $vid=$row['vid'];
            $title=$row['title'];
            $video_path=$row['video_path'];
            $upload_date=$row['upload_date'];
            echo "<div class='col-md-3'>
                    <div class='card-deck' style='margin-right:10px'>
                        <a href='play_video.php?vid=$vid&title=$title'>
                            <div class='card'>
                                <div class='card-body'>
                                    <video controls height=200 width=250>
                                    <source src='videos/$video_path' type='video/mp4'>
                                </div>
                                <div class='card-footer'>
                                    <h6 style='text-align:center'>$title</h6>
                                    <small class='text-muted'>Uploaded on:&nbsp; $upload_date</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>" ;
        }
    }
}
function fetch_fixtures(){
    global $connection;
    $query = "SELECT * FROM fixtures";
    $select_fixtures = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_fixtures)) {
        
        $fid                = $row['fid'];
        $fixture_title     = $row['fixture_title'];
        $fixture_category     = $row['fixture_category']; 
        $fixture_countries     = $row['fixture_countries']; 
        $fixture_date     = $row['fixture_date'];       
        $fixture_time     = $row['fixture_time'];
        echo "<div class='col-md-3' style='margin-bottom:50px'>
                <div class='card border-success'>
                    <div class='card-header'>
                        <small class='text-muted'>Date:$fixture_date
                            <br>Time:$fixture_time</small>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title' style='text-align:center'>$fixture_title</h5>
                        <small class='text-right'>$fixture_category</small>
                    </div>
                    <div class='card-footer'>
                        <small class='text-muted'>Countries:$fixture_countries</small>
                    </div>
                </div>
            </div>";
    }
}
function fixtures_by_category($category_name){
    global $connection;
    $query = "SELECT * FROM fixtures WHERE fixture_category = '$category_name'";
    $select_fixtures = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_fixtures)) {
        
        $fid                = $row['fid'];
        $fixture_title     = $row['fixture_title'];
        $fixture_category     = $row['fixture_category']; 
        $fixture_countries     = $row['fixture_countries']; 
        $fixture_date     = $row['fixture_date'];       
        $fixture_time     = $row['fixture_time'];
        echo "<div class='col-md-3' style='margin-bottom:50px'>
                <div class='card border-success'>
                    <div class='card-header'>
                        <small class='text-muted'>Date:$fixture_date
                            <br>Time:$fixture_time</small>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title' style='text-align:center'>$fixture_title</h5>
                        <small class='text-right'>$fixture_category</small>
                    </div>
                    <div class='card-footer'>
                        <small class='text-muted'>Countries:$fixture_countries</small>
                    </div>
                </div>
            </div>";
    }
}
function fetch_photos(){
    global $connection;
    $sql = "SELECT * FROM photos";
    $rs_result = mysqli_query ($connection, $sql);
    while ($row = mysqli_fetch_assoc($rs_result)) {
        $pid            = $row['pid'];
        $caption        = $row['caption'];
        $category_title = $row['category_title'];
        $image_path     = $row['image_path'];
        $upload_date    = $row['upload_date'];
        $upload_time    = $row['upload_time'];

        echo "<div class='responsive' style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)'>
                <div class='gallery'>
                    <a class='image' href='images/$image_path ' title='$caption'>
                        <img src='images/$image_path' alt='$caption'>
                    </a>
                </div>
            </div>
            <script>
                $('.row').magnificPopup({
                    delegate: '.image',
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            </script>";
    }
}
function fetch_photos_by_category($category_name){
    global $connection;
    $sql = "SELECT * FROM photos WHERE category_title='$category_name'";
    $rs_result = mysqli_query ($connection, $sql);
    while ($row = mysqli_fetch_assoc($rs_result)) {
        $pid            = $row['pid'];
        $caption        = $row['caption'];
        $category_title = $row['category_title'];
        $image_path     = $row['image_path'];
        $upload_date    = $row['upload_date'];
        $upload_time    = $row['upload_time'];

        echo "<div class='responsive' style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)'>
                <div class='gallery'>
                    <a class='image' href='images/$image_path ' title='$caption'>
                        <img src='images/$image_path' alt='$caption'>
                    </a>
                </div>
            </div>
            <script>
                $('.row').magnificPopup({
                    delegate: '.image',
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            </script>";
    }
}
function commentsCount($table, $id){
    global $connection;
    $query = "SELECT * FROM " . $table . " WHERE vid=" . $id;
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}