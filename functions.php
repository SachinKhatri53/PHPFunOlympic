<?php include "db.php" ?>
<?php
ob_start();
session_start();
//-------------------  -------------------
function redirect($location){
    return header("Location: " . $location);
    exit;
}
//-------------------  -------------------
function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}
//------------------- confirms if the SQL query is running -------------------
function confirm_Query($result) {
    global $connection;
    if (!$result){
        die ('Query Failed' . mysqli_error($connection));
    }
}

//------------------- checks if the user already exists during registration -------------------
function username_exists($username){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirm_Query($result);
    $row = mysqli_num_rows($result);
    
    if ($row > 0){
        return true;
    }
    else{
        return false;
    }
}

//------------------- checks if the email already exists during registration -------------------
function email_exists($email){
    global $connection;
    $query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    confirm_Query($result);
    $row = mysqli_num_rows($result);
    
    if ($row > 0){
        return true;
    }
    else{
        return false;
    }
}

//------------------- registers new user -------------------
function register_user($fullname, $phone, $nationality, $email, $username, $password){
    $ip_address = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    $ip_data = @json_decode(file_get_contents(
        "http://www.geoplugin.net/json.gp?ip=" . $ip_address));
    $country_name = $ip_data->geoplugin_countryName;
    if(!$country_name){
        $country_name = "Nepal";
    }
    global $connection;
    date_default_timezone_set("Asia/Kathmandu");
    $date=date('d-m-Y');
    $status='inactive';
    $is_admin=0;
    $last_login = "N/A";
    $verification_key = md5(time().$username);
    $profile_pic = 'profile.png';
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
    $stmt = mysqli_prepare($connection, "INSERT INTO users(fullname, phone, nationality, email, profile_image, username, password, status, registered_date, is_admin,last_login) VALUES(?,?,?,?,?,?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'sssssssssss', $fullname, $phone, $nationality, $email, $profile_pic, $username, $password, $status, $date, $is_admin, $last_login);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        $subject="Email Verification";
        $from = "noreply@ismt.com";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $message ="
        <html>
        <head>
        <title>Email Verification</title>
        </head>
        <body>
        <h2>Dear $fullname,</h2>
        <p>Thank you for requesting user registration. Please click link given below to activate your user account.</p>
        <center><a href='http://localhost:8080/FunOlympicPHP/verify_email.php?email=$email&ip_address=$ip_address&country_name=$country_name'>Verify</a><center>
        <br>
    <p style='text-align:center'>
    Address<br>
    Edinburgh Building, Chester Rd,<br>Sunderland SR1 3SD,<br>United Kingdom
    </p>
    <p style='text-align:center'>
    Contact: +441915153000<br>
    Email: info.funolympic@gmail.com
    </p>
    <br>
    <p style='color:red'>
    CONFIDENTIALITY NOTICE: This transmittal is a confidential communication or may otherwise be privileged. If you are not the intended recipient, you are hereby notified that you have received this transmittal in error and that any review, dissemination, distribution or copying of this transmittal is strictly prohibited. If you have received this communication in error, please notify this office, and immediately delete this message and all its attachments, if any.
    </p>
        </body>
        </html>";
        
        mail($email, $subject, $message, $headers);
        record_activity("Registration confirmation link sent to <strong>".$email."</strong>", $ip_address, $country_name);

        return true;
    }
}
//------------------- checks if the registered user is verified or not -------------------
function notVerifiedUser($username){
    global $connection;
    $username = escape(trim($username));
    $query = "SELECT * FROM users WHERE (username = '{$username}' OR email = '{$username}' ) AND status = 'inactive'";
    $select_user = mysqli_query($connection, $query);
    confirm_Query($select_user);
    $row = mysqli_num_rows($select_user);
    if ($row > 0){
        return true;
    }
    else{
        return false;
    }
}

