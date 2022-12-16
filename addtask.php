<?php

session_start();
require "db/conn.php";

if (!isset($_SESSION["isLoggedIn"])) {
    header("location: login.php");
} else if (isset($_POST["submit"])) {
    $emp_id = $_POST["emp_id"];
    $title = $_POST["title"];
    $description = $_POST["desc"];
    $deadline = $_POST["deadline"];

    $q = "select * from emp_master where emp_id = $emp_id";
    $ret = mysqli_query($conn, $q);

    if (mysqli_num_rows($ret) != 1) {
        echo "
        <script>
        alert('Enter valid employee id.');
        window.location = 'addtask.html';
        </script>
        ";
    }

    $check = addTask($conn, $emp_id, $title, $description, $deadline);

    if ($check) {
        echo "
        <script>
        alert('Task added successfully');
        window.location = 'addtask.html';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Problem occure.');
        window.location = 'addtask.html';
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
