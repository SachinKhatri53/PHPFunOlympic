<title>Gallery</title>
<?php include "header.php" ?>
<link rel="stylesheet" href="css/gallery.css">
<!--    magnific popup-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
<script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<?php include "category_filter.php" ?>
<div class="row" style="padding:20px 50px">
    <?php  
		        
                $sql = "SELECT * FROM photos";
                $rs_result = mysqli_query ($connection, $sql);
                while ($row = mysqli_fetch_assoc($rs_result)) {
                    $pid            = $row['pid'];
                    $caption        = $row['caption'];
                    $category_title = $row['category_title'];
                    $image_path     = $row['image_path'];
                    $upload_date    = $row['upload_date'];
                    $upload_time    = $row['upload_time'];
            ?>

    <div class="responsive">
        <div class="gallery">
            <a href="images/<?php echo $image_path ?>" title="<?php echo $caption ?>"><img src='images/<?php echo $image_path ?>'
                    alt='<?php echo $caption ?>'></a>
        </div>
    </div>
    <?php } ?>
</div>
<script>
$('.row').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
        enabled: true
    }
});
</script>
<?php include "footer.php" ?>