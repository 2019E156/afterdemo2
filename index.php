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

    <title>View all Students(index)</title>
    
    
</head>
<body>
 
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Back
                            <a href="home.php" class="btn btn-danger float-end">Back to Admin-Homepage</a>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4>Student Details
                            <a href="student-create.php" class="btn btn-primary float-end">Add a new Student</a>
                        </h4>
                        </div>
                    </div>
                    <div class="card-body">
                    <caption>STUDENTS MAIN CONTROL PANEL</caption>
                        <table class="table table-bordered table-striped">
                        
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Index Number</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Joined</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM student";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['stId']; ?></td>
                                                <td><?= $student['indexNumber']; ?></td>
                                                <td><?= $student['stName']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                                <td><?= $student['dateJoined']; ?></td>
                                                <td>
                                            
                                                     <a href="parent-add.php?id=<?= $student['indexNumber']; ?>" class="btn btn-success btn-sm">update parent</a>
                                                     <a href="parent-view.php?id=<?=$student['indexNumber']; ?>" class="btn btn-info btn-sm">View Parent</a>
                                                     <a href="student-edit.php?id=<?= $student['stId']; ?>" class="btn btn-secondary btn-sm">Edit Student </a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['indexNumber'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="add_maths" value="<?=$student['indexNumber'];?>" class="btn btn-warning btn-sm">Add Maths</button>
                                                    </form>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="add_science" value="<?=$student['indexNumber'];?>" class="btn btn-warning btn-sm">Add Science</button>
                                                    </form>
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
                       
                        <div class="card-header">
                    <h4>View Maths Class Students only 
                            <a href="maths11.php" class="btn btn-warning float-end">Maths Class</a>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4>View Science Class Students only
                            <a href="science11.php" class="btn btn-warning float-end">Science class</a>
                        </h4>
                        </div>

                        <div class="card-header">
                        <h4>Task
                            <a href="both11.php" class="btn btn-warning float-end">Task</a>
                        </h4>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>