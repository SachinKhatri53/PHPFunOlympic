<title>Admin: Edit Live</title>
<?php include "admin_header.php" ?>
<?php 
if(isset($_GET['edit'])){
    $lvid = $_GET['edit'];
}
if(isset($_POST['update_video'])){
    
    $title = escape($_POST['title']);
    $category_title = escape($_POST['category_title']);
    $description = escape($_POST['description']);
    $video_path        = escape($_POST['video_url']);
    $date = escape($_POST['live_date']);
    $time       = escape($_POST['live_time']);
    $error = [
        'upload_error'=> '',
        'title_error'=> '',
        'category_error'=> '',
        'description_error'=> '', 
        'time_error'=> '',
        'date_error'=> '',         
    ];
    if($video_path==""){
        $error['upload_error'] = 'Please select a video.';
    }
    if($category_title==""){
        $error['category_error'] = 'Please select category.';
    }
    if($title==""){
        $error['title_error'] = 'Title cannot be empty.';
    }
    if($description==""){
        $error['description_error'] = 'Description cannot be empty.';
    }
    if($date==""){
        $error['date_error'] = 'Please select date.';
    }
    if($time==""){
        $error['time_error'] = 'Please select time.';
    }
    foreach ($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        
        if(edit_live($lvid, $title, $category_title, $description, $video_path.'?autoplay=1&mute=1', $date, $time)){
            $upload_message = "Video has been updated successfully";
            $message_color ="text-success";
        }
        else{
            $upload_message = "Video could not be uploaded";
            $message_color ="text-danger";
        }
    }
}

    $query = "SELECT * FROM live_videos WHERE lvid = $lvid";
    $select_video = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_video)) {
        $db_video_title = $row['video_title'];
        $db_video_description= $row['video_description'];
        $db_video_path = $row['video_url'];
        $db_video_category = $row['video_category'];
        $db_upload_date = $row['uploaded_date'];
        $db_upload_time = $row['uploaded_time'];
}?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4>Edit Live Video</h4>
            <hr>
            <p class="<?php echo isset($message_color) ? $message_color : ''?>">
                <?php echo isset($upload_message) ? $upload_message : ''?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="" class="form-control" value="<?php echo $db_video_title ?>">
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['title_error']) ? $error['title_error'] : '' ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_title" id="" class="form-control">
                        <?php
                        $select_query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                        $category_title     = $row['category_title'];
                        if ($db_video_category == $category_title){
                            echo "<option selected value='{$category_title}'>{$category_title}</option>";
                        }
                        else {
                        echo "<option value='{$category_title}'>{$category_title}</option>";                    
                        }
                        }?>
                    </select>
                    <?php echo isset($error['category_error']) ? $error['category_error'] : '' ?>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" style="text-align:justify" class="form-control"><?php echo $db_video_description ?></textarea>
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['description_error']) ? $error['description_error'] : '' ?>
                    </p>
                </div>

                <div class="form-group">
                    
                    <iframe width="100%" height="380px" src='<?php echo $db_video_path?>' autoplay>
                            </iframe>
                            <label for="title">Video URL</label>
                            <input type="text" name="video_url" id="" class="form-control" value="<?php echo $db_video_path ?>">
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['upload_error']) ? $error['upload_error'] : '' ?>
                    </p>
                </div>
                <div class="form-group">
                        <label for="live_date">Date</label>
                        <input type="date" name="live_date" id="" value="<?php echo $db_upload_date ?>" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['date_error']) ? $error['date_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="live_time">Time</label>
                        <input type="time" name="live_time" value="<?php echo $db_upload_time ?>" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['time_error']) ? $error['time_error'] : '' ?>
                    </p>
                    </div>
                <input type="submit" value="Update" name="update_video" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>