<title>Admin: View All Emails</title>
<?php include "admin_header.php" ?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Emails</h4>
    <?php
        if(recordCount('emails')==0){
            echo"<h5 class='text-danger'>No emails</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col-md-12'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th colspan='2'>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                            
                            deleteEmails(); 
                            $query = 'SELECT * FROM emails';
                            $select_emails = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_emails)) {
                                $eid      = $row['eid'];
                                $fullname = $row['fullname'];
                                $phone    = $row['phone'];
                                $email    = $row['email'];
                                $message  = $row['message'];
                                $status   = $row['status'];
                                $sent_date= $row['sent_date'];
                                
                                echo "<tr>                            
                            <td>$fullname</td>
                            <td>$phone</td>
                            <td>$email</td>
                            <td>$message</td>
                            <td>$status</td>
                            <td>$sent_date</td>";
                            if($status=='unread'){
                                echo "<td><a href='open_email.php?eid=$eid' class='btn btn-primary btn-sm'>read</a></td>";
                            }
                            echo"<td><a href='view_emails.php?delete=$eid&title=$fullname'  style='color:red;' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>";
                        }
                            echo "</tbody>
                        </table>
                    </div>
                </div>
            </div>";
             } ?>
</div>
<?php include "admin_footer.php" ?>