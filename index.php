<?php include "functions.php" ?>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    if(!empty($remember)){
        setcookie('username', $_POST['username'], time()+86400);
        setcookie('password', $_POST['password'], time()+86400);
    }
    else if(empty($remember)){
        setcookie('username', '', time()-86400);
        setcookie('password', '', time()-86400);
    }
    login_user($username, $password);
}
include "login_modal.php";
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Rubik:wght@300;500&family=Secular+One&display=swap"
        rel="stylesheet">
    <title>Homepage: Fun Olympic Games</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="50" width="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">VIDEOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.php?notlogged">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php?notlogged">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fixtures.php?notlogged">FIXTURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php?notlogged">CONTACT</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form class="form-inline" method="post" style="padding:10px">
                        <input class="form-control form-control-sm" type="text" placeholder="email" name="username"
                            value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>">
                        <input class="form-control form-control-sm" style="margin:0 6px" type="password" placeholder="password" name="password"
                            value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>">
                        <input type="checkbox" name="remember"
                            <?php if(isset($_COOKIE['username'])){echo "checked";} ?>>
                        <small style='color:white; margin: 0 6px'>remember me</small>
                        <button class="btn btn-submit btn-sm my-2 my-sm-0" type="submit">Login</button>

                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row" style="margin-top:80px">
            <div class="col-md-12">
                <h6 class="text-right">Not registered yet?<a href="register.php">Register</a></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <!-------------------------------------------------- Live Videos -------------------------------------------------->
                <div class="row">
                    <div class="col-md-6">
                        <p class="section-heading">Live Videos</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-right" style="padding-top: 20px;"><a href="" data-toggle="modal" data-target="#loginModal">view all <i class="fa-solid fa-arrow-right"></i></a></p>
                    </div>
                </div>
                <div class="row live-videos">
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
                                <a href="" data-toggle="modal" data-target="#loginModal">
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
                <!-------------------------------------------------- Videos -------------------------------------------------->
                <div class="row">
                    <div class="col-md-6">
                        <p class="section-heading">Uploaded Videos</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-right" style="padding-top: 20px"><a href="" data-toggle="modal" data-target="#loginModal">view all <i class="fa-solid fa-arrow-right"></i></a></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:20px">
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
                            <video width="100%" controls>
                                <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                            </video>
                            <div class="card-body">
                                <a href="" data-toggle="modal" data-target="#loginModal">
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

            </div>
            <!-------------------------------------------------- Headlines -------------------------------------------------->
            <div class="col-md-3">
            <p class="section-heading">Headlines</p>
                <?php  
                    $query = "SELECT * FROM news LIMIT 5";
                    $select_news = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_news)) {
                        $nid                = $row['nid'];
                        $news_title     = $row['news_title'];
                        $news_description     = $row['news_description'];
                        $news_category     = $row['news_category']; 
                        $news_thumbnail     = $row['news_thumbnail']; 
                        $uploaded_date     = $row['uploaded_date'];       
                        $uploaded_time     = $row['uploaded_time']; 
                echo "<div class='row'>
                        <div class='col-2'>
                            <img src='images/$news_thumbnail' height='40' width='40'>
                        </div>
                        <div class='col-1'></div>
                        <div class='col-8'>
                        <div class='row'>
                        <a href='read_news.php?nid=$nid&title=$news_title'>
                            <h6 style='color:#357960'>$news_title</h6>
                            </a>
                            </div>
                            <div class='row'>
                            <small>$uploaded_date</small>
                            </div>
                        </div>
                    </div>
                    <hr>";
                }?>
                <a href="news.php?notlogged" class="btn btn-primary btn-sm btn-block">Read More</a>
            </div>
        </div>
        <div class="row footer">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>