//-------------------  -------------------
function login_user($username, $password){
    date_default_timezone_set("Asia/Kathmandu");
    $date=date('d-m-Y');
    $ip_address = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    $ip_data = @json_decode(file_get_contents(
        "http://www.geoplugin.net/json.gp?ip=" . $ip_address));
    $country_name = $ip_data->geoplugin_countryName;
    if(!$country_name){
        $country_name = "Nepal";
    }
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
            mysqli_query($connection, "UPDATE users SET last_login='$date' WHERE uid = $db_uid");
        $_SESSION['uid'] = $db_uid;
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_email;
        $_SESSION['logged_in'] = "logged_in";
        
        if($is_admin == 0){
        $_SESSION['ip_address'] = $ip_address;
        $_SESSION['country_name'] = $country_name;
            record_activity('User logged in as <strong>'.$username.'</strong>', $ip_address, $country_name);
            redirect("home.php");
        }
        else{
        $_SESSION['ip_address'] = "101.251.4.0";
        $_SESSION['country_name'] = "Nepal";
            record_activity('Admin logged in as <strong>'.$username.'</strong>', $_SESSION['ip_address'], $_SESSION['country_name']);
            redirect("admin/index.php");
        }
        return true;
        }
    }
    
}

//-------------------  -------------------
function verify_email($email){
    global $connection;
    $email = escape($email);
    $query = "UPDATE users SET status = 'active' WHERE email = '{$email}'";
    $result = mysqli_query($connection, $query);
    confirm_Query($result);
    if(!$result){
        return false;
    }
    return true;
}

//-------------------  -------------------
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

//-------------------  -------------------
function update_view_count($views, $vid){
    global $connection;
    $query = "UPDATE videos SET views = $views+1 WHERE vid = '$vid'";
    $update_views = mysqli_query($connection, $query);
}

//-------------------  -------------------
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
                        <a href='play_video.php?vid=$vid&title=$title&type=highlight'>
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

//-------------------  -------------------
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
            <a href='play_video.php?vid=$lvid&title=$title&type=live'>
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

//-------------------  -------------------
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

//-------------------  -------------------
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
        echo "<div class='col-sm-3' style='margin-bottom:50px'>
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
//-------------------  -------------------
function fixtures_by_category($category_name){
    global $connection;
    $query = "SELECT * FROM fixtures WHERE fixture_category = '$category_name'";
    $select_fixtures = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select_fixtures);
    if($count<1){
        echo "<p class='text-danger'>No fixtures on <strong>$category_name</strong> available</p>" ;
    }
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

//-------------------  -------------------

function fixtures_by_countries($country_name){
    global $connection;
    echo "<script>alert('HI')</script>";
    $query = "SELECT * FROM fixtures WHERE fixture_countries = 'Greece, Hungary'";
    $select_fixtures = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select_fixtures);
    if($count<1){
        echo "<p class='text-danger'>No fixtures of <strong>$country_name</strong> available</p>" ;
    }
    while($row=mysqli_fetch_assoc($select_fixtures)){
        $fid               = $row['fid'];
        $fixture_title     = $row['fixture_title'];
        $fixture_category  = $row['fixture_category']; 
        $fixture_countries = $row['fixture_countries']; 
        $fixture_date      = $row['fixture_date'];       
        $fixture_time      = $row['fixture_time'];
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

//-------------------  -------------------
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

        echo "
        <div class='col-sm-12 col-md-4'>
                    <a class='lightbox' href='images/$image_path'>
                        <img src='images/$image_path' alt='$caption'>
                    </a>
                </div>
        ";
    }
}

//-------------------  -------------------
function fetch_photos_by_category($category_name){
    global $connection;
    $sql = "SELECT * FROM photos WHERE category_title='$category_name'";
    $rs_result = mysqli_query ($connection, $sql);
    if(mysqli_num_rows($rs_result)==0){
echo "<p class='text-danger'>No photos available for <strong>" . $category_name . "</strong></p>";
    }
    else{
    while ($row = mysqli_fetch_assoc($rs_result)) {
        $pid            = $row['pid'];
        $caption        = $row['caption'];
        $category_title = $row['category_title'];
        $image_path     = $row['image_path'];
        $upload_date    = $row['upload_date'];
        $upload_time    = $row['upload_time'];

        echo "<div class='col-sm-12 col-md-4'>
        <a class='lightbox' href='images/$image_path'>
            <img src='images/$image_path' alt='$caption'>
        </a>
    </div>";
    }
}
}


//-------------------  -------------------
function commentsCount($table, $id){
    global $connection;
    $query = "SELECT * FROM " . $table . " WHERE vid=" . $id;
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}

