<?php include "admin_header.php" ?>
<link rel="stylesheet" href="../css/gallery.css">
<!-- <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css"> -->

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

    <div class="row justify-content-center">
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
            <div class='col-lg-4 mb-4 mb-lg-0'>
            <a href='edit_photo.php?edit=$pid' style='font-size:20px; color:blue' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a>
    <a href='view_photos.php?delete=$pid&title=$caption' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" style='font-size:20px; color:Red' data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a>
    <img
      src='../images/$image_path'
      class='w-100 shadow-1-strong rounded mb-4'
      alt='$category_title'
    />
  </div>
            ";
                
        }}
        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<?php include "admin_footer.php" ?>