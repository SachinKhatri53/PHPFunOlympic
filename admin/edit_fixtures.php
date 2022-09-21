<?php
if(isset($_GET['edit'])){
    $fid = $_GET['edit'];
}
?>
<title>Admin: Edit Fixture - <?php echo $_GET['title'] ?></title>
<?php include "admin_header.php" ?>
<?php 

    $upload_date = date('d-m-Y');
    $upload_time = date("h:i:sa");
    $allowed = array('jpg', 'jpeg', 'png');
    if(isset($_POST['upload_photo'])){
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
            if(editFixture($fixture_title, $fixture_date, $fixture_time, $fixture_category, $fixture_countries)){
              
                $fixture_upload_message = "Fixture has been added successfully";
                $fixture_upload_message_color ="text-success";
            }
            else{
                $fixture_upload_message = "Fixture could not be added";
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
            <p class="<?php echo isset($message_color) ? $message_color : ''?>">
                <?php echo isset($upload_message) ? $upload_message : ''?></p>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="fixture_title">Title</label>
                        <input type="text" name="fixture_title" id="" value="<?php echo $db_fixture_title ?>" class="form-control">
                    </div>
                    <?php
                    include "country_list.php"
                    ?>
                    <div class="form-group">
                        <label for="fixture_date">Date</label>
                        <input type="date" name="fixture_date" id="" value="<?php echo $db_fixture_date ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fixture_time">Time</label>
                        <input type="time" name="fixture_time" value="<?php echo $db_fixture_time ?>" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fixture_category">Category</label>
                        <select name="fixture_category" id="" class="form-control">
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
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Add" name="add_fixture" class="btn btn-sm btn-block btn-primary">
                    </div>
                </form>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>