<title>Admin: Add New News</title>
<?php include "admin_header.php" ?>
<?php
$upload_date = date('d-m-Y');
$upload_time = date("h:i:sa");
$allowed_image_ext = array('jpg', 'jpeg', 'png');
if(isset($_POST['add_news'])){
  $news_title = escape($_POST['news_title']);
  $news_description = escape($_POST['news_description']);

  $image_path        = escape($_FILES['news_thumbnail']['name']);
  $image_path_temp   = escape($_FILES['news_thumbnail']['tmp_name']);
  $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

  $news_category = escape($_POST['news_category']);

  $news_error = [
    'upload_error'=> '',
    'title_error'=> '',
    'description_error'=> '',
    'category_error'=>'',        
  ];

  if(empty($news_title)){
    $display_news_modal = "block";
    $news_error['title_error'] = 'Title cannot be empty.';
  }
  if(empty($news_description)){
    $news_error['description_error'] = 'Description cannot be empty.';
  }
  if(empty($news_category)){
    $news_error['category_error'] = 'Select one category.';
  }
  if(empty($image_path)){
    $news_error['upload_error'] = 'Please select image.';
  }

  if(!($image_path=="") && !in_array($image_ext, $allowed_image_ext)){
    $news_error['upload_error'] = 'Invalid image format. Available format(jpg, jpeg, png)';
  }
  foreach ($news_error as $key => $value){
    if(empty($value)){
        unset($news_error[$key]);
    }
}
if(empty($news_error)){
    copy($image_path_temp, "../images/".time().$image_path);
    if(add_news($news_title, $news_description, time().$image_path, $news_category, $upload_date, $upload_time)){
      
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
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4>Add New News</h4>
            <hr>
            <p class="<?php echo isset($news_upload_message_color) ? $news_upload_message_color : ''?>">
                <?php echo isset($news_upload_message) ? $news_upload_message : ''?></p>
                <form action="" method="post" id="news-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="news_title" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['title_error']) ? $news_error['title_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="youtube_url">Description</label>
                        <input type="text" name="news_description" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['description_error']) ? $news_error['description_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="image">Thumbnail</label>
                        <input type="file" name="news_thumbnail" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['upload_error']) ? $news_error['upload_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="news_category" id="" class="form-control">
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
                        <?php echo isset($news_error['category_error']) ? $news_error['category_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" name="add_news" class="btn btn-sm btn-block btn-primary">
                    </div>
                </form>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>