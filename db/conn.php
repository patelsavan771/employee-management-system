<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "ems";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (!$conn) {
    die("cannot connect to db. problem in conn.php" . mysqli_errno($conn));
}


function isValidUser($conn, $email, $password)
{
    $q = "select * from emp_master where email = '$email' and password = '$password'";

    $ret = mysqli_query($conn, $q);
    if (mysqli_num_rows($ret) == 1) {
        while ($row = mysqli_fetch_assoc($ret)) {
            if (strcmp($row['email'], $email) == 0 && strcmp($row['password'], $password) == 0) {
                return true;
            }
            break;
        }
    }
    return false;
}


function addEmployee($conn, $fname, $lname, $email, $phone, $birthdate, $joiningdate, $password, $salary, $deptid)
{
    $q = "INSERT INTO `emp_master`(`fname`, `lname`, `email`, `phone_no`, `dept_id`, `salary`, `joining_date`, `birth_date`, `password`) VALUES ('$fname','$lname','$email','$phone', $deptid, $salary,'$joiningdate','$birthdate','$password')";

    $ret = mysqli_query($conn, $q);
    if (!$ret) {
        die("Problem in addemp");
        return false;
    }
    return true;
}

function getAllEmp($conn)
{
    $q = "select * from emp_master order by emp_id";
    return mysqli_query($conn, $q);
}
