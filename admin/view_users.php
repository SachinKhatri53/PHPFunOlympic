<title>Admin: View All Users</title>
<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8" id="main-container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <h4>Users</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    changeStatusToInactive();
                    changeStatusToAactive();
                    $query = "SELECT * FROM users WHERE is_admin=0";
                    $select_users = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_users)) {
                        $uid                = $row['uid'];
                        $fullname     = $row['fullname'];
                        $email     = $row['email'];
                        $username     = $row['username']; 
                        $profile_image     = $row['profile_image'];       
                        $status     = $row['status']; 
                        echo "<tr>";
                    echo "<td>$fullname</td>";
                    echo "<td>$email</td>";
                    echo "<td>$username</td>";
                    echo "<td>$status</td>";
                    if($status=='active'){
                        echo "<td><a href='view_users.php?inactive=$uid' class='btn btn-warning btn-sm'>Inactive</a></td>";
                    }
                    else{
                        echo "<td><a href='view_users.php?active=$uid' class='btn btn-success btn-sm'>Active</a></td>";
                    }
                    
                    echo "<td><a href='comments.php?delete=$uid' class='btn btn-danger btn-sm'>Reset Password</a></td>";
                    echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>