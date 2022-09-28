<title>Admin: Activity Log</title>
<?php include "admin_header.php" ?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
<h4 class="text-center">Activity Log</h4>
        <?php
        if(recordCount('activity_log')==0){
            echo"<h5 class='text-danger'>No activity log</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col-md-12'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                            <tr>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Country</th>
                            <th>IP Address</th>
                        </tr>
                            </thead>";
                    $select_query = mysqli_query($connection, "SELECT * FROM activity_log");
                    while($row = mysqli_fetch_assoc($select_query)){
                        $date = $row['date'];
                        $activity = $row['activity'];
                        $country = $row['country'];
                        $ip_address = $row['ip_address'];
                    echo"<tr>
                        <td>$date</td>
                        <td>$activity</td>
                        <td>$country</td>
                        <td>$ip_address</td>
                    </tr>";
                    }
                        echo "</table>
                    </div>
                </div>
            </div>";
                } ?>
</div>
<?php include "admin_footer.php" ?>