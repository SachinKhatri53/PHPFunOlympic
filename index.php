<?php include "functions.php" ?>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    login_user($username, $password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/de23b03d2b.js" crossorigin="anonymous"></script>
    <title>Homepage: Fun Olympic Games</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body style="background-image: url(../images/background.png)">
    <div class="container-fluid">
        <nav class="navbar navbar-light-content-between">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
            <h4>Fun Olympic</h4>
            <form class="form-inline" method="post" style="background:lightgrey; padding:10px">
                <input class="form-control mr-sm-2" type="text" placeholder="email" name="username">
                <input class="form-control mr-sm-2" type="password" placeholder="password" name="password">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Login</button>
            </form>            
        </nav>
        <p class="text-right">Not registered yet?<a href="register.php">Register</a></p>
        <!-- <video controls autoplay> <source src='videos/$video_path' type='video/mp4'> -->
        <div class="row">
            <div class="col-9">
                <div class="border" style="border:1px solid grey; padding:20px; margin:20px">
                    <h6 class="text-center">Latest Videos</h6>
                    <div class="row">
                        <div class="card-deck">
                            <?php  
                        $query = "SELECT * FROM videos ORDER BY upload_date DESC LIMIT 3";
                        $select_videos = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_videos)) {
                            $vid                = $row['vid'];
                            $title     = $row['title'];
                            $video_path     = $row['video_path'];
                            $upload_date     = $row['upload_date']; ?>

                            <div class='card'>
                                <video height=200 width=250 controls autoplay>
                                    <source src='videos/<?php echo $video_path ?>' type='video/mp4'>
                                    <h5 class=''><?php $title ?></h5>
                                    <p class=''><small class='text-muted'>Uploaded on:
                                            <?php echo $upload_date ?></small></p>

                            </div>;
                            <?php } ?>
                        </div>

                    </div>
                    <div class="text-right">
                        <a class="btn btn-primary">Explore</a>
                    </div>
                </div>
                <div class="border" style="border:1px solid grey; padding:20px; margin:20px">
                    <h6 class="text-center">Live Videos</h6>
                    <div class="row">
                        <div class="card-deck">
                            <?php  
                        $query = "SELECT * FROM live_videos ORDER BY uploaded_date DESC LIMIT 3";
                        $select_live_videos = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_live_videos)) {
                            $lvid                = $row['lvid'];
                            $video_title     = $row['video_title'];
                            $video_description     = $row['video_description'];
                            $video_url     = $row['video_url'];
                            $video_category     = $row['video_category']; 
                            $uploaded_date     = $row['uploaded_date'];       
                            $uploaded_time     = $row['uploaded_time']; 
                            echo "<div class='card'>
                            <iframe width='' height='' src='$video_url' autoplay>
                                </iframe>
                                <div class='card-body'>
                                    <h5 class='card-title'>$video_title</h5>
                                    <p class='card-text'><small class='text-muted'>Uploaded on: $uploaded_date</small></p>
                                </div>
                            </div>";
                            } ?>
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-primary">Explore</a>
                    </div>
                </div>

            </div>
            <div class="col-2">
                <h6 class="text-center">Headlines</h6>
                <?php  
                    $query = "SELECT * FROM news LIMIT 6";
                    $select_news = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_news)) {
                        $nid                = $row['nid'];
                        $news_title     = $row['news_title'];
                        $news_description     = $row['news_description'];
                        $news_category     = $row['news_category']; 
                        $news_thumbnail     = $row['news_thumbnail']; 
                        $uploaded_date     = $row['uploaded_date'];       
                        $uploaded_time     = $row['uploaded_time']; 
                echo "<a href='$nid'>
                    <div class='row'>
                        <div class='col-2'>
                            <img src='images/$news_thumbnail' height='40' width='40'>
                        </div>
                        <div class='col-1'></div>
                        <div class='col-8'>
                        <div class='row'>
                            <small>$news_title</small>
                            </div>
                            <div class='row'>
                            <small style='text-right'>$uploaded_date</small>
                            </div>
                        </div>
                    </div>
                    </a><hr>";
                }?>
                <a href="" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <footer>
            <div class="row">
                <div class="col-4 text-left">
                    <ul class="list-inline">
                        <li style="float: left;"><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                        <li style="float: left;"><a href=""><i class="fa-brands fa-square-twitter"></i></a></li>
                        <li style="float: left;"><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
                        <li style="float: left;"><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-4 text-center">&#169; 2022 Copyright: Fun Olympic</div>
                <div class="col-4 text-right">Desgined by: Sachin Khatri</div>
            </div>
        </footer>
    </div>
</body>

</html>