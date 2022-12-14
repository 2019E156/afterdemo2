<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>admin timetable</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Go to Admin-homepage 
                            <a href="home.php" class="btn btn-danger float-end">Back to Admin-Homepage</a>
                        </h4>
                    </div>
                    <!--<div class="card-header">
                        <h4>Create a new timetable for a class
                            <a href="timetable-create.php" class="btn btn-primary float-end">Add a new class</a>
                        </h4>
                        </div>-->
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Subject NAME</th>
                                    <th>Subject ID</th>
                                    <th>Teacher NAME</th>
                                    <th>TEACHER ID</th>
                                    <th>DAY</th>
                                    <th>TIME</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT subject.*,teacher.* 
                                    FROM subject,teacher
                                    WHERE subject.tId=teacher.tId";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $timetable)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $timetable['sbName']; ?></td>
                                                <td><?= $timetable['sbId']; ?></td>
                                                <td><?= $timetable['name']; ?></td>
                                                <td><?= $timetable['tId']; ?></td>
                                               
                                                <td><?= $timetable['day']; ?></td>
                                                <td><?= $timetable['time']; ?></td>
                                                
                                                <td>
                                                    
                                                    <a href="timetable-edit.php?id=<?= $timetable['sbId']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>