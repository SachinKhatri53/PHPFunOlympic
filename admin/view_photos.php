<?php include "admin_header.php" ?>
<link rel="stylesheet" href="../css/gallery.css">
<!-- <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css"> -->
<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">


</style>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Gallery</h4>

    <div class="row justify-content-center">
        <div class="container gallery-container">
            <div class="tz-gallery">
                <div class="row">
                    <?php
        if(recordCount('photos')==0){
            echo"<h5 class='text-danger'>No photos</h5>";
        }
        else{
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
    
            echo "
            <div class='col-sm-12 col-md-4'>
                    <a class='lightbox' href='../images/$image_path'>
                        <img src='../images/$image_path' alt='$caption'>
                    </a>
                </div>
                <a href='edit_photo.php?edit=$pid' style='font-size:20px; color:blue' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a>
                    <a href='view_photos.php?delete=$pid&title=$caption' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" style='font-size:20px; color:Red' data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a>
                ";
        }}
        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
    baguetteBox.run('.tz-gallery');
    </script>
<?php include "admin_footer.php" ?>