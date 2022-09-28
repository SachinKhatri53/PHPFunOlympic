
    <div class="row" style="margin:20px 0; padding: 0 0 0 100px">
       
        <div class="col-3">
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
        <div class="col-3">
            <form action="" method="get" id="country_filter">
            <div class="form-group">
                <select name="country" id="country" class="form-control" onchange="changeCountry()">
                <option value="">All Countries</option>
                    <?php
                        $select_query = "SELECT * FROM country";
                        $select_country = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_country)) {
                        $db_country_name     = $row['country_name'];                         
                        // echo "<option value='$category_title'>$category_title</option>";
                        if ($country_name == $db_country_name){
                            echo "<option selected value='{$db_country_name}'>{$db_country_name}</option>";
                        }
                        else {
                        echo "<option value='{$db_country_name}'>{$db_country_name}</option>";                    
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
    
        function changeCountry(){
            document.getElementById('country_filter').submit();
        }
    </script> 