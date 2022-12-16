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
                $_SESSION["emp_id"] = $row['emp_id'];
                return true;
            }
            break;
        }
    }
    return false;
}


function getEmpId($conn, $email)
{
    $q = "SELECT * FROM `emp_master` WHERE email = '$email'";
    // $q = "select * from emp_master where email = $email";
    $ret = mysqli_query($conn, $q);
    if (!$ret) {
        echo mysqli_error($conn);
        die("Problem in fetching emp id from email.");
    }

    while ($r = mysqli_fetch_assoc($ret)) {
        $emp_id = $r['emp_id'];
    }
    return $emp_id;
}


function addEmployee($conn, $fname, $lname, $email, $phone, $birthdate, $joiningdate, $password, $salary, $deptid)
{
    //check if the employee is already resistered, from the same email.
    $q = "select count(*) as num from emp_master where email = '$email'";
    $result = mysqli_query($conn, $q);
    $result = mysqli_fetch_assoc($result);
    if ($result["num"] == 0) {
        $new_password = $password;
        // $new_password = md5($password);
        $q = "INSERT INTO `emp_master`(`fname`, `lname`, `email`, `phone_no`, `dept_id`, `salary`, `joining_date`, `birth_date`, `password`) VALUES ('$fname','$lname','$email','$phone', $deptid, $salary,'$joiningdate','$birthdate','$password')";

        $ret = mysqli_query($conn, $q);
        if (!$ret) {
            die("Problem in addemp");
            return false;
        }
        return true;
    } else {
        echo "
        <script>
        alert('Already registed with this email.');
        </script>
        ";
        return false;
    }
}

function getAllEmp($conn)
{
    $q = "select * from emp_master order by emp_id";

    return mysqli_query($conn, $q);
}
function getAllTasks($conn)
{
    $q = "select * from tasks order by emp_id";

    return mysqli_query($conn, $q);
}


function addTask($conn, $emp_id, $title, $description, $deadline)
{
    $assign_date = date('Y-m-d');
    $q = "INSERT INTO `tasks` (`emp_id`, `title`, `description`, `assign_date`, `deadline`) VALUES ('$emp_id','$title','$description','$assign_date' ,'$deadline')";

    $ret = mysqli_query($conn, $q);
    if (!$ret) {
        die("DB Problem in addtask");
        return false;
    }
    return true;
}
