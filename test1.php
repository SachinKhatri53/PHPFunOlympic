<?php $url = 'test1.php' ?>

<?php 
include "functions.php";
// connectionect to database

// lets assume a user is logged in with id $user_id
$uid = $_SESSION['uid'];

$username = $_SESSION['username'];

// if user clicks like or dislike button
if (isset($_POST['action'])) {
  $vid = $_POST['vid'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO rating_info (uid, vid, action) 
         	   VALUES ($uid, $vid, 'like') 
         	   ON DUPLICATE KEY UPDATE action='like'";
         break;
  	case 'dislike':
          $sql="INSERT INTO rating_info (uid, vid, action) 
               VALUES ($uid, $vid, 'dislike') 
         	   ON DUPLICATE KEY UPDATE action='dislike'";
         break;
  	case 'unlike':
	      $sql="DELETE FROM rating_info WHERE uid=$uid AND vid=$vid";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM rating_info WHERE uid=$uid AND vid=$vid";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($connection, $sql);
  echo getRating($vid);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $connection;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE vid = $id AND action = 'like'";
  $rs = mysqli_query($connection, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $connection;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE vid = $id AND action='dislike'";
  $rs = mysqli_query($connection, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $connection;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE vid = $id AND action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM rating_info 
		  			WHERE vid = $id AND action='dislike'";
  $likes_rs = mysqli_query($connection, $likes_query);
  $dislikes_rs = mysqli_query($connection, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($vid)
{
  global $connection;
  global $uid;
  $sql = "SELECT * FROM rating_info WHERE uid=$uid 
  		  AND vid=$vid AND action='like'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($vid)
{
  global $connection;
  global $uid;
  $sql = "SELECT * FROM rating_info WHERE uid=$uid 
  		  AND vid=$vid AND action='dislike'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

$sql = "SELECT * FROM videos WHERE vid={$_GET['vid']}";
$result = mysqli_query($connection, $sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Play Video - <?php echo $_GET['title'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/play_video.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/de23b03d2b.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <a class="navbar-brand"
            href="<?php if(!isset($_GET['notlogged'])){echo 'home.php';} else{echo 'index.php';}?>"><img
                src="images/logo.png" height="50" width="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link"
                        href="<?php if(!isset($_GET['notlogged'])){echo 'home.php';} else{echo 'index.php';}?>">HOME</a>
                </li>
                <?php if(!isset($_GET['notlogged'])){ ?>
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
                <?php } ?>
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

            </ul>
            <?php if(!isset($_GET['notlogged'])){ ?>
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
            <?php } ?>
        </div>
    </nav>
    <div class="container-fluid">
        <!-- Search -->
        <div class="row" style="margin:90px 0 10px 0">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="search" name="" id="" class="form-control" placeholder="Search">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
               
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            $vid= $row['vid'];
                        ?>
                    <video width="100%" height="480px" controls autoplay>
                        <source src="videos/<?php echo $row['video_path']?>" type="video/mp4">
                    </video>
                    <h5 style="padding-top:10px" class="text-center"><?php echo $row['title'];  ?></h5>
        <hr>
        <div class="row">
                    <!-- if user likes post, style button differently -->
                    <i <?php if (userLiked($row['vid'])): ?> class="fa fa-thumbs-up like-btn" <?php else: ?>
                        class="fa fa-thumbs-o-up like-btn" <?php endif ?> data-id="<?php echo $row['vid'] ?>"></i>
                    <span class="likes"><?php echo getLikes($row['vid']); ?></span>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <!-- if user dislikes post, style button differently -->
                    <i <?php if (userDisliked($row['vid'])): ?> class="fa fa-thumbs-down dislike-btn" <?php else: ?>
                        class="fa fa-thumbs-o-down dislike-btn" <?php endif ?> data-id="<?php echo $row['vid'] ?>"></i>
                    <span class="dislikes"><?php echo getDislikes($row['vid']); ?></span>
                    </div>
                    <?php } ?>
               
                <hr>
            <!-- comments -->
            <?php
                    if(commentsCount('comments', $vid) < 2){
                        echo "<h6>" . commentsCount('comments', $vid) . " comment</h6>";
                    }
                    else{
                        echo "<h6>" . commentsCount('comments', $vid) . " comments</h6>";
                    }
                    ?>

                <div class="row" style="padding:0 50px">

                    <form method="post" role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter you comment"
                                aria-describedby="button-comment-addon" name='content'>
                            <input class="btn btn-outline-secondary" type="submit" id="btn-comment-addon" name="comment"
                                value="Comment">
                        </div>
                    </form>
                </div>

                    <?php
                    $query = "SELECT * FROM comments WHERE vid = $vid";
                    $select_comments = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_comments)) {
                        $content = $row['comment'];
                        $uid= $row['uid'];
                        $date = $row['date'];
                        ?>

                    <?php
                    $query = "SELECT * FROM users WHERE uid = $uid";
                    $select_user = mysqli_query($connection, $query);  
            
                    while($row = mysqli_fetch_assoc($select_user)) {
                        $username = $row['username'];
                        $profile_image = $row['profile_image'];
                        echo"<div class='row button'>
                        <img src='images/$profile_image' alt='' height=50 width=50 style='border-radius:16px;'>                    
                        $content</div><br>";
                        } }?>
               


            </div>
            <div class="col-md-3">
                <p class="section-heading">Related Videos</p>
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
                    <div class="row" style='margin-bottom:10px'>
                        <div class="card">
                            <video width="100%" controls>
                                <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                            </video>
                            <div class="card-footer">
                                <a
                                    href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>&type=highlight">
                                    <h5 class="card-title"
                                        style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                                  -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                                        <?php echo $title ?></h5>
                                </a>
                                <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>







        <script>
        $(document).ready(function() {
            // if the user clicks on the like button ...
            $('.like-btn').on('click', function() {
                var vid = $(this).data('id');
                $clicked_btn = $(this);
                if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
                    action = 'like';
                } else if ($clicked_btn.hasClass('fa-thumbs-up')) {
                    action = 'unlike';
                }
                $.ajax({
                    url: '<?php echo $url ?>',
                    type: 'post',
                    data: {
                        'action': action,
                        'vid': vid
                    },
                    success: function(data) {
                        res = JSON.parse(data);
                        if (action == "like") {
                            $clicked_btn.removeClass('fa-thumbs-o-up');
                            $clicked_btn.addClass('fa-thumbs-up');
                        } else if (action == "unlike") {
                            $clicked_btn.removeClass('fa-thumbs-up');
                            $clicked_btn.addClass('fa-thumbs-o-up');
                        }
                        // display the number of likes and dislikes
                        $clicked_btn.siblings('span.likes').text(res.likes);
                        $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                        // change button styling of the other button if user is reacting the second time to post
                        $clicked_btn.siblings('i.fa-thumbs-down').removeClass(
                            'fa-thumbs-down').addClass('fa-thumbs-o-down');
                    }
                });
            });

            // if the user clicks on the dislike button ...
            $('.dislike-btn').on('click', function() {
                var vid = $(this).data('id');
                $clicked_btn = $(this);
                if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
                    action = 'dislike';
                } else if ($clicked_btn.hasClass('fa-thumbs-down')) {
                    action = 'undislike';
                }
                $.ajax({
                    url: '<?php echo $url ?>',
                    type: 'post',
                    data: {
                        'action': action,
                        'vid': vid
                    },
                    success: function(data) {
                        res = JSON.parse(data);
                        if (action == "dislike") {
                            $clicked_btn.removeClass('fa-thumbs-o-down');
                            $clicked_btn.addClass('fa-thumbs-down');
                        } else if (action == "undislike") {
                            $clicked_btn.removeClass('fa-thumbs-down');
                            $clicked_btn.addClass('fa-thumbs-o-down');
                        }
                        // display the number of likes and dislikes
                        $clicked_btn.siblings('span.likes').text(res.likes);
                        $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                        // change button styling of the other button if user is reacting the second time to post
                        $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up')
                            .addClass('fa-thumbs-o-up');
                    }
                });
            });
        });
        </script>
        <?php include "footer.php" ?>