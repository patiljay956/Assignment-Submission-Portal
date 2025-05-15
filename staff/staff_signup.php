<!-- Adding database -->
<?php

$showAlert =  false;
$showError =  false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //  connecting to the server
    include "../partials/_dbconnect.php";

    $name = $_POST["name"];
    $id = $_POST["id"];
    $phone_No = $_POST["pnum"];
    $branch = $_POST["branch"];
    $password = $_POST["pass"];
    $Cpassword = $_POST["c_pass"];

    // validating for users 
    $existsql = "SELECT * from staff WHERE Staff_id = '$id'";
    $result = mysqli_query($conn, $existsql); // run the query 
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));  // Display error if query fails
    }

    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        $showError = "Username Already Exists";
    } else {
        // checking the passoword is matching or not 
        if ($password == $Cpassword) {
            // adding data to the server 
            $sql = "INSERT INTO `staff` (`Name`, `Staff_id`, `Phone_no`, `Branch`, `Password`, `date`) 
                    VALUES ('$name', '$id', '$phone_No', '$branch', '$password', current_timestamp());";

            //      if success
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError =  "Error! Password is not match :( please Try Again";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<?php
include "../partials/head.php"
?>

<style>
    body {
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        min-height: 100vh;
    }
    .signup-container {
        max-width: 450px;
        margin: 40px auto;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        padding: 35px 40px 30px 40px;
    }
    .signup-container h2 {
        font-weight: 700;
        color: #343a40;
        margin-bottom: 25px;
    }
    .form-label {
        font-weight: 500;
        color: #495057;
    }
    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: border-color 0.2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #495057;
        box-shadow: 0 0 0 0.2rem rgba(52,58,64,.15);
    }
    .btn-dark {
        width: 100%;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 1px;
        background: linear-gradient(90deg, #343a40 60%, #495057 100%);
        border: none;
        transition: background 0.2s;
    }
    .btn-dark:hover {
        background: linear-gradient(90deg, #495057 60%, #343a40 100%);
    }
    .alert {
        max-width: 450px;
        margin: 30px auto 0 auto;
        border-radius: 10px;
    }
    @media (max-width: 576px) {
        .signup-container {
            padding: 20px 10px;
        }
    }
</style>

<body>
    <!-- nav bar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="../home.php">Assignment Submission Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff_login.php">Staff Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./staff_signup.php">Staff Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SUCCESS MESSAGE  -->
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Success!</strong> Your account has been created successfully.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <!-- ERROR MESSAGE  -->
    <?php
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Oops...</strong> ' . $showError . '
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>

    <!-- SIGN UP CONTENT  -->
    <div class="signup-container">
        <h2 class="text-center mb-4">Staff Signup</h2>
        <form action="./staff_signup.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" name="name" placeholder="Enter Your Name" required>
            </div>
            <div class="mb-3">
                <label for="Enno" class="form-label">Staff Id</label>
                <input type="text" class="form-control" id="Enno" name="id" placeholder="Enter Staff ID uniquely assigned to you" required>
            </div>
            <div class="mb-3">
                <label for="pnum" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="pnum" name="pnum" placeholder="Contact Number" required>
            </div>
            <div class="mb-3">
                <label for="inputGroupSelect01" class="form-label">Select Branch</label>
                <select class="form-select" id="inputGroupSelect01" name="branch" required>
                    <option value="" selected disabled>Choose your core Branch...</option>
                    <option value="Computer">Computer Engineering (CO)</option>
                    <option value="Civil">Civil Engineering (CI)</option>
                    <option value="Electrical">Electrical Engineering (EE)</option>
                    <option value="Mechanical">Mechanical Engineering (ME)</option>
                    <option value="Electronics">Electronics Engineering (EJ)</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="passs" class="form-label">Password</label>
                <input type="password" class="form-control" id="passs" name="pass" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="c_pass" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="c_pass" name="c_pass" placeholder="Confirm Password" required>
                <div class="form-text">Do not share your password with anyone.</div>
            </div>
            <button type="submit" class="btn btn-dark mt-2">Sign Up</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>