<form action="" method="post">
    <div class="row" style="margin:20px 0; padding: 0 0 0 100px">
        <?php
                        $select_query = "SELECT * FROM categories LIMIT 4";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                            $cid = $row['cid'];
                        $category_title     = $row['category_title']; ?>
        <div class='col-2'><a href='fixtures.php?id=<?php echo $cid ?>' class='btn btn-secondary'><?php  echo $category_title ?></a></div>
        <?php } ?>
        <div class="col-2">
            <div class="form-group">
                <select name="" id="" class="form-control">
                    <?php
                        $select_query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                        $category_title     = $row['category_title'];
                        echo "<option value='$category_title'>$category_title</option>";
                        }?>
                </select>
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                <input type="submit" value="Filter" class="btn btn-success">
            </div>
        </div>
    </div>
</form>