<?php
session_start();
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include "partials/_dbconnect.php";

    // Get POST data and sanitize input
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $enrollment = mysqli_real_escape_string($conn, $_POST["Enroll"]);
    $rollNo = mysqli_real_escape_string($conn, $_POST["Roll"]);
    $phone_No = mysqli_real_escape_string($conn, $_POST["pnum"]);
    $branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    $sem = mysqli_real_escape_string($conn, $_POST["sem"]);
    $password = $_POST["pass"];
    $Cpassword = $_POST["cpass"];

    // Validate if the enrollment number already exists
    $existsql = "SELECT * from students WHERE enrollNo = '$enrollment'";
    $result = mysqli_query($conn, $existsql);
    
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));  // Error handling for query failure
    }
    
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        $showError = "Username Already Exists";
    } else {
        // Check if passwords match
        if ($password == $Cpassword) {

            // Insert data into the database with the plain text password
            $sql = "INSERT INTO `students` (`name`, `enrollNo`, `rollNo`, `phoneNo`, `branch`, `sem`, `password`, `date`)
                    VALUES ('$name', '$enrollment', '$rollNo', '$phone_No', '$branch', '$sem', '$password', current_timestamp());";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
                $_SESSION['name'] = $name;
            } else {
                $showError = "Error in registration: " . mysqli_error($conn);  // Provide error message if query fails
            }
        } else {
            $showError = "Error! Passwords do not match. Please try again.";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<?php
include "partials/head.php";
?>

<body style="background: linear-gradient(120deg, #f6d365 0%, #fda085 100%); min-height: 100vh;">
    <title>Signup</title>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="./home.php">Assignment Submission Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./signup.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Success Message -->
    <div class="container mt-4" style="max-width: 500px;">
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account has been created successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>

    <!-- Error Message -->
    <?php
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops...</strong> ' . $showError . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>
    </div>

    <!-- Sign Up Form -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px; border-radius: 1rem; background: rgba(255,255,255,0.95);">
            <h2 class="text-center mb-4 fw-bold" style="color: #f76d6d;">Sign Up To Our Website</h2>
            <form action="./signup.php" method="POST">
                <div class="form-group mb-3">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="enroll" class="form-label fw-semibold">PID Number</label>
                    <input type="text" class="form-control" name="Enroll" placeholder="Enter Your 10 digit Student number" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Croll" class="form-label fw-semibold">Current Roll No</label>
                    <input type="text" class="form-control" name="Roll" placeholder="Enter Your Current Roll Number" required>
                </div>

                <div class="form-group mb-3">
                    <label for="contact number" class="form-label fw-semibold">Phone Number</label>
                    <input type="text" class="form-control" name="pnum" placeholder="Contact Number" required>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text fw-semibold" for="inputGroupSelect01">Select Branch</label>
                    <select class="form-select" name="branch" required>
                        <option selected>Choose...</option>
                        <option value="Computer">Computer Engineering (CO)</option>
                        <option value="Civil">Civil Engineering (CI)</option>
                        <option value="Electrical">Electrical Engineering (EE)</option>
                        <option value="Mechanical">Mechanical Engineering (ME)</option>
                        <option value="Electronics">Electronics Engineering (EJ)</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="sem" class="form-label fw-semibold">Select Semester</label>
                    <input type="number" class="form-control" name="sem" placeholder="Semester Number" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>

                <div class="form-group mb-3">
                    <label for="confirm password" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required>
                    <div class="form-text">Do not share your password with anyone</div>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold" style="background: #f76d6d; border: none;">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
