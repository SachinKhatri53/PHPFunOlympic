<?php
if(isset($_GET['category'])){
    $category_name = $_GET['category'];
}
?>
<title>Gallery</title>
<?php

    include "header.php";
?>
<link rel="stylesheet" href="css/gallery.css">

<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

<div class="row jumbotron justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
    <h2>Gallery</h2>
</div>
<div class="row" style="margin:20px 0; padding: 0 0 0 100px">
       
        <div class="col-md-3">
        <form action="" method="get" id="category_filter">
            <div class="form-group">
                <select name="category" id="category" class="form-control" onchange="changeCategory()">
                <option value="">All Sports</option>
                    <?php
                        $select_query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                        $category_title     = $row['category_title'];                         
                        // echo "<option value='$category_title'>$category_title</option>";
                        if ($category_name == $category_title){
                            echo "<option selected value='{$category_title}'>{$category_title}</option>";
                        }
                        else {
                        echo "<option value='{$category_title}'>{$category_title}</option>";                    
                        }
                        } ?>
                </select>
            </div>
            </form>
        </div>
                    </div>
<div class="row">
    <div class="container gallery-container">
        <div class="tz-gallery">
            <div class="row">
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
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
    baguetteBox.run('.tz-gallery');
    </script>
    <script>
        function changeCategory(){
            document.getElementById('category_filter').submit();
        }
        </script>
<?php include "footer.php" ?>