<?php
require '../../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student_View</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <?php include 'messsage.php'; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Student
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php

                        if (isset($_GET['id'])) {
                            $student_id = mysqli_escape_string($conn, $_GET['id']);
                            $sql = "SELECT * from students where id='$student_id'";
                            $res = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($res) > 0) {

                                $student = mysqli_fetch_array($res);
                        ?>
                                <form action="../../code.php" method="post">
                                    <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
                                    <div class="mb-3">
                                        <label for="name">Student name</label>

                                        <p class="form-control">
                                            <?= $student['username'] ?>

                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>

                                        <p class="form-control">
                                            <?= $student['email'] ?>

                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number">Phone Number</label>

                                        <p class="form-control">
                                            <?= $student['phone'] ?>

                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address">Address</label>

                                        <p class="form-control">
                                            <?= $student['address'] ?>

                                        </p>
                                    </div>
                                   


                                </form>

                        <?php


                            }
                        }

                        ?>






                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    </script>
</body>

</html>