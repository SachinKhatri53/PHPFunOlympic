<?php include "admin_header.php"; ?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container" style="padding:40px 100px; background:whitesmoke">
<?php
if(isset($_GET['eid'])){
    $query_email = "SELECT * FROM emails WHERE eid = {$_GET['eid']}";
    $select_email = mysqli_query($connection, $query_email);
    while($row = mysqli_fetch_assoc($select_email)) {
        $eid      = $row['eid'];
        $fullname = $row['fullname'];
        $phone    = $row['phone'];
        $email    = $row['email'];
        $message  = $row['message'];
        $status   = $row['status'];
        $sent_date= $row['sent_date'];
    }
    echo "<h6>$fullname<br>$email</h8>
    <hr>
    <p class='text-center'>$message</p>
    <hr>
    <h6 class='text-right'>Contact: $phone</h6>
    <h6 class='text-right'>Sent date: $sent_date</h6>
    <h6 class='text-center'>
    <a href='view_emails.php' class='btn btn-danger btn-sm'>Delete</a>
    </h6>
    ";
}
?>
</div>
<?php include "admin_footer.php" ?>