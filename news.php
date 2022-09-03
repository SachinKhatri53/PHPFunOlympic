<title>News</title>
<?php include "header.php" ?>
<div class="row jumbotron justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
    <h2>News</h2>
</div>

<?php
                    $query = "SELECT * FROM news";
                    $select_news = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_news)) {
                        
                        $nid                = $row['nid'];
                        $news_title     = $row['news_title'];
                        $news_description     = $row['news_description'];
                        $news_category     = $row['news_category']; 
                        $news_thumbnail     = $row['news_thumbnail']; 
                        $uploaded_date     = $row['uploaded_date'];       
                        $uploaded_time     = $row['uploaded_time'];
                        ?>
<div class="row">
    <!-- <div class="col-2">
        <img src="images/<?php echo $news_thumbnail ?>" alt="<?php echo $news_thumbnail ?>" height=100 width=100% style="padding:10px;">
    </div> -->
    <div class="col-1"></div>
    <div class="col-10">
        
        <div class="row justify-content-center">
            <h4 style="color:#030330"><?php echo $news_title ?></h4>
        </div>
        <div class="row text-justify">
        <small style="color:#ea540a"><?php echo $uploaded_date ?></small><br>
            <p><?php echo $news_description ?><span id="dots">...</span>
                <a href="read_news.php?nid=<?php echo $nid ?>&title=<?php echo $news_title ?>" style="color:#ea540a">Read More</a>
            </p>
        </div>
        </div>
</div>
        <hr>
        <?php }?>

<?php  include "footer.php" ?>