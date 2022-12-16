<?php

session_start();
if (!(isset($_SESSION["isLoggedIn"]) && isset($_SESSION["emp_id"]) && $_SESSION["isLoggedIn"])) {
    header("location: login.php");
}

require "db/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Emp - view task</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("includes/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("includes/navbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">My tasks</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Task id</th>
                                            <th>Emp id</th>
                                            <th>FName</th>
                                            <th>LName</th>
                                            <th>Email</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Assign Date</th>
                                            <th>Deadline</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Task id</th>
                                            <th>Emp id</th>
                                            <th>FName</th>
                                            <th>LName</th>
                                            <th>Email</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Assign Date</th>
                                            <th>Deadline</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php

                                        // $q = "SELECT tasks.task_id,  from tasks";

                                        // $q = "select *
                                        // from tasks where emp_id = " . $_SESSION['emp_id'];

                                        $q = "select *
                                        from tasks inner join emp_master 
                                          on tasks.emp_id=emp_master.emp_id where tasks.emp_id = " . $_SESSION["emp_id"];

                                        // $q = "SELECT `tasks.task_id`, `tasks.emp_id`, `tasks.title`, `tasks.description`, `tasks.assign_date`, `tasks.deadline`, emp_master.fname, emp_master.lname, emp_master.email FROM `tasks`, emp_master WHERE tasks.emp_id = emp_master.emp_id";
                                        $ret = mysqli_query($conn, $q);
                                        while ($r = mysqli_fetch_assoc($ret)) {
                                            echo "<tr>";
                                            echo "<td>" . $r['task_id'] . "</td>";
                                            echo "<td>" . $r['emp_id'] . "</td>";
                                            echo "<td>" . $r['fname'] . "</td>";
                                            echo "<td>" . $r['lname'] . "</td>";
                                            echo "<td>" . $r['email'] . "</td>";
                                            echo "<td>" . $r['title'] . "</td>";
                                            echo "<td>" . $r['description'] . "</td>";
                                            echo "<td>" . $r['assign_date'] . "</td>";
                                            echo "<td>" . $r['deadline'] . "</td>";

                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("includes/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>