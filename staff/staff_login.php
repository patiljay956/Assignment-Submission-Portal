<?php
$login  =  false;
$showError =  false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // connecting to the server
  include "../partials/_dbconnect.php";

  $id = $_POST["id"];
  $password = $_POST["pass"];

  $sql = "Select * from staff where Staff_id='$id' AND password= '$password' ";

  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    $login = true;
    //  redirecting to the welcome page

    session_start();
    $_SESSION['Logged_in'] = true;
    header("location: welcome_staff.php");
  } else {
    $showError =  "invalid Credentials :( enrollment or password is incorrect ";
  }
}
?>


<!doctype html>
<html lang="en">

<?php
include "../partials/head.php"
?>

<body>
  <title>welcome ! Professor</title>
  <!-- nav bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../home.php">Assignment Submission Portal</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="../home.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="./staff_login.php">Staff login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./staff_signup.php">Staff SignUp</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Success!</strong> You are Logged successfully.
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
  include "../partials/header.php"
  ?>
  <div class="container">
    <h2 class="text-center mt-1 "> LOGIN TO OUR SYSTEM</h2>
  </div>

  <form action="./staff_login.php" method="POST">
    <div class="form-group  m-4">
      <label for="enroll" class="form-label">Staff ID</label>
      <input type="text" class="form-control" id="staffId" name="id" placeholder="Enter Your Staff id " required>
    </div>

    <div class="form-group  m-4">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="passs" name="pass" placeholder="password" required>
      <div id="emailHelp" class="form-text">Do not Share Your Password..
      </div>
    </div>

    <button type="submit" class="btn btn-dark m-4">Submit</button>
  </form>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>