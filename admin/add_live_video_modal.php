<?php
$upload_date = date('d-m-Y');
$upload_time = date("h:i:sa");

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
      
        $news_upload_message = "News has been uploaded successfully";
        $news_upload_message_color ="text-success";
    }
    else{
        $news_upload_message = "News could not be uploaded";
        $news_upload_message_color ="text-danger";
    }
}
}
?>

<div class="modal fade" id="liveVideoModal" tabindex="-1" role="dialog" aria-labelledby="liveVideoLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="liveVideoModalLabel">Add New Live Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="video_title" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="video_description" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="youtube_url">YouTube URL</label>
                        <input type="text" name="youtube_url" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="video_category" id="" class="form-control">
                            <?php
                            $categories_query = "SELECT * FROM categories";
                            $select_categories_query = mysqli_query($connection, $categories_query);
                            while($row = mysqli_fetch_assoc($select_categories_query)) {
                            $title     = $row['category_title'];
                            echo "<option value='$title'>$title</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" name="add_live_video" class="btn btn-sm btn-block btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>