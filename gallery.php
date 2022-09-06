<?php
if(isset($_GET['category'])){
    $category_name = $_GET['category'];
}
?>
<title>Gallery</title>
<?php include "header.php" ?>
<link rel="stylesheet" href="css/gallery.css">
<!--    magnific popup-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
<script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<div class="row jumbotron justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
    <h2>Gallery</h2>
</div>
<?php include "category_filter.php" ?>
<div class="row" style="padding:20px 50px">
<div class='image-row'>
    <?php
    if(empty($category_name)){
        fetch_photos();
    }
    else{
        fetch_photos_by_category($category_name);
    }
    ?>
    </div>
</div>
<?php include "footer.php" ?>