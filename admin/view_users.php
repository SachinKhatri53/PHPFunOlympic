<title>Admin: View All Users</title>
<?php include "admin_header.php";

if(isset($_GET['status'])){
    $status = $_GET['status'];
}
?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8" id="main-container">
<h4 class="text-center">Users</h4>
                    <hr>
<div class="row">
       <div class="col-3">
        <form action="" method="get" id="status_filter">
            <div class="form-group">
                <select name="status" id="status" class="form-control" onchange="changeStatus()">
                <option value="">Select</option>
                <option value="active" <?php if($status=='active'){echo 'selected';} ?>>Active</option>
                <option value="inactive" <?php if($status=='inactive'){echo 'selected';} ?>>Inactive</option>
                </select>
            </div>
            </form>
        </div>
    </div>

 
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    
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
                    if(empty($status)){
                        $query = "SELECT * FROM users WHERE is_admin=0";  
                    }
                    else{
                        $query = "SELECT * FROM users WHERE is_admin=0 AND status  = '$status'";
                    }
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
<script>
        function changeStatus(){
            document.getElementById('status_filter').submit();
        }
    </script>
<?php include "admin_footer.php" ?>