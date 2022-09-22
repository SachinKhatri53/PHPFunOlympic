<title>Change Password</title>
<?php include "header.php";
if(isset($_POST['btn-reset'])){
    if(recordCount('password_reset_request')==0){
        if(request_password_reset($_SESSION['email'])){
            $request_message="
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Your request has been submitted successfully. You'll receive your new password through email.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
        }
    }
    else{
        $request_message="
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                You have already requested for password reset. Kindly check your email.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    }
}
if(isset($_POST['change_password'])){
    $strong_regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
    $old_password = escape($_POST['old_password']);
    $new_password = escape($_POST['new_password']);
    $confirm_password = escape($_POST['confirm_password']);
    $error = [
        'old_password_error'=> '',
        'new_password_error'=> '',
        'confirm_password_error'=> '',        
    ];
    if(empty($old_password)){
       $error['old_password_error'] = 'Old password cannot be empty.';
    }
    if(empty($new_password)){
        $error['new_password_error'] = 'New password cannot be empty.';
    }
    if(empty($confirm_password)){
        $error['confirm_password_error'] = 'Confirm password cannot be empty.';
    }
    if(!empty($old_password && ($old_password == $new_password))){
        $error['new_password_error'] = 'New password cannot be same as old password.';
    }
    if($confirm_password != $new_password){
        $error['confirm_password_error'] = 'Passwords do not match.';
    }
    if(!empty($new_password) && !preg_match($strong_regex, $new_password)){
		$error['new_password_error'] = 'New password is not strong.';
	}
    if(!empty($old_password) && !check_old_password($_SESSION['username'], $old_password)){
        $error['old_password_error'] = 'Please enter correct old password.';
    }
    foreach ($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        
        if(change_password($_SESSION['username'], $new_password)){
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
                <label for="old_password">Old Password</label>
                <div class="input-group">
                    <input type="password" name="old_password" id="old_password" class="form-control"
                        onkeyup="showOldEye()">
                    <span class="input-group-text" id="show_old_password" style="cursor: pointer; display:none;"
                        onclick="toggleOldPassword()">
                        <i class="fa-regular fa-eye-slash" id="eye_old_password"></i>
                    </span>
                </div>
                <p class="text-danger" style="font-size:12px">
                    <?php echo isset($error['old_password_error']) ? $error['old_password_error'] : '' ?>
                </p>
            </div>
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
                    <span class="input-group-text" id="show_confirm_password" style="cursor: pointer; display:none;"
                        onclick="toggleNewPassword()">
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
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-9">
        <p>If you don't remember your old password click <a href="" data-toggle="modal"
                data-target="#passwordResetModal">here</a> to reset.</p>
    </div>
</div>
<div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordResetModalTitle">Thank You</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reset password?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <form action="" method='POST'>
                    <button type="submit" class="btn btn-primary" name='btn-reset'>Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/change_password.js"></script>
<?php include "footer.php" ?>