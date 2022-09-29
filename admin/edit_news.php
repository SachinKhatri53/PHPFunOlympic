<title>Admin: Edit News - <?php echo $_GET['title'] ?></title>
<?php include "admin_header.php" ?>


<?php
if(isset($_GET['edit'])){
    $nid = $_GET['edit'];
}
    $allowed = array('jpg', 'jpeg', 'png');
//update news
if(isset($_POST['update_news'])){
    $news_title = $_POST['news_title'];
    $news_description = $_POST['news_description'];
    $news_thumbnail = $_FILES['news_thumbnail']['name'];
    $news_thumbnail_temp   = $_FILES['news_thumbnail']['tmp_name'];
    $ext = pathinfo($news_thumbnail, PATHINFO_EXTENSION);
    $news_category = $_POST['news_category'];
    $news_date = $_POST['news_date'];
    $news_time = $_POST['news_time'];

    $news_error = [
        'title_error'=> '',
        'description_error'=> '',
        'thumbnail_error'=>'',
        'date_error'=> '',
        'time_error'=> '',       
      ];
    
      if(empty($news_title)){
        $news_error['title_error'] = 'Title cannot be empty.';
      }
      if(empty($news_date)){
        $news_error['date_error'] = 'Please select date.';
      }
      if(empty($news_time)){
        $news_error['time_error'] = 'Please select time.';
      }
      if(empty($news_description)){
        $news_error['description_error'] = 'Description cannot be empty.';
      }
      if(empty($news_thumbnail)){
        $news_error['thumbnail_error'] = 'Please select a thumbnail.';
      }

      foreach ($news_error as $key => $value){
        if(empty($value)){
            unset($news_error[$key]);
        }
    }
    if(empty($news_error)){
        if(edit_news($nid, $news_title, $news_description, time().$news_thumbnail, $news_category, $news_date, $news_time)){
            copy($news_thumbnail_temp, "../images/".time().$news_thumbnail);
            $news_update_message = "News has been updated successfully";
            $news_update_message_color ="text-success";
        }
        else{
            $news_update_message = "News could not be updated";
            $news_update_message_color ="text-danger";
        }
    }
}


//fetch data from database
$query = "SELECT * FROM news WHERE nid = $nid";
$select_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_query)){
    $db_news_title = $row['news_title'];
    $db_news_description = $row['news_description'];
    $db_news_thumbnail = $row['news_thumbnail'];
    $db_news_category = $row['news_category'];
    $db_news_date = $row['uploaded_date'];
    $db_news_time = $row['uploaded_time'];
}
?>

<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h4>Edit News</h4>
            <hr>
            <p class="<?php echo isset($news_update_message_color) ? $news_update_message_color : ''?>">
                <?php echo isset($news_update_message) ? $news_update_message : ''?></p>
<form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="news_title" id="" class="form-control" value="<?php echo $db_news_title ?>">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['title_error']) ? $news_error['title_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="news_description">Description</label>
                        <textarea name="news_description" class="form-control" id="" cols="30" rows="5"><?php echo $db_news_description ?></textarea>
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['description_error']) ? $news_error['description_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="image">Thumbnail</label>
                        <img src="../images/<?php echo $db_news_thumbnail ?>" alt="" width="100%" height="380px" style="object-fit: cover;">
                        <input type="file" name="news_thumbnail" value="<?php echo $db_news_thumbnail ?>" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['thumbnail_error']) ? $news_error['thumbnail_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="news_date">Date</label>
                        <input type="date" name="news_date" id="" value="<?php echo $db_news_date ?>" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['date_error']) ? $news_error['date_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="news_time">Time</label>
                        <input type="time" name="news_time" value="<?php echo $db_news_time ?>" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['time_error']) ? $news_error['time_error'] : '' ?>
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
                              if ($db_news_category == $title){
                                echo "<option selected value='{$title}'>{$title}</option>";
                            }
                            else {
                            echo "<option value='{$title}'>{$title}</option>";                    
                            }
                            }
                        ?>
                        </select>
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($news_error['category_error']) ? $news_error['category_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" name="update_news" class="btn btn-sm btn-block btn-primary">
                    </div>
                </form>
                        </div>
                    </div>
                </div>
                <?php include "admin_footer.php" ?>