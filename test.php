<?php include "functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gallery</title>
   <style>
    .gallery-container {
    margin-top: 80px;
	display: flex;
	max-width: 100%;
	/* margin: 0 auto; */
	text-align: center;
    justify-content: center;

  
}
 
.small {
	width: 280px;
	height: auto;
	position: relative;
	/* margin: 3px; */
	border-radius: 5px;
}
 
.small:hover {
	-webkit-transform: scale(1.03, 1.03);
	transform: scale(1.03, 1.03);
}
.gallery-grid{
  
  display: grid;
  grid-template-columns: repeat(4,minmax(300px, 1fr));
  grid-gap: 5px;
  width: 80%;
}
.lightbox {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 1;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.7);
}
a div {
	position: relative;
	margin: auto auto;
	text-align: center;
}
 
.lightbox:target {
	display: -webkit-box;
	display: flex;
}
 
.gallery-container a {
	text-decoration: none;
}
 
.gallery-container p {
	font-size: 20px;
	color: white;
	font-family: 'Poiret One';
}
   </style>

</head>

<body>
   <div class="gallery-container">
      <div class="gallery-grid">
         <?php
         $query = "SELECT * FROM photos";
         $select_query = mysqli_query($connection, $query);
         while($row=mysqli_fetch_assoc($select_query)){
            $caption = $row['caption'];
            $image_path = $row['image_path'];
         
         ?>
         <a href="#img1">
            <img class="small" src="images/<?php echo $image_path ?>">
         </a>
         <?php } ?>
      </div>
      <!-- Thumbnails -->


      <!--Lightboxes-->
      <?php
         $query = "SELECT * FROM photos";
         $select_query = mysqli_query($connection, $query);
         while($row=mysqli_fetch_assoc($select_query)){
            $id=1;
            $caption = $row['caption'];
            $image_path = $row['image_path'];
         
         ?>
      <a href="#_" class="lightbox" id="img<?php echo $id ?>">
         <div>
            <img src="images/<?php echo $image_path ?>" />
            <p> <?php echo $caption?> </p>
         </div>
      </a>
      <?php $id=+1;} ?>
      <a href="#_" class="lightbox" id="img2">
         <div>
            <img src="images/profile.png" />
            <p> The Racing</p>
         </div>
      </a>
      <a href="#_" class="lightbox" id="img3">
         <div>
            <img src="images/profile.png" />
            <p> The Light </p>
         </div>
      </a>
      <a href="#_" class="lightbox" id="img4">
         <div>
            <img src="images/profile.png" />
            <p> Cute Bird</p>
         </div>
      </a>
      <a href="#_" class="lightbox" id="img5">
         <div>
            <img src="images/profile.png" />
            <p> The Car</p>
         </div>
      </a>
      <a href="#_" class="lightbox" id="img6">
         <div>
            <img src="images/profile.png" />
            <p> The Fox</p>
         </div>
      </a>
      <a href="#_" class="lightbox" id="img7">
         <div>
            <img src="images/profile.png" />
            <p> The War</p>
         </div>
      </a>
      <a href="#_" class="lightbox" id="img8">
         <div>
            <img src="images/profile.png" />
            <p> The House</p>
         </div>
      </a>
      <a href="#_" class="lightbox" id="img9">
         <div>
            <img src="images/profile.png" />
            <p> The Game</p>
         </div>
      </a>
   </div>

</body>

</html>