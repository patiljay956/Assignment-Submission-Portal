<?php
$success  =  false;
$showError =  false;

session_start();
$user = $_SESSION['enrollment'];
if (!isset($_SESSION['Logged_in']) || $_SESSION['Logged_in'] != true) {
    header("location: login.php");
    exit;
}
//  connecting to the server
include "partials/_dbconnect.php";

if (isset($_POST['submit'])) {

    $file_name = $_FILES["u_file"]["name"];    // Properties of File
    $file_temp_loc = $_FILES["u_file"]["tmp_name"];
    $file_store = "staff/database/" . $file_name;

    if (move_uploaded_file($file_temp_loc, $file_store)) {
        // adding data to the server 

        $sql = "UPDATE `students` SET `file` = '$file_name' WHERE `students`.`enrollNo` = $user;";
        //      if success
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = true;
            $_SESSION['file_loc'] = $file_store;
        }
    } else {

        $showError =  "Error! Something Went Wrong :( please Try Again";
    }
}

?>
<!doctype html>
<html lang="en">

<?php
include "partials/head.php"
?>

<body style="background: #f8fafc;">
    <title>Welcome! Student</title>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="./home.php">Assignment Submission Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if ($success): ?>
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your file has been uploaded successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($showError): ?>
        <div class="container mt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops...</strong> <?= $showError ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <?php include "partials/header.php" ?>

    <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%; border-radius: 18px;">
            <div class="text-center mb-4">
                <img src="https://img.icons8.com/fluency/96/000000/student-male.png" alt="Student" width="80" height="80"/>
                <h3 class="mt-2 mb-0">Welcome Student</h3>
                <small class="text-muted">Submit kar le fata fat... <cite title="Source Title">Marks le le zhata zat</cite></small>
            </div>
            <form action="./welcome_student.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label fw-semibold">
                        Upload your assignment
                    </label>
                    <input class="form-control" type="file" id="formFileMultiple" name="u_file" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2" name="submit">
                    <i class="bi bi-upload"></i> Submit
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Icons CDN for upload icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
