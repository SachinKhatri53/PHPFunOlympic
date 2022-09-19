<?php include "../db.php"?>
<?php
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

//-------------------  -------------------
function upload_video($title, $category_title, $description, $video_path, $tags, $upload_date, $upload_time){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO videos(title, category_title, description, video_path, tags, upload_date, upload_time) VALUES(?,?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'sssssss', $title, $category_title, $description, $video_path, $tags, $upload_date, $upload_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        add_statistics($title);
        return true;
    }
}

//-------------------  -------------------
function add_statistics($title){
    global $connection;
    $query = "INSERT INTO video_statistics(video_title, likes, dislikes, shares, views) VALUES('$title', 0, 0, 0, 0)";
    $insert_query = mysqli_query($connection, $query);
}

//-------------------  -------------------
function add_category($category_title){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO categories(category_title) VALUES(?) ");
    mysqli_stmt_bind_param($stmt, 's', $category_title);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//-------------------  -------------------
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


//-------------------  -------------------
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

//-------------------  -------------------
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

//-------------------  -------------------
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

//-------------------  -------------------
function recordCount($table){
    global $connection;
    $query = "SELECT * FROM " . $table;
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}

//-------------------  -------------------
function deleteCategories(){
    global $connection;
    if (isset($_GET['delete'])) {
         $cid = $_GET['delete'];

         $query = "DELETE FROM categories WHERE cid = {$cid}";
         $delete_cat = mysqli_query($connection, $query);
     }
}

//-------------------  -------------------
function deleteHighlights(){
    global $connection;
    if (isset($_GET['delete'])) {
         $vid = $_GET['delete'];
         $query = "DELETE FROM videos WHERE vid = {$vid}";
         $delete_highlight = mysqli_query($connection, $query);
     }
}

//-------------------  -------------------
function deleteLiveVideos(){
    global $connection;
    if (isset($_GET['delete'])) {
         $lvid = $_GET['delete'];
         $query = "DELETE FROM live_videos WHERE lvid = {$lvid}";
         $delete_live = mysqli_query($connection, $query);
     }
}

//-------------------  -------------------
function deletePhotos(){
    global $connection;
    if (isset($_GET['delete'])) {
         $pid = $_GET['delete'];
         $query = "DELETE FROM photos WHERE pid = {$pid}";
         $delete_photo = mysqli_query($connection, $query);
     }
}

//-------------------  -------------------
function deleteNews(){
    global $connection;
    if (isset($_GET['delete'])) {
         $nid = $_GET['delete'];
         $query = "DELETE FROM news WHERE nid = {$nid}";
         $delete_news = mysqli_query($connection, $query);
     }
}

//-------------------  -------------------
function deleteComments(){
    global $connection;
    if (isset($_GET['delete'])) {
         $comment_id = $_GET['delete'];
         $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
         $delete_comment = mysqli_query($connection, $query);
     }
}

//-------------------  -------------------
function deleteFixtures(){
    global $connection;
    if (isset($_GET['delete'])) {
         $fid = $_GET['delete'];
         $query = "DELETE FROM fixtures WHERE fid = {$fid}";
         $delete_fixtures = mysqli_query($connection, $query);
     }
}

//-------------------  -------------------
function editHighlight($vid, $title, $category_title, $description, $video_path, $tags, $upload_date, $upload_time){
    global $connection;
        $query = "UPDATE videos SET ";
        $query .= "title = '{$title}', ";
        $query .= "category_title = '{$category_title}', ";
        $query .= "description = '{$description}', ";
        $query .= "video_path = '{$video_path}', ";
        $query .= "tags = '{$tags}', ";
        $query .= "upload_date = '{$upload_date}', ";
        $query .= "upload_time = '{$upload_time}'";
        $query .= " WHERE vid = {$vid}";
        $edit_highlight = mysqli_query($connection, $query);
        if($edit_highlight){
            return true;
        }
    }

    //-------------------  -------------------
    function editImage($pid, $caption, $category_title, $image_path, $upload_date, $upload_time){
        global $connection;
            $query = "UPDATE photos SET ";
            $query .= "caption = '{$caption}', ";
            $query .= "category_title = '{$category_title}', ";
            $query .= "image_path = '{$image_path}', ";
            $query .= "upload_date = '{$upload_date}', ";
            $query .= "upload_time = '{$upload_time}'";
            $query .= " WHERE pid = {$pid}";
            $edit_photo = mysqli_query($connection, $query);
            if($edit_photo){
                return true;
            }
        }

        //-------------------  -------------------
function edit_news($nid, $news_title, $news_description, $news_thumbnail, $news_category, $uploaded_date, $uploaded_time){
    global $connection;
    $query = "UPDATE news SET ";
    $query .= "news_title = '{$caption}', ";
    $query .= "news_description = '{$news_description}', ";
    $query .= "news_thumbnail = '{$news_thumbnail}', ";
    $query .= "news_category = '{$news_catgory}'";
    $query .= "uploaded_date = '{$uploaded_date}', ";
    $query .= "uploaded_time = '{$uploaded_time}'";
    $query .= " WHERE nid = {$nid}";
    $edit_news = mysqli_query($connection, $query);
    if($edit_news){
        return true;
    }
}

//-------------------  -------------------
function edit_fixture(){

}

//-------------------  -------------------
function changeStatusToInactive(){
    global $connection;
    if (isset($_GET['inactive'])) {
        $uid = $_GET['inactive'];
        $query = "UPDATE users SET status = 'inactive' WHERE uid = {$uid}";
        mysqli_query($connection, $query);
    }
}

//-------------------  -------------------
function changeStatusToAactive(){
    global $connection;
    if (isset($_GET['active'])) {
        $uid = $_GET['active'];
        $query = "UPDATE users SET status = 'active' WHERE uid = {$uid}";
        mysqli_query($connection, $query);
    }
}

//-------------------  -------------------
function pending_password_reset_count(){
    global $connection;
    $query = "SELECT * FROM password_reset_request ORDER BY requested_date ASC";
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}
?>