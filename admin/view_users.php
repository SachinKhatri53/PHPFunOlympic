<title>Admin: View All Users</title>
<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <h4>Users</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php     
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
                    echo "<td><a href='comments.php?delete=$uid' class='btn btn-success btn-sm'>Active</a></td>";
                    echo "<td><a href='comments.php?delete=$uid' class='btn btn-warning btn-sm'>Inactive</a></td>";
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