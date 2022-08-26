<?php
// $upload_date = date('d-m-Y');
// $upload_time = date("h:i:sa");
if(isset($_POST['add_fixture'])){
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
    if(add_fixture($fixture_title, $fixture_date, $fixture_time, $fixture_category, $fixture_countries)){
      
        $fixture_upload_message = "Fixture has been added successfully";
        $fixture_upload_message_color ="text-success";
    }
    else{
        $fixture_upload_message = "Fixture could not be added";
        $fixture_upload_message_color ="text-danger";
    }
}
}
?>

<div class="modal fade" id="fixturesModal" tabindex="-1" style="" role="dialog" aria-labelledby="fixturesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsModalLabel">Add New Fixture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="fixture_title">Title</label>
                        <input type="text" name="fixture_title" id="" class="form-control">
                    </div>
                    <?php include "country_list.php" ?>
                    <div class="form-group">
                        <label for="fixture_date">Date</label>
                        <input type="date" name="fixture_date" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fixture_time">Time</label>
                        <input type="time" name="fixture_time" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fixture_category">Category</label>
                        <select name="fixture_category" id="" class="form-control">
                            <?php
                            $categories_query = "SELECT * FROM categories";
                            $select_categories_query = mysqli_query($connection, $categories_query);
                            while($row = mysqli_fetch_assoc($select_categories_query)) {
                              $title     = $row['category_title'];
                            echo "<option value='$title'>$title</option>";
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
</div>