<!doctype html>
<html lang="en">

<?php
include "partials/head.php";
?>

<body class="bg-dark text-light">
    <!-- nav bar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="./home.php">
                <i class="bi bi-journal-code"></i> Assignment Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./signup.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff/staff_login.php">Staff Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff/staff_signup.php">Staff Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- include Header -->

    <section class="page-section py-5" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Assignment Submission Portal</h2>
                    <hr class="divider divider-light mx-auto" style="width: 60px; border-top: 3px solid #0d6efd;" />
                    <p class="lead text-light mb-4">
                        Easily submit assignments and projects. Teachers securely manage and track submissions in a user-friendly environment.
                    </p>
                    <a class="btn btn-success btn-lg px-4 mb-3 shadow" href="./signup.php">
                        <i class="bi bi-person-plus"></i> SIGN UP NOW
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section bg-light text-dark py-5" id="services">
        <div class="container px-4 px-lg-3">
            <h2 class="text-center mt-3 fw-bold">Our Basic Features</h2>
            <hr class="divider mx-auto" style="width: 60px; border-top: 3px solid #0d6efd;" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h5 mb-2">Made With Bootstrap</h3>
                        <p class="text-muted mb-0">Responsive and user-friendly design powered by Bootstrap.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h5 mb-2">Simplicity</h3>
                        <p class="text-muted mb-0">Quickly upload assignments and projects with ease and efficiency.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <div class="mb-2"><i class="bi-shield-lock fs-1 text-primary"></i></div>
                        <h3 class="h5 mb-2">Database Integrity</h3>
                        <p class="text-muted mb-0">Your data and files are stored securely in our system.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <div class="mb-2"><i class="bi-github fs-1 text-primary"></i></div>
                        <h3 class="h5 mb-2">Open Source</h3>
                        <p class="text-muted mb-0">Contribute on GitHub to help make the portal stronger and more secure.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary text-light text-center py-3 mt-5">
        &copy; <?php echo date('Y'); ?> Assignment Submission Portal. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>

</html>