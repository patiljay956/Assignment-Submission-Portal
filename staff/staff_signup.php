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
    $existsql = "SELECT * from staff WHERE Staff_id = $id";
    $result = mysqli_query($conn, $existsql); // run the query 
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

<body>
    <!-- nav bar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php">Assignment Submission Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./staff_login.php">Staff Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="./staff_signup.php"> Staff Signup</a>
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

    <?php
    include "../partials/head.php"
    ?>
    <!-- SIGN UP CONTENT  -->
    <div class="container">
        <h2 class="text-center mt-1 ">Sign Up To Our Website</h2>
    </div>
    <!--main form  -->
    <form action="./staff_signup.php" method="POST">

        <div class="form-group  m-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="name" placeholder="Enter Your Name" required>

        </div>

        <div class="form-group  m-4">
            <label for="enroll" class="form-label">Staff Id </label>
            <input type="text" class="form-control" id="Enno" name="id" placeholder="Enter Staff ID Uniquely assign to you " required>
        </div>

        <div class="form-group  m-4">
            <label for="contact number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="pnum" name="pnum" placeholder="Contact Number" required>
        </div>

        <div class="input-group form-group m-4">
            <label class="input-group-text" for="inputGroupSelect01">Select Branch</label>
            <select class="form-select" id="inputGroupSelect01" name="branch" required>
                <option selected>Choose your core Branch...</option>
                <option value="Computer">Computer Enginnering (CO) </option>
                <option value="Civil">Civil Enginnering (CI)</option>
                <option value="Electrical">Electrical Enginnering (EE)</option>
                <option value="Mechnical">Mechnical Enginnering (ME)</option>
                <option value="Mechnical">Electronics Enginnering (EJ)</option>
                <option value="Mechnical">Other</option>
            </select>
        </div>

        <div class="form-group  m-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="passs" name="pass" placeholder="password" required>
        </div>

        <div class="form-group m-4 p4">
            <label for="confirm password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="passs" name="c_pass" placeholder="password" required>
            <div id="emailHelp" class="form-text">Do not share your password With anyone</div>
        </div>

        <button type="submit" class="btn btn-dark mt-2 m-4">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>