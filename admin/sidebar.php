<?php
$display_icon_minus = "fa-plus";
if(isset($_POST['add_category'])){
    $category_title = $_POST['category_title'];
    if(empty($category_title)){
        $category_title_message = "*Category title cannot be empty.";
        $display_true ="block";
        $display_icon_minus = "fa-minus";
        $category_title_message_color = "text-danger";
    }
    else{
        add_category($category_title);
        $category_title_message = "New category added successfully.";
        $category_title_message_color = "text-success";
        $display_icon_minus = "fa-minus";
        $display_true ="block";
    }
}
?>
<link rel="stylesheet" href="css/sidebar.css">
<div class="sidenav">
        <ul>
        <hr>
            <li class="sidenav-list"><a href="../admin/"><i class="fa-solid fa-gauge"></i>&nbsp;Dashboard</a></li>
            <hr>
            <li class="sidenav-list" id="category"><i class="fa-solid fa-list"></i>&nbsp;Sports Category
                <ul>
                    <li class="sidenav-sublist" style="cursor:pointer;" onclick="showAddCategoryForm()"><i
                            class="fa-solid <?php echo isset($display_icon_minus)?$display_icon_minus:'' ?>"
                            id="add-category-icon"></i>&nbsp;Add Category</li>
                    <li id="add-category-form" style="display:<?php echo isset ($display_true)?$display_true:''?>">
                        <small
                            class="<?php echo isset($category_title_message_color)?$category_title_message_color:'' ?>"><?php echo  isset($category_title_message)?$category_title_message:''?></small>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="category_title" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" name="add_category" class="btn btn-success">
                            </div>
                        </form>
                    </li>
                    <li class="sidenav-sublist"><a href="view_categories.php"><i
                                class="fa-solid fa-dice-d6"></i>&nbsp;View Category</a></li>
                </ul>
            </li>
            <hr>
            <li class="sidenav-list" id="videos"><i class="fa-solid fa-film"></i>&nbsp;Videos
                <ul>
                    <li class="sidenav-sublist"><a href="add_video.php"><i class="fa-solid fa-plus"></i>&nbsp;Add New
                            Video</a></li>
                    <li class="sidenav-sublist"><a href="view_videos.php"><i class="fa-solid fa-video"></i>&nbsp;View
                            All Videos</a></li>
                </ul>
            </li>
            <hr>
            <li class="sidenav-list" id="videos"><i class="fa-solid fa-images"></i>&nbsp;Gallery
                <ul>
                    <li class="sidenav-sublist"><a href="add_photo.php"><i class="fa-solid fa-plus"></i>&nbsp;Add New
                            Photo</a></li>
                    <li class="sidenav-sublist"><a href="view_photos.php"><i class="fa-solid fa-layer-group"></i>&nbsp;View
                            All Photos</a></li>
                </ul>
            </li>
            <hr>
            <li class="sidenav-list"><a href="view_comments.php"><i class="fa-solid fa-users"></i>&nbsp;View Comments</a></li>
            <hr>
            <li class="sidenav-list"><a href="view_users.php"><i class="fa-solid fa-comment-dots"></i>&nbsp;View Users</a></li>
            <hr>
            <li class="sidenav-list"><a href="view_password_reset_requests.php"><i class="fa-solid fa-flag"></i>&nbsp;Password Reset Requests
            <span class="badge badge-danger"><?php echo pending_password_reset_count() ?></span></a></li>
</div>
<script src="js/sidebar.js"></script>