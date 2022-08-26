<?php include "../db.php"?>
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

function upload_video($title, $category_title, $description, $video_path, $upload_date, $upload_time){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO videos(title, category_title, description, video_path, upload_date, upload_time) VALUES(?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'ssssss', $title, $category_title, $description, $video_path, $upload_date, $upload_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        add_statistics($title);
        return true;
    }
}
function add_statistics($title){
    global $connection;
    $query = "INSERT INTO video_statistics(video_title, likes, dislikes, shares, views) VALUES('$title', 0, 0, 0, 0)";
    $insert_query = mysqli_query($connection, $query);
}
function add_category($category_title){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO categories(category_title) VALUES(?) ");
    mysqli_stmt_bind_param($stmt, 's', $category_title);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function add_news($news_title, $news_description, $image_path, $news_category, $upload_date, $upload_time){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO news(news_title, news_description, news_thumbnail, news_category, uploaded_date, uploaded_time) VALUES(?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'ssssss', $news_title, $news_description, $image_path, $news_category, $upload_date, $upload_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

function add_live_video($video_title, $video_description, $video_url, $video_category, $upload_date, $upload_time){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO live_videos(video_title, video_description, video_url, video_category, uploaded_date, uploaded_time) VALUES(?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'ssssss', $video_title, $video_description, $video_url, $video_category, $upload_date, $upload_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}
function upload_image($caption, $category_title, $image_path, $upload_date, $upload_time){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO photos(caption, category_title, image_path, upload_date, upload_time) VALUES(?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'sssss', $caption, $category_title, $image_path, $upload_date, $upload_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

function add_fixture($fixture_title, $fixture_date, $fixture_time, $fixture_category, $fixture_countries){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO fixtures(fixture_title, fixture_date, fixture_time, fixture_category, fixture_countries) VALUES(?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'sssss', $fixture_title, $fixture_date, $fixture_time, $fixture_category, $fixture_countries);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

function recordCount($table){
    global $connection;
    $query = "SELECT * FROM " . $table;
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}

?>