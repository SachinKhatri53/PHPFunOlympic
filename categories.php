<title>Categories</title>
<?php include "header.php" ?>
<div class="row jumbotron justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
    <h2>Categories</h2>
</div>
<div class="row">
    <div class="container">
        <div class="row" style="padding: 20px 0">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);
            $count = mysqli_num_rows($select_categories);
            if($count<1){
                echo "<p class='text-danger'>No categories available</p>";
            }
            else{
                while($row = mysqli_fetch_assoc($select_categories)) {
                    $cid                = $row['cid'];
                        $category_title     = $row['category_title']; ?>
            <div class="col-md-3" style="padding: 20px 10px">
                <a href="video.php?category=<?php echo $category_title ?>" style="color:#ea540a; "><?php echo $category_title ?>
                </a></div>
            <!-- <a href="video.php?category=<?php echo $category_title ?>" style="color:#ea540a;">

                    <?php echo $category_title ?>
            </a>
            <hr> -->
            <?php 
        } } 
        ?>
        
        </div>
    </div>
</div>
<?php include "footer.php" ?>