<title>Admin: Add New Video</title>
<?php include "admin_header.php" ?>
<?php
date_default_timezone_set("Asia/Kathmandu");
$upload_date = date('Y-m-d');
$upload_time = date("H:i");
$allowed = array('mp4', 'mov', 'avi');

if(isset($_POST['upload_video'])){
    $title = escape($_POST['title']);
    $category_title = escape($_POST['category_title']);
    $description = escape($_POST['description']);
    $tags = escape($_POST['tags']);
    
    $video_path        = escape($_FILES['video']['name']);
    $video_path_temp   = escape($_FILES['video']['tmp_name']);
    
    $ext = pathinfo($video_path, PATHINFO_EXTENSION);
    $error = [
        'upload_error'=> '',
        'title_error'=> '',
        'tag_error'=> '',
        'description_error'=> '',         
    ];
    if($video_path==""){
        $error['upload_error'] = 'Please select a video.';
    }
    if($title==""){
        $error['title_error'] = 'Title cannot be empty.';
    }
    if($tags==""){
        $error['tag_error'] = 'Tags cannot be empty.';
    }
    if($description==""){
        $error['description_error'] = 'Description cannot be empty.';
    }
    if(!($video_path=="") && !in_array($ext, $allowed)){
        $error['upload_error'] = 'Invalid video format. Available format(mp4, mov, avi)';
    }
    foreach ($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        
        if(upload_video($title, $category_title, $description, time().$video_path, $tags, $upload_date, $upload_time)){
            copy($video_path_temp, "../videos/".time().$video_path);
            $upload_message = "Video has been uploaded successfully";
            $message_color ="text-success";
        }
        else{
            $upload_message = "Video could not be uploaded";
            $message_color ="text-danger";
        }
    }
}
?>

<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h4>Add New Video</h4>
            <hr>
            <p class="<?php echo isset($message_color) ? $message_color : ''?>">
                <?php echo isset($upload_message) ? $upload_message : ''?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="" class="form-control">
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['title_error']) ? $error['title_error'] : '' ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_title" id="" class="form-control">
                    <option value="">Select</option>
                        <?php
                        $select_query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                        $category_title     = $row['category_title'];
                        echo "<option value='$category_title'>$category_title</option>";
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['description_error']) ? $error['description_error'] : '' ?>
                    </p>
                </div>
                
                <div class="form-group">
                    <label for="title">File</label>
                    <input type="file" name="video" id="" class="form-control">
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['upload_error']) ? $error['upload_error'] : '' ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" name="tags" id="" class="form-control">
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['tag_error']) ? $error['tag_error'] : '' ?>
                    </p>
                </div>
                <input type="submit" value="Upload" name="upload_video" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>