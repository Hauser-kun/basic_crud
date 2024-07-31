<?php
require '../../dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php
        include('./messsage.php');
        ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student details
                            <a class="btn btn-dark float-end" href="create_student.php">Add student</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Student name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * from students";
                                $query_run = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $student) {
                                        // echo $student['username'];

                                ?>
                                        <tr>
                                            <td> <?= $student['id'] ?></td>
                                            <td> <?= $student['username'] ?></td>
                                            <td><?= $student['email'] ?></td>
                                            <td><?= $student['phone'] ?></td>
                                            <td><?= $student['address'] ?></td>
                                            <td>
                                                <a class="btn btn-secondary btn-sm" href="view_student.php?id=<?= $student['id'] ?>">View</a>
                                                <a class="btn btn-primary btn-sm" href="edit_student.php?id=<?= $student['id'] ?> ">Edit</a>
                                                <form action="../../code.php" method="post" class="d-inline">

                                                    <button type="submit" class="btn btn-danger btn-sm" value="<?=$student['id']; ?>" name="delete_student">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                <?php

                                    }
                                } else {
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>