<?php
include "header.php"; ?>
<?php
$username = $_SESSION['username'];
if(isset($_POST['upload_image_btn'])){
    $image_path = escape($_FILES['change_photo']['name']);
    $image_path_temp   = escape($_FILES['change_photo']['tmp_name']);
    $upload_file_name = time().$image_path;
    $query = "UPDATE users SET ";
            $query .= "profile_image = '{$upload_file_name}' ";
            $query .= " WHERE username = '$username'";
            $edit_photo = mysqli_query($connection, $query);
            if($edit_photo){
                if($profile_image != 'profile.png'){
                    unlink("images/".$profile_image);
                }
                copy($image_path_temp, "images/".time().$image_path); 
                record_activity('<strong>'.$username.'</strong> updated profile picture', $_SESSION['ip_address'], $_SESSION['country_name']);
                $success_message="<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Your profile picture has been uploaded successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";  
            }
}
if(isset($_POST['btn-deactivate'])){
    mysqli_query($connection, "UPDATE users SET status = 'inactive' WHERE username = '$username'");
    header('Location: login.php?deactivate');
}
?>
<style>
label {

    cursor: pointer;
    /* Style as you please, it will become the visible UI component. */
}

.img {
    margin-top: -30px;
    ;
}

.img .fa-camera {
    font-size: 20px;
    border: 1px solid grey;
    padding: 10px;
    border-radius: 10px;
    background: white;
}

#upload-photo {
    opacity: 0;
    position: absolute;
    z-index: -1;
}
</style>
<div class="row" style="margin:80px 0">
    <div class="container">
        <?php
                        $query = "SELECT * FROM users WHERE username='$username'";
                        $select_user = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_user)) {
                            $username    = $row['username'];
                            $fullname    = $row['fullname'];
                            $email     = $row['email']; 
                            $phone     = $row['phone']; 
                            $nationality     = $row['nationality'];
                            $profile_image     = $row['profile_image'];
                        ?>
        <div class="row" style="padding:20px 0">
            <div class="col-md-4">
                <?php
            echo isset($success_message)?$success_message:'';
            ?>
                <div class="profile-img" style="">
                    <img src="images/<?php echo $profile_image ?>" alt="" width=300
                        style="border-radius:10%; border:2px grey solid; padding:2px">
                    <div class="img">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="upload-photo"><i class="fa-solid fa-camera"></i></label>
                            <input type="file" name="change_photo" id="upload-photo" onclick="showImageUploadBtn()" />
                            <input type='submit' value='Upload' name ="upload_image_btn" id='upload-image-btn' style='display:none'>
                        </form>
                    </div>



                </div>
            </div>

            <div class="col-md-8">
                <div class="row">

                    <h4><?php echo $fullname ?></h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <div class="row">Username</div>
                        <div class="row">Email</div>
                        <div class="row">Phone Number</div>
                        <div class="row">Nationality</div>
                    </div>
                    <div class="col-8">

                        <div class="row"><?php echo $username ?></div>
                        <div class="row"><?php echo $email ?></div>
                        <div class="row"><?php echo $phone ?></div>
                        <div class="row"><?php echo $nationality ?></div>
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <a href="change_password.php">Change Password</a>
                <hr>
                <br>
                <button data-toggle="modal" data-target="#deactivateModal" class="btn btn-danger btn-sm">Deactivate</button>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="deactivateModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deactivateModalTitle">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to deactivate your account?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                <form action="" method='POST'>
                    <button type="submit" class="btn btn-primary btn-sm" name='btn-deactivate'>Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    function showImageUploadBtn(){
        // upload-image-btn
        // upload-photo
        document.getElementById('upload-image-btn').style.display = "block";
}
</script>
<?php include "footer.php" ?>