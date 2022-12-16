<?php

session_start();
require "db/conn.php";

if (!isset($_SESSION["isLoggedIn"])) {
    header("location: login.php");
} else if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["bdate"];
    $joiningdate = $_POST["jdate"];
    $password = $_POST["password"];
    $salary = $_POST["salary"];
    $deptid = $_POST["deptid"];

    $check = addEmployee($conn, $fname, $lname, $email, $phone, $birthdate, $joiningdate, $password, $salary, $deptid);

    if ($check) {
        echo "
        <script>
        alert('Employee added successfully');
        window.location = 'addemp.html';
        </script>
        ";
    } else {
        echo "
        <script>
        //alert('Problem occure.');
        window.location = 'addemp.html';
        </script>
        ";
    }



    // echo $fname . "<br>";
    // echo $lname . "<br>";
    // echo $email . "<br>";
    // echo $phone . "<br>";
    // echo $birthdate . "<br>";
    // echo $joiningdate . "<br>";
    // echo $password . "<br>";
    // echo $salary . "<br>";
    // echo $deptid . "<br>";
}
