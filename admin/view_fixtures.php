<title>Admin: View All Fixtures</title>
<?php include "admin_header.php" ?>
<div class="col-md-3" id="sidebar">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-9" id="main-container">
    <h4 class="text-center">Fixtures</h4>
    <?php
        if(recordCount('fixtures')==0){
            echo"<h5 class='text-danger'>No fixtures</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Fixture</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Category</th>
                                    <th>Countries</th>
                                    <th colspan='3'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>";
                            deleteFixtures();
                            $query = "SELECT * FROM fixtures";
                            $select_fixtures = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_fixtures)) {
                                $fid                = $row['fid'];
                                $fixture_title     = $row['fixture_title'];
                                $fixture_date     = $row['fixture_date'];
                                $fixture_time     = $row['fixture_time'];
                                $fixture_category     = $row['fixture_category'];
                                $fixture_countries     = $row['fixture_countries'];      
                                echo "<tr>
                                        <td>$fixture_title</td>
                                        <td>$fixture_date </td>
                                        <td>$fixture_time</td>
                                        <td>$fixture_category </td>
                                        <td>$fixture_countries</td>
                                        <td><a href='edit_fixtures.php?edit=$fid&title=$fixture_title' style='color:blue' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                        <td><a href='view_fixtures.php?delete=$fid&title=$fixture_title'  style='color:Red' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a></td>
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