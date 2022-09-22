<?php include "functions.php" ?>
<?php
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
    <link rel="stylesheet" href="css/style.css">
    <title>Homepage</title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
            <a class="navbar-brand" href="../admin/"><img src="../images/logo.png" height="50" width="50" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h4 class="text-center">Admin Panel: Fun Olympic</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Live Videos
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href=''
                                style="cursor:pointer"><i class="fa-solid fa-upload"></i>&nbsp;New Live Video</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="view_live_videos.php"><i
                                    class="fa-solid fa-circle-dot"></i>&nbsp;All Live Videos</a>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            News
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" data-toggle="modal" data-target="#newsModal"
                                style="cursor:pointer"><i class="fa-solid fa-square-plus"></i>&nbsp;Add News</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="view_news.php"><i class="fa-solid fa-newspaper"></i>&nbsp;All
                                News</a>
                        </div>
                        <?php include "add_news_modal.php"?>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Fixtures
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href='add_fixtures.php']
                                style="cursor:pointer"><i class="fa-solid fa-square-plus"></i>&nbsp;Add Fixture</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="view_fixtures.php"><i
                                    class="fa-solid fa-newspaper"></i>&nbsp;All Fixtures</a>
                        </div>
                    </div>
                </ul>
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a href="view_emails.php" class="nav-link text-danger" style="font-size:25px" data-toggle="tooltip" title="Emails"><i class="fa-solid fa-bell"></i>
                        <sup><small>
                            <?php
                        $query = "SELECT * FROM emails WHERE status='unread'";
                        $select_from_table = mysqli_query($connection, $query);
                        echo mysqli_num_rows($select_from_table);
                        ?>
                        </small></sup>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../home.php" class="nav-link">To The Site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                        <?php
                            $query = "SELECT * FROM users WHERE username = '$username'";
                            $select_user = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_user)) {
                                $profile_image = $row['profile_image'];
                            ?>
                            <img
                                src="../images/<?php echo $profile_image ?>"
                                height="30" width="30" alt="" style="border-radius:50%"
                                ><?php } ?>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <p class="<?php echo isset($news_upload_message_color) ? $news_upload_message_color : ''?>">
                <?php echo isset($news_upload_message) ? $news_upload_message : ''?></p>
        </div>
        <div class="row">