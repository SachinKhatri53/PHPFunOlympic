<title>Search</title>
<?php include "header.php" ?>
<div class="row" style="margin:100px 0 20px 0; color:#ea540a; padding:40px 50px">
    <div class="col-md-4"></div>
    <div class="col-md-6">
        <form action="search.php" method="post">
        <div class="input-group">
            <input type="search" required name="search" id="" class="form-control" placeholder="Search" autocomplete="on">
            <button type="submit" name="btn-search" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <h6 style="color:#ea540a;">Results on: <?php echo $_POST['search'] ?></h6>
</div>
<div class="row justify-content-center">
<?php
                if(isset($_POST['btn-search'])){
                $search = $_POST['search'];
                    
                    $query = "SELECT * FROM videos where description LIKE '%$search%'";
                    $search_query = mysqli_query($connection, $query);
                    
                    if (!$search_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    
                    $count = mysqli_num_rows($search_query);
                    
                    if ($count == 0){
                        echo "<h4 class='text-center text-danger'>Not found</h4>";
                    }
                    else {

                            while ($row = mysqli_fetch_assoc ($search_query)) {
                                $vid         = $row['vid'];
                                $title       = $row['title'];
                                $video_path  = $row['video_path'];
                                $upload_date = $row['upload_date']; ?>
        <div class="col-md-3" style="margin-bottom:30px">
        <a href="">
            <div class="card-deck">
                <div class='card'>
                    <div class='card-body'>
                        <video width="100%">
                            <source src='videos/<?php echo $video_path ?>' type='video/mp4'>
                    </div>
                    <div class='card-footer'>
                        <h6 style='text-align:center'><?php echo $title ?></h6>
                        <small class='text-muted'>Uploaded on:&nbsp;<?php echo $upload_date ?></small>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <?php } }} ?>
   
</div>
<?php include "footer.php" ?>