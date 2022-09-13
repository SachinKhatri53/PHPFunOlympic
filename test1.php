<?php $url = 'test1.php' ?>
<?php 
include "header.php";
// connectionect to database

// lets assume a user is logged in with id $user_id
$uid = 2;


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

$sql = "SELECT * FROM videos WHERE vid=24";
$result = mysqli_query($connection, $sql);
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>






  <style>
    .posts-wrapper {
  width: 50%;
  margin: 20px auto;
  border: 1px solid #eee;
}
.post {
  width: 90%;
  margin: 20px auto;
  padding: 10px 5px 0px 5px;
  border: 1px solid green;
}
.post-info {
  margin: 10px auto 0px;
  padding: 5px;
}
.fa {
  font-size: 1.2em;
}
.fa-thumbs-down, .fa-thumbs-o-down {
  transform:rotateY(180deg);
}
.logged_in_user {
  padding: 10px 30px 0px;
}
i {
  color: blue;
}
  </style>
<!-- </head>
<body> -->
  <div class="posts-wrapper">
   <?php
  //  foreach ($posts as $post):
    while($row = mysqli_fetch_assoc($result)) {
    ?>
   	<div class="post">
     <video width="100%" height="480px" controls autoplay>
            <source src="videos/<?php echo $row['video_path']?>" type="video/mp4">
        </video>
      <?php echo $row['title']; ?>
      <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($row['vid'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $row['vid'] ?>"></i>
      	<span class="likes"><?php echo getLikes($row['vid']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($row['vid'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $row['vid'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($row['vid']); ?></span>
      </div>
   	</div>
   <?php
    }
  //  endforeach
   ?>
  </div>
  <script>
    $(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var vid = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
  	action = 'like';
  } else if($clicked_btn.hasClass('fa-thumbs-up')){
  	action = 'unlike';
  }
  $.ajax({
  	url: '<?php echo $url ?>',
  	type: 'post',
  	data: {
  		'action': action,
  		'vid': vid
  	},
  	success: function(data){
  		res = JSON.parse(data);
  		if (action == "like") {
  			$clicked_btn.removeClass('fa-thumbs-o-up');
  			$clicked_btn.addClass('fa-thumbs-up');
  		} else if(action == "unlike") {
  			$clicked_btn.removeClass('fa-thumbs-up');
  			$clicked_btn.addClass('fa-thumbs-o-up');
  		}
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.likes').text(res.likes);
  		$clicked_btn.siblings('span.dislikes').text(res.dislikes);

  		// change button styling of the other button if user is reacting the second time to post
  		$clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
  	}
  });		

});

// if the user clicks on the dislike button ...
$('.dislike-btn').on('click', function(){
  var vid = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
  	action = 'dislike';
  } else if($clicked_btn.hasClass('fa-thumbs-down')){
  	action = 'undislike';
  }
  $.ajax({
  	url: '<?php echo $url ?>',
  	type: 'post',
  	data: {
  		'action': action,
  		'vid': vid
  	},
  	success: function(data){
  		res = JSON.parse(data);
  		if (action == "dislike") {
  			$clicked_btn.removeClass('fa-thumbs-o-down');
  			$clicked_btn.addClass('fa-thumbs-down');
  		} else if(action == "undislike") {
  			$clicked_btn.removeClass('fa-thumbs-down');
  			$clicked_btn.addClass('fa-thumbs-o-down');
  		}
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.likes').text(res.likes);
  		$clicked_btn.siblings('span.dislikes').text(res.dislikes);
  		
  		// change button styling of the other button if user is reacting the second time to post
  		$clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
  	}
  });	

});

});
  </script>
</body>
</html>

<?php
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
         $url = "https://";
    else{
      $url = "http://";
    }
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST']; 
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
  $url ='play_video.php?vid=25&title=Impossible%20Sports%20Moments&type=highlight';
  ?>