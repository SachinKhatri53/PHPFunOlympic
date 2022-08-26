<?php include "header.php" ?>
<div class="row">
    <div class="container">
        <h4 class="text-center" style="margin:10px 0">Sports</h4>
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
            <a href="video.php?category=<?php echo $category_title ?>">
                <div class="card text-white bg-info mb-3" style="max-width: 12rem; margin-right:20px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $category_title ?></h5>
                    </div>
                </div>
                </a>
                <hr>
                <?php } } ?>
        </div>
    </div>
    <?php include "footer.php" ?>