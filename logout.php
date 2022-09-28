<?php
include "functions.php";
record_activity("<strong>".$_SESSION['username']."</strong> logged out.", $_SESSION['ip_address'], $_SESSION['country_name']);
session_start();
session_destroy();
header("Location:index.php");
?>