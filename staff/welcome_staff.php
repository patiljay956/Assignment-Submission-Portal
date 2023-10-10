<?php
session_start();
if (!isset($_SESSION['Logged_in']) || $_SESSION['Logged_in'] != true) {
    header("location: staff_login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">


<?php
include "../partials/head.php"
?>

<body>
    <title>Welcome Sir/Mam</title>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php">Assignment Submission Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="./staff_login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./staff_logout.php">Logout</a>
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
    include "../partials/header.php"
    ?>
    <!-- content -->
    <div class="container">

        <figure class="text-center m-4">
            <blockquote class="blockquote">
                <h3>
                    <p>Welcome Professor </p>
                </h3>
            </blockquote>
            <figcaption class="blockquote-footer">
                Submit kara lo fata fat... <cite title="Source Title">Marks de do zhata zat </cite>
            </figcaption>
        </figure>
    </div>
    <div class="container">

        <table class="table">
            <thead>
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
                include "_dbconnect.php";
                $is_empty = false;

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
                        $loc = 'http://localhost/AssignmentSubmissionPortal/staff/database/' . $file . '';

                        $loc = str_replace(' ', '%20', $loc);
                        // displaying data into table
                        echo '
                        <tr>
                        <th scope="row">' . $sr_no . '</th>
                        <td>' . $name . '</td>
                        <td>' . $enroll . '</td>
                        <td>' . $roll . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $date . '</td>
                        <td><a href=' . $loc . ' target="_blank">' . "check file" . '</a></td> </tr>
                        ';
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>