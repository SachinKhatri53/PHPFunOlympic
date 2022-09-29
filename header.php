<?php
include ("functions.php");
if(empty($_SESSION['logged_in']) || $_SESSION['logged_in'] == ''){
    redirect('index.php');
    die();
}
$username = $_SESSION['username'];
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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Rubik:wght@300;500&family=Secular+One&display=swap" rel="stylesheet">

<!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <a class="navbar-brand" href="<?php if(!isset($_GET['notlogged'])){echo 'home.php';} else{echo 'index.php';}?>"><img src="images/logo.png" height="50" width="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">HOME</a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link" href="video_archive.php">VIDEOS</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        SPORTS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        $select_query = "SELECT * FROM categories LIMIT 5";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                            $category_id = $row['cid'];
                            $category_title     = $row['category_title'];
                        echo "<a class='dropdown-item' href='video.php?id=$category_id&category=$category_title'>$category_title</a>";
                        }?>
                        <div class="dropdown-divider"></div>
                        <a class='dropdown-item' href='categories.php'>More Categories</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filtered_video.php?favorite">SAVED VIDEOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.php">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fixtures.php">FIXTURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger btn-sm" href="video.php?live">LIVE VIDEOS</a>
                </li>

            </ul>
            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link" href="profile.php">
                        <?php
                            $query = "SELECT * FROM users WHERE username = '$username'";
                            $select_user = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_user)) {
                                $profile_image = $row['profile_image'];
                            ?>
                        <img src="images/<?php echo $profile_image ?>" height="30" width="30" alt=""
                            style="border-radius:50%">
                        <?php echo $username?>
                        <?php } ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout" href="logout.php"><i
                            class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">