<?php
if(isset($_GET['category'])){

    $category_name = $_GET['category'];
}
if(isset($_GET['country'])){
    $country_name = $_GET['country'];
}?>
<title>Fixtures</title>
<?php 
include "header.php";
?>
<style>
.card:hover {
    box-shadow: .75em .75em 1em rgb(186, 185, 185);
}
</style>

<div class="row jumbotron justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
    <h2>Fixtures</h2>
</div>
<?php include "category_filter.php" ?>

<div class="row">
    <div class="container">
        <div class="card-deck">
            <?php
            if(empty($category_name)){
                fetch_fixtures();
            }
            
            else{
                fixtures_by_category($category_name);
            }
             ?>
        </div>
    </div>
</div>
<?php include "footer.php" ?>