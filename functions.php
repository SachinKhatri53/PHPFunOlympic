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