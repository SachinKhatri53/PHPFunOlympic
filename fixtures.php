<?php include "header.php" ?>
<?php include "category_filter.php" ?>
<div class="row" style="padding:20px 50px">
<?php
                    $query = "SELECT * FROM fixtures";
                    $select_fixtures = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_fixtures)) {
                        
                        $fid                = $row['fid'];
                        $fixture_title     = $row['fixture_title'];
                        $fixture_category     = $row['fixture_category']; 
                        $fixture_countries     = $row['fixture_countries']; 
                        $fixture_date     = $row['fixture_date'];       
                        $fixture_time     = $row['fixture_time'];
                        ?>
    <div class="card-deck">
        <div class="card border-success" style="max-width: 18rem;">
        <div class="card-header">
                <small class="text-muted">Date:<?php echo $fixture_date ?> <br>Time:<?php echo $fixture_time ?></small>
            </div>
            <div class="card-body">
                <h5 class="card-title" style="text-align:center"><?php echo $fixture_title ?></h5>
                <small class="text-right"><?php echo $fixture_category ?></small>
            </div>
            <div class="card-footer">
                <small class="text-muted">Countries:<?php echo $fixture_countries ?></small>
            </div>
        </div>
    </div> <?php } ?>
</div>
<?php include "footer.php" ?>