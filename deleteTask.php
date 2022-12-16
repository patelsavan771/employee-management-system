<?php
session_start();
require "db/conn.php";
$task_id = $_GET["tid"];

$q = "delete from tasks where task_id = $task_id";
$ret = mysqli_query($conn, $q);

if (!$ret) {
    die("problem in deleting task.");
} else {
    echo "
        <script>
        alert('Task Deleted successfully.');
        window.location='adminviewtask.php';
        </script>
        ";
}
