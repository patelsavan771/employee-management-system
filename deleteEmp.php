<?php

session_start();
require "db/conn.php";
$emp_id = $_GET["emp_id"];

$q = "delete from emp_master where emp_id = $emp_id";
$ret = mysqli_query($conn, $q);

if (!$ret) {
    die("problem in deleting emp.");
} else {
    echo "
        <script>
        alert('Employee Deleted successfully.');
        window.location='viewemp.php';
        </script>
        ";
}
