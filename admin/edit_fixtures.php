<?php
if(isset($_GET['edit'])){
    $fid = $_GET['edit'];
}
?>
<title>Admin: Edit Fixture - <?php echo $_GET['title'] ?></title>
<?php include "admin_header.php" ?>
<?php 
    if(isset($_POST['edit_fixture'])){
        $fixture_title = escape($_POST['fixture_title']);
        $fixture_date = escape($_POST['fixture_date']);
        $fixture_time = escape($_POST['fixture_time']);
        $fixture_category = escape($_POST['fixture_category']);
        $fixture_countries = escape($_POST['fixture_countries']);
        $fixture_error = [
            'title_error'=> '',
            'date_error'=> '',
            'time_error'=> '',
            'countries_error'=> '',
            'category_error'=>'',        
          ];
        
          if(empty($fixture_title)){
            $fixture_error['title_error'] = 'Title cannot be empty.';
          }
          if(empty($fixture_date)){
            $fixture_error['date_error'] = 'Please select date';
          }
          if(empty($fixture_category)){
            $fixture_error['category_error'] = 'Select one category.';
          }
          if(empty($fixture_time)){
            $fixture_error['time_error'] = 'Please select time.';
          }
          if(empty($fixture_countries)){
            $fixture_error['countries_error'] = 'Please select countries';
          }
        
          foreach ($fixture_error as $key => $value){
            if(empty($value)){
                unset($fixture_error[$key]);
            }
        }
        if(empty($fixture_error)){
            if(edit_fixture($fid, $fixture_title, $fixture_date, $fixture_time, $fixture_category, $fixture_countries)){
              
                $fixture_upload_message = "Fixture has been updated successfully";
                $fixture_upload_message_color ="text-success";
            }
            else{
                $fixture_upload_message = "Fixture could not be updated";
                $fixture_upload_message_color ="text-danger";
            }
        }
    }

    $query = "SELECT * FROM fixtures WHERE fid = $fid";
    $select_fixture = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_fixture)) {
        
        $db_fixture_title = $row['fixture_title'];
        $db_fixture_date = $row['fixture_date'];
        $db_fixture_time = $row['fixture_time'];
        $db_fixture_category = $row['fixture_category'];
        $db_fixture_countries = $row['fixture_countries'];
}?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4>Edit Fixtures</h4>
            <hr>
            <p class="<?php echo isset($fixture_upload_message_color) ? $fixture_upload_message_color : ''?>">
                <?php echo isset($fixture_upload_message) ? $fixture_upload_message : ''?></p>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="fixture_title">Title</label>
                        <input type="text" name="fixture_title" id="" value="<?php echo $db_fixture_title ?>" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($fixture_error['title_error']) ? $fixture_error['title_error'] : '' ?>
                    </p>
                    </div>
                    <?php
                    include "country_list.php";?>
                    <p class="text-danger" style="font-size:12px">
                        <?php echo isset($fixture_error['countries_error']) ? $fixture_error['countries_error'] : '' ?>
                    </p>
                    <?php echo "[<small>$db_fixture_countries</small>]";?>
                    <div class="form-group">
                        <label for="fixture_date">Date</label>
                        <input type="date" name="fixture_date" id="" value="<?php echo $db_fixture_date ?>" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($fixture_error['date_error']) ? $fixture_error['date_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="fixture_time">Time</label>
                        <input type="time" name="fixture_time" value="<?php echo $db_fixture_time ?>" id="" class="form-control">
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($fixture_error['time_error']) ? $fixture_error['time_error'] : '' ?>
                    </p>
                    </div>
                    <div class="form-group">
                        <label for="fixture_category">Category</label>
                        <select name="fixture_category" id="" class="form-control">
                        <option value="">Select</option>
                            <?php
                            $categories_query = "SELECT * FROM categories";
                            $select_categories_query = mysqli_query($connection, $categories_query);
                            while($row = mysqli_fetch_assoc($select_categories_query)) {
                              $title     = $row['category_title'];
                              if ($db_fixture_category == $title){
                                echo "<option selected value='{$title}'>{$title}</option>";
                            }
                            else {
                            echo "<option value='{$title}'>{$title}</option>";                    
                            }
                            }
                        ?>
                        </select>
                        <p class="text-danger" style="font-size:12px">
                        <?php echo isset($fixture_error['category_error']) ? $fixture_error['category_error'] : '' ?>
                    </p>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Update" name="edit_fixture" class="btn btn-sm btn-block btn-primary">
                    </div>
                </form>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>