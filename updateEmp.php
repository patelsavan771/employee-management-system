<?php

session_start();
require 'db/conn.php';


if (!$_SESSION["isLoggedIn"] && !$_SESSION["isAdmin"]) {
    header("Location: login.php");
}

if (isset($_POST["update"]) && isset($_POST["emp_id"])) {
    $emp_id = $_POST["emp_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["bdate"];
    $joiningdate = $_POST["jdate"];
    $password = $_POST["password"];
    $salary = $_POST["salary"];
    $deptid = $_POST["deptid"];


    $q = "UPDATE `tasks` SET `emp_id`='$emp_id',`title`='$title',`description`='$description',`deadline`='$deadline' WHERE task_id = $task_id";

    $q = "UPDATE `emp_master` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone_no`='$phone',`dept_id`='$deptid',`salary`='$salary',`joining_date`='$joiningdate',`birth_date`='$birthdate',`password`='$password' WHERE emp_id = $emp_id";
    $ret = mysqli_query($conn, $q);

    if (!$ret) {
        die("problem in updating emp");
    } else {
        echo "
        <script>
        alert('Employee updated successfully.');
        window.location='viewemp.php';
        </script>
        ";
    }
}


$emp_id = $_GET["emp_id"];

$q = "select * from emp_master where emp_id = $emp_id";
$ret = mysqli_query($conn, $q);
while ($r = mysqli_fetch_assoc($ret)) {
    // $emp_id = $r['emp_id'];
    $fname = $r["fname"];
    $lname = $r["lname"];
    $email = $r["email"];
    $phone = $r["phone_no"];
    $birthdate = $r["birth_date"];
    $joiningdate = $r["joining_date"];
    $password = $r["password"];
    $salary = $r["salary"];
    $deptid = $r["dept_id"];
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

    <title>Update Employee</title>

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
        <a href="viewemp.php">&larr;go back</a>
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
                                <h1 class="h4 text-gray-900 mb-4">Update Employee</h1>
                            </div>
                            <form class="user" action="updateEmp.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="fname" placeholder="First Name" value='<?= $fname ?>' required />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" name="lname" placeholder="Last Name" value='<?= $lname ?>' required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="jdate" class="col-form-label">Joining Date</label>
                                        <input type="date" class="form-control form-control-user" id="joiningDate" name="jdate" placeholder="Joining Date" value='<?= $joiningdate ?>' required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="jdate" class="col-form-label">Birth Date</label>
                                        <input type="date" class="form-control form-control-user" id="exampleLastName" name="bdate" placeholder="Birth Date" value='<?= $birthdate ?>' required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value='<?= $email ?>' required />
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="phone" name="phone" placeholder="Phone number" value='<?= $phone ?>' required />
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="deptid" name="deptid" placeholder="Dept Id" value='<?= $deptid ?>' required />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="salary" name="salary" placeholder="Salary" value='<?= $salary ?>' required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" value='<?= $password ?>' required />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="re-password" id="exampleRepeatPassword" placeholder="Repeat Password" value='<?= $password ?>' required />
                                    </div>
                                </div>
                                <input type="hidden" name="emp_id" value='<?= $emp_id ?>'>
                                <button class="btn btn-primary btn-user btn-block" name="update" type="submit">
                                    Update Employee
                                </button>
                            </form>
                            <hr />
                            <div class="text-center">
                                <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                            </div>
                            <div class="text-center">
                                <!-- <a class="small" href="login.html">Already have an account? Login!</a> -->
                            </div>
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