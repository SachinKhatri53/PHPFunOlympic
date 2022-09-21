<title>Admin: View All Password Reset Requests</title>
<?php include "admin_header.php";
if(isset($_POST['btn-reset'])){
        if(request_password_reset($email)){
            $request_message="
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <h4 class='alert-heading'Reset successful</h4>
               Email has been sent to $email.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
        }
}
?>
<style>
    /* .modal-backdrop {
  z-index: -1;
} */
</style>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Password Reset Requests</h4>
    <div class="row justify-content-center">
        <?php echo isset($request_message)?$request_message:''?>
    </div>
    <?php
        if(recordCount('password_reset_request')==0){
            echo"<h5 class='text-danger'>No request for password reset.</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col-md-12'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Requested Date</th>
                                    <th colspan='2'>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                            
                            // deleteEmails(); 
                            $query = "SELECT * FROM password_reset_request";
                            $select_emails = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_emails)) {
                                $prrid      = $row['prrid'];
                                $email    = $row['email'];
                                $requested_date= $row['requested_date'];
                            }
                                
                                echo "<tr>
                            <td>$email</td>
                            <td>$requested_date</td>
                            <td><p data-toggle='modal'
                            data-target='#passwordResetModal' class='btn btn-danger btn-sm'>Reset</p></td>
                            </tr</tbody>
                        </table>"?>
    <div class="modal fade" id="passwordResetModal" tabindex="100" role="dialog"
        aria-labelledby="passwordResetModalTitle" aria-hidden="true">
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
</div>
</div>
</div>
<?php }?>
</div>
<?php include "admin_footer.php" ?>