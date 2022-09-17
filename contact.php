<title>Contact</title>
<?php include "header.php" ?>
<?php
if(isset($_POST['btn-contact'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $error = [
        'fullname'=> '',
        'phone'=>'',
        'email'=> '',
        'message'=>'',
    ];
    
    if(empty($fullname)){
        $error['fullname'] = 'Fullname cannot be empty.';
    }
    if(empty($phone)){
        $error['phone'] = 'Phone number cannot be empty.';
    }
    if(empty($email)){
        $error['email'] = 'Email cannot be empty.';
    }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Invalid email format.';
      }
    if(empty($message)){
        $error['message'] = 'Message cannot be empty.';
    }
    foreach ($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        if(send_mail($email, $phone, $fullname, $message)){
            $mail_sent = "<p class='text-center text-success'>Your message has been sent.<br> THANK YOU</p>";
        }
	}
}

?>
<div class="row" style="margin-top:80px">
    <div class="col-md-1"></div>
    <div class="col-md-6" style="margin-top:20px">
        <h2 class="text-center" style="color:#ea540a">Contact</h2>
        <p class="text-center" style="color:#ea540a">If you have any question, please let us know</p>
        <hr>
        <?php echo isset($mail_sent)?$mail_sent:''?>
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" name="fullname" id="" class="form-control">
                        <small class="text-danger" style="font-size:12px">
                        <?php echo isset($error['fullname']) ? $error['fullname'] : '' ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="" class="form-control">
                        <small class="text-danger" style="font-size:12px">
                        <?php echo isset($error['phone']) ? $error['phone'] : '' ?></small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
                <small class="text-danger" style="font-size:12px">
                    <?php echo isset($error['email']) ? $error['email'] : '' ?></small>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="" cols="30" rows="3" class="form-control"></textarea>
                <small class="text-danger" style="font-size:12px">
                    <?php echo isset($error['message']) ? $error['message'] : '' ?></small>
            </div>
            <div class="form-group">
                <input type="submit" value="Send" name="btn-contact" class="btn btn-sm btn-contact">
            </div>
        </form>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <div class="row text-center" style="margin:50px 0">
            Address<br>
            Edinburgh Building, Chester Rd,<br>Sunderland SR1 3SD,<br>United Kingdom
        </div>
        <hr>
        <div class="row text-left" style="margin:50px 0">
            Contact: +441915153000<br>
            Email: info.funolympic@gmail.com
        </div>
    </div>
</div>

<?php include "footer.php" ?>