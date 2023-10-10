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

<body>
    <title>Welcome! Student</title>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./home.php">Assignment Submission Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="./login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">Logout</a>
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

    <?php
    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Success!</strong> Your File Has been Uploaded Successfully
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
    include "partials/header.php"
    ?>
    <!-- content -->

    <figure class="text-center m-4">
        <blockquote class="blockquote">
            <h3>
                <p>Welcome Student </p>
            </h3>
        </blockquote>
        <figcaption class="blockquote-footer">
            Submit kar le fata fat... <cite title="Source Title">Marks le le zhata zat </cite>
        </figcaption>
    </figure>


    <form action="./welcome_student.php" method="POST" enctype="multipart/form-data">
        <div class="container mt-5">
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">
                    <h4>Upload your assinment</h4>
                </label>
                <input class="form-control" type="file" id="formFileMultiple" name="u_file">
            </div>
            <button type="submit" class="btn btn-primary mt-2 m-4" name="submit">Submit</button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>