<?php
session_start();
require 'db/conn.php';

if (!$_SESSION['isAdmin']) {
    header("location:login.php");
}

if (isset($_POST['add'])) {
    $dept_id = $_POST['dept_id'];
    $ret = mysqli_query($conn, "select count(1) FROM dept where dept_id = $dept_id");
    $row = mysqli_fetch_array($ret);

    $n = $row[0];
    if ($n > 0) {
        echo "
        <script>
        alert('dept_id already exist.');
        window.location='addDepartment.php';
        </script>
        ";
    }

    $dept_name = $_POST['dept_name'];
    $q = "insert into dept (dept_id, dept_name) values ('$dept_id', '$dept_name')";
    $ret = mysqli_query($conn, $q);

    if (!$ret) {
        die("problem in inserting department");
    } else {
        echo "
                <script>
                alert('Department added successfully.');
                window.location='index.php';
                </script>
                ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Add Task</title>

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
        <a href="index.php">&larr;go back</a>
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
                                <h1 class="h4 text-gray-900 mb-4">Add Department</h1>
                            </div>
                            <form class="user" action="addDepartment.php" method="post">
                                <div class="form-group row"></div>

                                <div class="form-group row"></div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="dept_id" name="dept_id" placeholder="dept_id" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="dept_name" name="dept_name" placeholder="dept_name" required />
                                </div>

                                <button class="btn btn-primary btn-user btn-block" name="add" type="submit">
                                    Add Department
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