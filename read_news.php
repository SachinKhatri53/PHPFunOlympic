<?php
if(isset($_GET['nid'])){
    $nid = $_GET['nid'];
    $title = $_GET['title'];
}
?>
<title><?php echo $title ?></title>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=62fb4bf64897e5001907e83c&product=inline-share-buttons" async="async"></script>

<?php include "header.php" ?>
<?php
                    $query = "SELECT * FROM news WHERE nid = $nid";
                    $select_news = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_news)) {
                        $news_title     = $row['news_title'];
                        $news_description     = $row['news_description'];
                        $news_category     = $row['news_category']; 
                        $news_thumbnail     = $row['news_thumbnail']; 
                        $uploaded_date     = $row['uploaded_date'];       
                        $uploaded_time     = $row['uploaded_time'];
                        ?>
<h4 class="text-center"><?php echo $news_title ?></h4>
<h6 class="text-danger text-right"><?php echo $uploaded_date ?></h6>
<div class="row">
    <div class="col-md-4">
    <img src="images/<?php echo $news_thumbnail ?>" alt="" height=400 width=550>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-7 text-justify">
        <?php echo $news_description ?>
    </div>
</div>
<div class="sharethis-inline-share-buttons"></div>
<?php } ?>
<?php include "footer.php" ?>