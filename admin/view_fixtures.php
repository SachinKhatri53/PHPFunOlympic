<?php include "admin_header.php" ?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <h4 style="text-align:center">Fixtures List</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Fixture</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Countries</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php     
                    $query = "SELECT * FROM fixtures";
                    $select_fixtures = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_fixtures)) {
                        $fid                = $row['fid'];
                        $fixture_title     = $row['fixture_title'];
                        $fixture_date     = $row['fixture_date'];
                        $fixture_time     = $row['fixture_time'];
                        $fixture_category     = $row['fixture_category'];
                        $fixture_countries     = $row['fixture_countries'];      
                        echo "<tr>";
                    echo "<td>$fixture_title</td>";
                    echo "<td>$fixture_date </td>";
                    echo "<td>$fixture_time</td>";
                    echo "<td>$fixture_category </td>";
                    echo "<td>$fixture_countries</td>";
                    echo "<td><a href='comments.php?delete=$fid' class='btn btn-warning'>View</a></td>";
                    echo "<td><a href='comments.php?delete=$fid' class='btn btn-info'>Edit</a></td>";
                    echo "<td><a href='comments.php?delete=$fid' class='btn btn-danger'>Delete</a></td>";
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