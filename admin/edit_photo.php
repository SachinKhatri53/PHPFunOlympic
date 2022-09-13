<title>Admin: View All Highlights</title>
<?php include "admin_header.php" ?>
<?php 
if(isset($_GET['edit'])){
    $pid = $_GET['edit'];
}
    $upload_date = date('d-m-Y');
    $upload_time = date("h:i:sa");
    $allowed = array('jpg', 'jpeg', 'png');
    if(isset($_POST['upload_photo'])){
        $caption = escape($_POST['caption']);
        $category_title = escape($_POST['category_title']);
        $image_path        = escape($_FILES['image']['name']);
        $image_path_temp   = escape($_FILES['image']['tmp_name']);
        
        $ext = pathinfo($image_path, PATHINFO_EXTENSION);
        $error = [
            'upload_error'=> '',
            'caption_error'=> '',
            'category_error'=> '',         
        ];
        if($image_path==""){
            $error['upload_error'] = 'Please select image.';
        }
        if($category_title==""){
            $error['category_error'] = 'Please select category.';
        }
        if($caption==""){
            $error['caption_error'] = 'Caption cannot be empty.';
        }
        if(!($image_path=="") && !in_array($ext, $allowed)){
            $error['upload_error'] = 'Invalid image format. Available format(jpeg, jpg, png)';
        }
        foreach ($error as $key => $value){
            if(empty($value)){
                unset($error[$key]);
            }
        }
        if(empty($error)){
            
            if(editImage($pid, $caption, $category_title, time().$image_path, $upload_date, $upload_time)){
                copy($image_path_temp, "../images/".time().$image_path);
                $upload_message = "Image has been updated successfully";
                $message_color ="text-success";
            }
            else{
                $upload_message = "Image could not be updated";
                $message_color ="text-danger";
            }
        }
    }

    $query = "SELECT * FROM photos WHERE pid = $pid";
    $select_photo = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_photo)) {
        $db_caption = $row['caption'];
        $db_category_title = $row['category_title'];
        $db_image_path = $row['image_path'];
        $db_upload_date = $row['upload_date'];
        $db_upload_time = $row['upload_time'];
}?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4>Edit Photo</h4>
            <hr>
            <p class="<?php echo isset($message_color) ? $message_color : ''?>">
                <?php echo isset($upload_message) ? $upload_message : ''?></p>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="caption">Caption</label>
                    <input type="text" name="caption" id="" class="form-control" value="<?php echo $db_caption ?>">
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
                        if ($db_category_title == $category_title){
                            echo "<option selected value='{$category_title}'>{$category_title}</option>";
                        }
                        else {
                        echo "<option value='{$category_title}'>{$category_title}</option>";                    
                        }
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Photo</label>
                    <img src="../images/<?php echo $db_image_path ?>" alt="" width="100%" height="380px" style="object-fit: cover;">
                    <input type="file" name="image" id="" class="form-control">
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($error['upload_error']) ? $error['upload_error'] : '' ?>
                    </p>
                </div>
                <input type="submit" value="Upload" name="upload_photo" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>