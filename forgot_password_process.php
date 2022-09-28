<?php include "nonlogged_header.php";
if(isset($_POST['change_password'])){
    $strong_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
    $new_password = escape($_POST['new_password']);
    $confirm_password = escape($_POST['confirm_password']);
    $error = [
        'new_password_error'=> '',
        'confirm_password_error'=> '',        
    ];
    if(empty($new_password)){
        $error['new_password_error'] = 'New password cannot be empty.';
    }
    if(empty($confirm_password)){
        $error['confirm_password_error'] = 'Confirm password cannot be empty.';
    }
    if($confirm_password != $new_password){
        $error['confirm_password_error'] = 'Passwords do not match.';
    }
    if(!empty($new_password) && !preg_match($strong_regex, $new_password)){
		$error['new_password_error'] = 'New password is not strong.';
	}
    foreach ($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        
        if(change_password($_GET['email'], $new_password)){
            $upload_message = "Password has been changed successfully.";
            $message_color ="text-success";
        }
        else{
            $upload_message = "Password could not be changed.";
            $message_color ="text-danger";
        }
    }
}
?>
<div class="row">
    <div class="container">
        <div class="row" style="margin:100px 0 10px 0">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <p class="section-heading">Change Password</p>
            </div>
        </div>
        <div class="row justify-content-center">
    <p class="<?php echo isset($message_color) ? $message_color : ''?>">
        <?php echo isset($upload_message) ? $upload_message : ''?></p>
    <?php echo isset($request_message)?$request_message:''?>
</div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="old_password">New Password</label>
                        <div class="input-group">
                            <input type="password" name="new_password" id="new_password" class="form-control"
                                onkeyup="showNewEye()">
                            <span class="input-group-text" id="show_new_password" style="cursor: pointer; display:none;"
                                onclick="toggleNewPassword()">
                                <i class="fa-regular fa-eye-slash" id="eye_new_password"></i>
                            </span>
                        </div>
                        <p class="text-danger" style="font-size:12px">
                            <?php echo isset($error['new_password_error']) ? $error['new_password_error'] : '' ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group">

                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                onkeyup="showConfirmEye()">
                            <span class="input-group-text" id="show_confirm_password"
                                style="cursor: pointer; display:none;" onclick="toggleNewPassword()">
                                <i class="fa-regular fa-eye-slash" id="eye_confirm_password"></i>
                            </span>
                        </div>
                        <p class="text-danger" style="font-size:12px">
                            <?php echo isset($error['confirm_password_error']) ? $error['confirm_password_error'] : '' ?>
                        </p>
                    </div>
                    <input type="submit" class="btn btn-success btn-sm" value="Change Password" name='change_password'>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/change_password.js"></script>
<?php include "footer.php" ?>