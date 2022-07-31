<!-- Adding database -->
<?php
session_start();
$showAlert =  false;
$showError =  false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  connecting to the server
    include "partials/_dbconnect.php";

    $name = $_POST["name"];
    $enrollment = $_POST["Enroll"];
    $rollNo =  $_POST["Roll"];
    $phone_No = $_POST["pnum"];
    $branch = $_POST["branch"];
    $sem = $_POST["sem"];
    $password = $_POST["pass"];
    $Cpassword = $_POST["cpass"];


    // validating for users 
    $existsql = "SELECT * from students WHERE enrollNo = $enrollment";
    $result = mysqli_query($conn, $existsql); // run the query 
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        $showError = "Username Already Exists";
    } else {
        // checking the passoword is matching or not 

        if ($password == $Cpassword) {

            // adding data to the server 
            $sql = "INSERT INTO `students` (`name`, `enrollNo`, `rollNo`, `phoneNo`, `branch`, `sem`, `password`, `date`)
                    VALUES ('$name', '$enrollment', '$rollNo', '$phone_No', '$branch', '$sem', '$password', current_timestamp());";

            //      if success
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                $_SESSION['name'] = $name ;
            }
        } else {

            $showError =  "Error! Password is not match :( please Try Again";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Signup</title>
</head>

<body>
    <!-- nav bar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/project/home.php">Assignment Submission Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/project/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="/project/signup.php">Signup</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/project/login.php">Login</a>
                    </li>


                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>

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
         <strong>Opps...</strong> ' . $showError . '
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>
    <header class="masthead mt-1">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-dark font-weight-bold mt-1">Government Polytechnic Vikramgad</h1>
                </div>
                <figcaption class="blockquote-footer text-end text-dark">
                    The Collage is yours...</cite>
                </figcaption>
            </div>
        </div>
    </header>
    <!-- SIGN UP CONTENT  -->
    <div class="container">
        <h2 class="text-center mt-1 ">Sign Up To Our Website</h2>
    </div>
    <!--main form  -->
    <form action="/project/signup.php" method="POST">

        <div class="form-group  m-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="name" placeholder="Enter Your Name" required>

        </div>

        <div class="form-group  m-4">
            <label for="enroll" class="form-label">Enrollment Number</label>
            <input type="text" class="form-control" id="Enno" name="Enroll" placeholder="Enter Your 10 digit Student number " required>
        </div>

        <div class="form-group  m-4">
            <label for="Croll" class="form-label">Current Roll No</label>
            <input type="text" class="form-control" id="rno" name="Roll" placeholder="Eneter Your current Roll Number" required>
        </div>

        <div class="form-group  m-4">
            <label for="contact number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="pnum" name="pnum" placeholder="Contact Number" required>
        </div>

        <div class="input-group form-group m-4">
            <label class="input-group-text" for="inputGroupSelect01">Select Branch</label>
            <select class="form-select" id="inputGroupSelect01" name="branch" required>
                <option selected>Choose...</option>
                <option value="Computer">Computer Enginnering (CO) </option>
                <option value="Civil">Civil Enginnering (CI)</option>
                <option value="Electrical">Electrical Enginnering (EE)</option>
                <option value="Mechnical">Mechnical Enginnering (ME)</option>
                <option value="Electronics">Electronics Enginnering (EJ)</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group  m-4">
            <label for="sem" class="form-label">Select semester</label>
            <input type="number" class="form-control" id="sem" name="sem" placeholder="Semester Number" required>
            <div id="emailHelp" class="form-text">Enter the semester number only...</div>
        </div>
        <div class="form-group  m-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="passs" name="pass" placeholder="password" required>
        </div>

        <div class="form-group m-4 p4">
            <label for="confirm password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="passs" name="cpass" placeholder="password" required>
            <div id="emailHelp" class="form-text">Do not share your password With anyone</div>
        </div>

        <button type="submit" class="btn btn-primary mt-2 m-4">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>