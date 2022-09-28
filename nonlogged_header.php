<?php include "functions.php" ?>
<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    if(!empty($remember)){
        setcookie('username', $_POST['username'], time()+86400);
        setcookie('password', $_POST['password'], time()+86400);
    }
    else if(empty($remember)){
        setcookie('username', '', time()-86400);
        setcookie('password', '', time()-86400);
    }
    if(!login_user($username, $password)){
        
        header('Location: login.php?error_login');
    }
    login_user($username, $password);
    $_SESSION['logged_in'] = "logged_in";
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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Rubik:wght@300;500&family=Secular+One&display=swap" rel="stylesheet">

<!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <a class="navbar-brand" href="<?php if(!isset($_GET['notlogged'])){echo 'home.php';} else{echo 'index.php';}?>"><img src="images/logo.png" height="50" width="50" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="news.php">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fixtures.php">FIXTURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li>
                    <form class="form-inline" method="post" style="padding:10px">
                        <input class="form-control form-control-sm" type="text" placeholder="email" name="username"
                            value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>" required>
                        <input class="form-control form-control-sm" id="password"  type="password" style="margin:0 6px;" placeholder="password" name="password"
                            value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" required onkeyup="showEye()">
                            <span id="show_pass" style="cursor: pointer; display:none;"
                        onclick="togglePassword()">
                        <i class="fa-regular fa-eye-slash" id="eye_password" style="margin-left:-30px"></i>
                    </span>
                            <input type="checkbox" name="remember"
                            <?php if(isset($_COOKIE['username'])){echo "checked";} ?>>
                        <small style='color:white; margin: 0 6px'>remember me</small>
                        <button class="btn btn-submit btn-sm my-2 my-sm-0" type="submit">Login</button>

                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
                
        </div>
    </nav>
    <div class="container-fluid">