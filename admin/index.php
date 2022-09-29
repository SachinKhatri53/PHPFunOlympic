<title>Dashboard: Fun Olympic Game</title>
<?php include "admin_header.php" ?>
<div class="col-md-3" id="sidebar" style="">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" style="margin-top: 60px;
     position: absolute; left:25%; padding: 20px;">
    <div class="row" style="padding:20px">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa-solid fa-tower-broadcast fa-3x" style="color:#dc3545"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class='huge'><?php echo $count_posts = recordCount('live_videos') ?></div>
                            <div>Live Videos</div>
                        </div>
                    </div>
                </div>
                <a href="view_live_videos.php">
                    <div class="panel-footer">
                        <span class="pull-left" style="color:green">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color:green"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa-solid fa-video fa-3x" style="color:green"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class='huge'><?php echo $count_comments = recordCount('videos') ?></div>
                            <div>Uploaded Videos</div>
                        </div>
                    </div>
                </div>
                <a href="view_videos.php">
                    <div class="panel-footer">
                        <span class="pull-left" style="color:green">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color:green"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-3x" style="color:blue"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class='huge'><?php echo $count_users = recordCount('users') ?></div>
                            <div> Users</div>
                        </div>
                    </div>
                </div>
                <a href="view_users.php">
                    <div class="panel-footer">
                        <span class="pull-left" style="color:green">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color:green"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list fa-3x" style="color:grey"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class='huge'><?php echo $count_categories = recordCount('categories') ?></div>
                            <div>Sports</div>
                        </div>
                    </div>
                </div>
                <a href="view_categories.php">
                    <div class="panel-footer">
                        <span class="pull-left" style="color:green">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color:green"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row" style="padding:20px; margin-top:10px">
        <h4 style="bottom-border:1px solid red">Activity Log</h4>
        <div class='table-responsive'>
            <table class='table table-bordered table-sm'>
                
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Country</th>
                        <th>IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                    ?>
                </tbody>
            </table>
        </div>
        <a href="activity_log.php">View All Activities <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<?php include "admin_footer.php" ?>