<title>Admin: Add New Live Video</title>
<?php include "admin_header.php" ?>
<?php
date_default_timezone_set("Asia/Kathmandu");
$upload_date = date('Y-m-d');
$upload_time = date("H:i");

if(isset($_POST['add_live_video'])){
  $video_title = escape($_POST['video_title']);
  $video_description = escape($_POST['video_description']);
  $video_url        = escape($_POST['youtube_url']);
  $video_category = escape($_POST['video_category']);
  $live_video_error = [
    'url_error'=> '',
    'title_error'=> '',
    'description_error'=> '',
    'category_error'=>'',        
  ];

  if(empty($video_title)){
    $live_video_error['title_error'] = 'Title cannot be empty.';
  }
  if(empty($video_description)){
    $live_video_error['description_error'] = 'Description cannot be empty.';
  }
  if(empty($video_url)){
    $live_video_error['url_error'] = 'URL cannot be empty.';
  }
  if(empty($video_category)){
    $live_video_error['category_error'] = 'Select one category';
  }

  foreach ($live_video_error as $key => $value){
    if(empty($value)){
        unset($live_video_error[$key]);
    }
}
if(empty($live_video_error)){
    if(add_live_video($video_title, $video_description, $video_url.'?autoplay=1&mute=1', $video_category, $upload_date, $upload_time)){
      
        $live_upload_message = "Live has been uploaded successfully";
        $live_upload_message_color ="text-success";
    }
    else{
        $live_upload_message = "Live could not be uploaded";
        $live_upload_message_color ="text-danger";
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
            <h4>Add New Live Video</h4>
            <hr>
            <p class="<?php echo isset($live_upload_message_color) ? $live_upload_message_color : ''?>">
                <?php echo isset($live_upload_message) ? $live_upload_message : ''?></p>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="video_title" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($live_video_error['title_error']) ? $live_video_error['title_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="video_description" id="" cols="30" class="form-control" rows="4"></textarea>
                        <!-- <input type="text" name="video_description" id="" > -->
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($live_video_error['description_error']) ? $live_video_error['description_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="youtube_url">Video URL</label>
                        <input type="text" name="youtube_url" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($live_video_error['url_error']) ? $live_video_error['url_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="video_category" id="" class="form-control">
                        <option value="">Select</option>
                            <?php
                            $categories_query = "SELECT * FROM categories";
                            $select_categories_query = mysqli_query($connection, $categories_query);
                            while($row = mysqli_fetch_assoc($select_categories_query)) {
                            $title     = $row['category_title'];
                            echo "<option value='$title'>$title</option>";
                            }
                        ?>
                        </select>
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($live_video_error['category_error']) ? $live_video_error['category_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" name="add_live_video" class="btn btn-sm btn-block btn-primary">
                    </div>
                </form>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>
