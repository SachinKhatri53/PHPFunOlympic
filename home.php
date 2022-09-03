<title>HomePage: Enjoy every sports</title>
<?php include "header.php"?>
<style>
#left-fixed {
    height: 70vh;
    /* height: 77.5vh; */
    position: fixed;
    top: 80px;
    left: .5%;
    margin: 1em;
    box-shadow: .75em .75em 1em rgb(186, 185, 185);
    background-color: #accbff;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0.5em 0;
    z-index: 5;
}

.fixtures {
    height: 47%;
    border-bottom: 2px solid Aliceblue;
    margin-bottom: 10px;
}
</style>
<div class="row" style="margin:100px 0 20px 0">
    <div class="col-md-4"></div>
    <div class="col-md-6">
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="search" required name="search" id="" class="form-control" placeholder="Search"
                    autocomplete="on">
                <button type="submit" name="btn-search" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

</div>
<div class="row">
    <!-- <div class="col-md-1"></div> -->
    <div class="col-md-3" id="left-fixed">
        <h6 class="text-center" style="color:#ea540a;">Fixtures</h6>
        <div class="row fixtures">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Match</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $current_date = date("Y-m-d") ;   
                    $query = "SELECT * FROM fixtures ORDER BY fixture_date DESC LIMIT 5";
                    $select_fixtures = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_fixtures)) {
                        $fixture_date                = $row['fixture_date'];
                        $fixture_title     = $row['fixture_title'];  
                        $fixture_time     = $row['fixture_time'];       
                        echo "<tr>";
                    echo "<td><small>$fixture_date</small></td>";
                    echo "<td><small>$fixture_title</small></td>";
                    echo "<td><small>$fixture_time</small></td>";
                    echo "</tr>";
                    }
                    ?>
                    </tbody>

                </table>
                <small><a href="fixtures.php" style="color:#030330">View all</a></small>
            </div>
        </div>
        <h6 class="text-center" style="color:#ea540a;">News</h6>
        <div class="row news" style="padding: 0 20px 0 0">
            <?php
                    $current_date = date("Y-m-d") ;   
                    $query = "SELECT * FROM news ORDER BY uploaded_date DESC LIMIT 3";
                    $select_news = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_news)) {
                        $news_title                = $row['news_title'];
                        $uploaded_date     = $row['uploaded_date']; 
                        echo"<ul></li><a href=''><small>$news_title</small></a></li></ul>";
                        
                    }
                    ?>

        </div>
        <small><a href="news.php" style="color:#030330">View all</a></small>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-7 d-flex flex-column align-end">
        <div class="row">
            <div class="col-md-6">
                <h6 style="color:#009a49">Latest Videos</h6>

            </div>
            <div class="col-md-6">
                <p class="text-right"><a href="video.php">view all</a></p>
            </div>
        </div>
        <div class="row" style="border-top-style:solid; border-color:#357960; padding:20px 0">
<div class="card-deck">
            <?php  
             $query = "SELECT * FROM videos ORDER BY upload_date DESC LIMIT 3";
             $select_videos = mysqli_query($connection, $query);
             while($row = mysqli_fetch_assoc($select_videos)) {
                 $vid                = $row['vid'];
                 $title     = $row['title'];
                 $video_path     = $row['video_path'];
                 $upload_date     = $row['upload_date'];
                ?>

            <div class="card">
                <!-- <a href="video_streaming.php?vid=<?php echo $vid ?>"> -->
                <video width="100%" controls>
                    <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                </video>
                <div class="card-body">
                    <a href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>">
                        <h5 class="card-title"
                            style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                    -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                            <?php echo $title ?></h5>
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
                </div>
            </div>

            <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h6 style="color:#009a49">Live Videos</h6>
            </div>
            <div class="col-md-6">
                <p class="text-right"><a href="video.php?live">view all</a></p>
            </div>
        </div>
        <div class="row live-videos" style="border-top-style:solid; border-color:#357960; padding:20px 0">
            <h3>Live Video</h3>
            <div class="live-content">

                <div class="card-deck">
                    <?php     
                           $query = "SELECT * FROM live_videos ORDER BY uploaded_date DESC LIMIT 3";
                           $select_videos = mysqli_query($connection, $query);
                           while($row = mysqli_fetch_assoc($select_videos)) {
                               $lvid                = $row['lvid'];
                               $title     = $row['video_title'];
                               $video_url     = $row['video_url'];
                               $upload_date     = $row['uploaded_date']; ?>
                               
                    <div class="card">
                    
                        <iframe src="<?php echo $video_url ?>"></iframe>
                        <a href="play_video.php?vid=<?php echo $lvid ?>&title=<?php echo $title ?>">
                        <div class="card-body">
                            <h5 class="card-title"
                                style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                        -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                                <?php echo $title ?></h5>
                        </div>
                        </a>
                    </div>
                    
                    <?php }?>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include "footer.php"?>