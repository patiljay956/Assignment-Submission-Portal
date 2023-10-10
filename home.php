<!doctype html>
<html lang="en">

<?php
include "partials/head.php"
?>

<body>
    <!-- nav bar  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./home.php">Assignment Submission Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
    <?php
    include "partials/header.php"
    ?>

    <section class="page-section " id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="">Assignment Submission Portal</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">This Portal gives an easy way to students for submitting there assignments and projects.This also helps teachers to store the assignment or project submission data in good and secure format.</p>
                    <!-- Sign UP Button -->
                    <a class="btn btn-success btn-xl mb-3" href="./signup.php">SIGN UP NOW...</a>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section" id="services">
        <div class="container px-4 px-lg-3">
            <h2 class="text-center mt-3">Our Basic Features</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-4 text-center">
                    <div class="">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Made With Bootstrap</h3>
                        <p class="text-muted mb-0">With The Integration Of Bootstrap Which is develpoed by META The Portal is More Responsive and User-Friendly</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Simplicity</h3>
                        <p class="text-muted mb-0">submission portal where you can easily & quickly upload the assignments & projects assign to you in efficient manner </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">DataBase integrity</h3>
                        <p class="text-muted mb-0">Your Data and the Submited Files or Documents Were Saved securely in our system</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Open Source</h3>
                        <p class="text-muted mb-0">This entire project will be avalible openly on git-hub so anyone can contribute to make it more strong and secure</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>