<?php include "admin_header.php" ?>
<link rel="stylesheet" href="../css/gallery.css">
<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">

<style>
    .responsive {
width: 20%;
}
</style>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Gallery</h4>
    <div class="row">
        <?php
        deletePhotos();
        $sql = "SELECT * FROM photos";
        $rs_result = mysqli_query ($connection, $sql);
        while ($row = mysqli_fetch_assoc($rs_result)) {
            $pid            = $row['pid'];
            $caption        = $row['caption'];
            $category_title = $row['category_title'];
            $image_path     = $row['image_path'];
            $upload_date    = $row['upload_date'];
            $upload_time    = $row['upload_time'];
    
            echo "<div class='responsive' style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)'>
                    <div class='gallery'>
                        <a class='image' href='../images/$image_path ' title='$caption'>
                            <img src='../images/$image_path' alt='$caption'>
                        </a>
                    </div>
                    <a href='edit_photo.php?edit=$pid' style='color:blue; text-align:right' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a>
                    <a href='view_photos.php?delete=$pid' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" style='text-align:right; color:Red' data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a>
                </div>
                <script>
                    $('.row').magnificPopup({
                        delegate: '.image',
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                </script>";
                
        }
        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<?php include "admin_footer.php" ?>