//-------------------  -------------------
function add_to_favorite($uid, $vid){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO favorite_videos(uid, vid) VALUES(?,?) ");
    mysqli_stmt_bind_param($stmt, 'ss', $uid, $vid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

//-------------------  -------------------
function remove_from_favorite($uid, $vid){
    global $connection;
    $query = "DELETE FROM favorite_videos WHERE uid = $uid AND vid = $vid";
    mysqli_query($connection, $query);
}

//------------------- check video has been added as favorite or not -------------------
function is_favorite_video($uid, $vid){
    global $connection;
    $query = "SELECT * FROM favorite_videos WHERE uid = $uid AND vid = $vid";
    $select_query = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_query);
    return $result;
}

//------------------- Send mail -------------------
function send_mail($email, $phone, $fullname, $content){
    global $connection;
    date_default_timezone_set("Asia/Kathmandu");
    $date=date('d-m-Y');
    $status='unread';
    $stmt = mysqli_prepare($connection, "INSERT INTO emails(fullname, phone, email, message, status, sent_date) VALUES(?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'ssssss', $fullname, $phone, $email, $content, $status, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
    return true;
    }
}

//-------------------  -------------------
function request_password_reset($email){
    global $connection;
    date_default_timezone_set("Asia/Kathmandu");
    $date=date('d-m-Y');
    $stmt = mysqli_prepare($connection, "INSERT INTO password_reset_request(email, requested_date) VALUES(?,?) ");
    mysqli_stmt_bind_param($stmt, 'ss', $email, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

//-------------------  -------------------
function has_requested_reset_password($email){
    global $connection;
    $query = "SELECT * FROM password_reset_request WHERE email = '$email'";
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}

//-------------------  -------------------
function recordCount($table){
    global $connection;
    $query = "SELECT * FROM " . $table;
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}

//------------------- checks if user has provided correct old passsword while changing with new one -------------------
function check_old_password($username, $old_password){
    global $connection;
    $select_query = "SELECT password FROM users WHERE username = '$username'";
    $query_result = mysqli_query($connection, $select_query);
    while ($row = mysqli_fetch_array($query_result)) {
            $db_user_password = $row ['password'];
            if (password_verify($old_password, $db_user_password)) {
                return true;
            }
        }
}
//------------------- changes password of verified user -------------------
function change_password($username, $new_password){
    global $connection;
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT, array('cost'=>12));
        $query = "UPDATE users SET password = '{$hashed_password}' WHERE username = '{$username}'";
        $result = mysqli_query($connection, $query);
        confirm_Query($result);
        if(!$result){
            return false;
        }
        return true;
}

//------------------- change_password_link -------------------
function send_change_password_link($email){
    $subject="Change Password Link";
    $from = "noreply@ismt.com";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $message ="
    <html>
    <head>
    <title>Change Password</title>
    </head>
    <body>
    <p style='text-align:center'>Kindly follow the link to change your password.</p>
    <center><a href='http://localhost:8080/FunOlympicPHP/forgot_password_process.php?email=$email'><button style='background:#009a49;border:none;color:white;padding:5px 10px;border-radius:5px;cursor:pointer'>Change Password</button></a><center>
    <br>
    <p style='text-align:center'>
    Address<br>
    Edinburgh Building, Chester Rd,<br>Sunderland SR1 3SD,<br>United Kingdom
    </p>
    <p style='text-align:center'>
    Contact: +441915153000<br>
    Email: info.funolympic@gmail.com
    </p>
    <br>
    <p style='color:red'>
    CONFIDENTIALITY NOTICE: This transmittal is a confidential communication or may otherwise be privileged. If you are not the intended recipient, you are hereby notified that you have received this transmittal in error and that any review, dissemination, distribution or copying of this transmittal is strictly prohibited. If you have received this communication in error, please notify this office, and immediately delete this message and all its attachments, if any.
    </p>
    </body>
    </html>";
    
    mail($email, $subject, $message, $headers);
    return true;
}

//-------------------  -------------------
function record_activity($activity, $ip_address, $country){
    date_default_timezone_set("Asia/Kathmandu");
    $date=date('d-m-Y');
    
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO activity_log(activity, date, country, ip_address) VALUES(?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $activity, $date, $country, $ip_address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}
?>