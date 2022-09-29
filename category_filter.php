
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

<script>
        function changeCategory(){
            document.getElementById('category_filter').submit();
        } 
    
        
    </script> 