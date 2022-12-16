<?php

session_start();
require 'db/conn.php';


if (!$_SESSION["isLoggedIn"]) {
    header("Location: login.php");
}

if (isset($_POST["update"]) && isset($_POST["emp_id"])) {
    $emp_id = $_POST['emp_id'];
    $title = $_POST['title'];
    $description = $_POST['desc'];
    $deadline = $_POST['deadline'];
    $task_id = $_POST['tid'];

    $q = "UPDATE `tasks` SET `emp_id`='$emp_id',`title`='$title',`description`='$description',`deadline`='$deadline' WHERE task_id = $task_id";

    $ret = mysqli_query($conn, $q);

    if (!$ret) {
        die("problem in updating task");
    } else {
        echo "
        <script>
        alert('Task updated successfully.');
        window.location='adminviewtask.php';
        </script>
        ";
    }
}


// echo $_GET["tid"];

$task_id = $_GET["tid"];

$q = "select * from tasks where task_id = $task_id";
$ret = mysqli_query($conn, $q);
while ($r = mysqli_fetch_assoc($ret)) {
    $emp_id = $r['emp_id'];
    $title = $r['title'];
    $description = $r['description'];
    $deadline = $r['deadline'];
}

// echo $emp_id;
// echo $title;
// echo $description;
// echo $deadline;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Update Task</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <style>
        .my-back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .my-back-btn a {
            color: white;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="my-back-btn">
        <a href="adminviewtask.php">&larr;go back</a>
    </div>
    <div class="container" style="max-width: 700px">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Task</h1>
                            </div>
                            <form class="user" action="updateTask.php" method="post">
                                <div class="form-group row"></div>

                                <div class="form-group row"></div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="emp_id" name="emp_id" placeholder="emp_id" value='<?= $emp_id ?>' required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="title" name="title" placeholder="Title" value='<?= $title ?>' required />
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control form-control-user form-control-textarea" id="desc" name="desc" placeholder="Description" required><?= $description ?></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="deadline" name="deadline" value='<?= $deadline ?>' required />
                                </div>

                                <input type="hidden" name="tid" value='<?= $task_id ?>'>

                                <button class="btn btn-primary btn-user btn-block" name="update" type="submit">
                                    Update Task
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>