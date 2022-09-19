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
?>
<div class="row" style="margin:100px 0 10px 0">
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <p class="section-heading">Change Password</p>
    </div>
</div>
<div class="row justify-content-center">
    <?php echo isset($request_message)?$request_message:''?>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="">
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" id="old_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="old_password">New Password</label>
                <input type="password" name="old_password" id="old_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
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
                <p>Are you sure yoou want to reset password?
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
<?php include "footer.php" ?>