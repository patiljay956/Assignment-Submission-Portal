<?php
session_start();
if (!isset($_SESSION['Logged_in']) || $_SESSION['Logged_in'] != true) {
    header("location: staff_login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<?php include "../partials/head.php" ?>

<body class="bg-light">
    <title>Welcome Sir/Mam</title>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="../home.php">Assignment Submission Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./staff_login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php include "../partials/header.php" ?>

    <!-- content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <figure class="text-center mb-5">
                    <blockquote class="blockquote">
                        <h2 class="fw-bold text-primary">Welcome Professor</h2>
                    </blockquote>
                    <figcaption class="blockquote-footer fs-5">
                        Submit kara lo fata fat... <cite title="Source Title">Marks de do zhata zat</cite>
                    </figcaption>
                </figure>
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white fw-bold">
                        Student Submissions
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Sr.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Enrollment Number</th>
                                        <th scope="col">Roll Number</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../partials/_dbconnect.php";
                                    $sql = "Select * from students";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sr_no = $row['srno'];
                                            $name = $row['name'];
                                            $enroll = $row['enrollNo'];
                                            $roll = $row['rollNo'];
                                            $phone = $row['phoneNo'];
                                            $date = $row['date'];
                                            $file = $row['file'];
                                            $loc = 'http://localhost/AssignmentSubmissionPortal/staff/database/' . $file;
                                            $loc = str_replace(' ', '%20', $loc);
                                            echo '
                                            <tr>
                                                <th scope="row">' . $sr_no . '</th>
                                                <td>' . htmlspecialchars($name) . '</td>
                                                <td>' . htmlspecialchars($enroll) . '</td>
                                                <td>' . htmlspecialchars($roll) . '</td>
                                                <td>' . htmlspecialchars($phone) . '</td>
                                                <td>' . htmlspecialchars($date) . '</td>
                                                <td>
                                                    <a href="' . $loc . '" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-file-earmark-arrow-down"></i> Check File
                                                    </a>
                                                </td>
                                            </tr>
                                            ';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End card -->
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
