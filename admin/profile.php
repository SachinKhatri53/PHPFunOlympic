<title>Profile: Fun Olympic Game</title>
<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <div class="row" style="padding:20px 0">
        <?php
        $query = "SELECT * FROM users WHERE username='sachin'";
        $select_user = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_user)) {
            $username    = $row['username'];
            $fullname    = $row['fullname'];
            $email     = $row['email']; 
            $phone     = $row['phone']; 
            $nationality     = $row['nationality'];
            $profile_image = $row['profile_image'];
        ?>
        <div class="col-md-6">
            <div class="profile-img" style="">
                <img src="../images/<?php echo $profile_image ?>" alt="" width=300
                    style="border-radius:10%; border:2px grey solid; padding:2px">
            </div>
        </div>
        <div class="col-md-6">

            <h4><?php echo $fullname ?></h4>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">Username</div>
                    <div class="row">Email</div>
                    <div class="row">Phone Number</div>
                    <div class="row">Nationality</div>
                </div>
                <div class="col-md-6">
                    <div class="row"><?php echo $username ?></div>
                    <div class="row"><?php echo $email ?></div>
                    <div class="row"><?php echo $phone ?></div>
                    <div class="row"><?php echo $nationality ?></div>
                </div>
            </div>
            <?php } ?>

            <hr>
            <a href="">Change Password</a>
            <hr>
        </div>
    </div>
</div>

<?php include "admin_footer.php" ?>