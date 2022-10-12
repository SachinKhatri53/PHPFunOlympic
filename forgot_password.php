<?php
include "functions.php";
if(isset($_POST['btn-proceed'])){
    $email = $_POST['email'];
    $error = [
		'email'=> '',
	];
    if($email == ''){
		$error['email'] = 'Email cannot be empty.';
	}
    if(!empty($email) && !email_exists($email)){
		$error['email'] = 'Email not found.';
	}
    foreach ($error as $key => $value){
		if(empty($value)){
			unset($error[$key]);
		}
	}
	
	if(empty($error)){   
        if(request_password_reset($email)){
            $success_message="<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Your request has been submitted successfully. You'll be provided with password reset link througn your mail.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
        }
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/de23b03d2b.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Rubik:wght@300;500&family=Secular+One&display=swap"
        rel="stylesheet">
    <style>
    body {
        font-family: 'Josefin Sans', sans-serif;
    }

    .background {
        height: 85vh;
        background: url('images/forgot.png');
        background-repeat: no-repeat;
        transform: scaleX(-1);
    }

    .btn {
        background: #027541;
        color: white;
        border: 1px solid #027541;
    }

    .heading {
        padding: 50px 0;
        font-size: 3em;
        font-weight: bolder;
        color: #027541;
    }

    .btn:hover {
        background: white;
        color: #027541;
        border: 1px solid #027541;
    }
.fa-circle-chevron-left{
    color:#027541;
    font-size:2em;
    border:2px solid #027541;
    border-radius:50%;
}
.fa-circle-chevron-left:hover{
    color:white;
    background:#027541;
}
    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .background {
            display: none;
        }

        .jumbotron {
            background: white;
            border-radius: 10px;
            border: 2px solid lavender;
            margin-top: 30%;
        }

        body {
            padding: 0 50px;
            background: url('images/background.png')
        }

        .heading {
            font-size: 1.5rem;
        }

    }
    </style>
    <title>Forgot Password</title>
</head>

<body>
    <div class="container">
        <div class="row" style="padding:20px 0">
            <a href="login.php">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-md-6 background">

            </div>
            <div class="col-md-6 align-self-center jumbotron">
            <?php
            echo isset($success_message)?$success_message:'';
            ?>
                <h4 class="text-center heading">Reset Password</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" name="email" id="" class="form-control"
                            placeholder="Enter your email address" autocomplete=off>
                            <p class="text-danger" style="font-size:12px">
                                <?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                    </div>
                    <input type="submit" value="Proceed" class="btn" name='btn-proceed'>
                </form>

            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>