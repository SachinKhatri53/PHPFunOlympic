<form action="" method="get" id="category_filter">
    <div class="row" style="margin:20px 0; padding: 0 0 0 100px">
        <?php
                        $select_query = "SELECT * FROM categories LIMIT 4";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                            $cid = $row['cid'];
                        $category_title     = $row['category_title']; ?>
        <div class='col-2'><a href='fixtures.php?category=<?php echo $category_title ?>' class='btn btn-filter'><?php  echo $category_title ?></a></div>
        <?php } ?>
        <div class="col-3">
            <div class="form-group">
                <select name="category" id="category" class="form-control" onchange="changeCategory()">
                    <?php
                        $select_query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                        $category_title     = $row['category_title'];                         
                        echo "<option value='$category_title'>$category_title</option>";
                        } ?>
                </select>
            </div>
        </div>
    </div>
</form>
<script>
        function changeCategory(){
            document.getElementById('category_filter').submit();
        } 
    
    </script> 