<?php
include 'admin-session.php';
include '../db_conn.php';
if (isset($_POST['change-pass'])) {
  $old = $_POST['current'];
  $new = $_POST['new'];
  $user = mysqli_real_escape_string($conn, $_SESSION['email']);
  $passCheck = "SELECT * FROM `tbl_login` WHERE `email`='$user'";
  $runQ = mysqli_query($conn, $passCheck);
  $row = mysqli_fetch_array($runQ);
  if ($row['password'] != $old) {
    echo '<script>alert("Old password doesnot match.");</script>';
    echo '<script>window.location.href="change-pass.php";</script>';
  } else {
    $newp = "UPDATE `tbl_login` SET `password`='$new' WHERE `email`='$user'";
    $runnewp = mysqli_query($conn, $newp);
    echo '<script>alert("Password updated.");</script>';
    echo '<script>window.location.href="change-pass.php";</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Change password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <script>
    function validateForm() {
      var pw1 = document.getElementById("newPassword").value;
      var pw2 = document.getElementById("renewPassword").value;
      if (pw2 != "" && pw1 != pw2) {
        document.getElementById('msg1').style.display = "block";
        document.getElementById('msg1').innerHTML = "Password doesnot match";
        return false;
      } else {
        document.getElementById('msg1').style.display = "none";
      }
    }
  </script>
  <style>
    .col-md-8,
    .col-lg-9 {
      width: 400px;
    }

    .message {
      color: #FF0000;
      font-size: small;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center sidebar-collapse" style="background-color: #3c8dbc;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block" style="color: white;">BookMyTickets</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color: white;"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">





        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white;">Hi, Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="change-pass.php">
                <i class=" ri-lock-password-line"></i>
                <span>Change password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <!-- <i class="bi bi-menu-button-wide"></i> -->
          <span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="view-users.php">
              <!-- <i class="bi bi-circle"></i> -->
              <span>View</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </aside>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Change password</h1>
    </div>
    <div class="tab-content pt-2">

      <div class="tab-pane fade pt-3 active show" id="profile-change-password" role="tabpanel">
        <form action="" method="POST" onsubmit="return validateForm()">

          <div class="row mb-3">
            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
            <div class="col-md-8 col-lg-9">
              <input type="password" class="form-control" name="current" id="currentPassword" placeholder="*********" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
            <div class="col-md-8 col-lg-9">
              <input type="password" class="form-control" name="new" id="newPassword" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
            <div class="col-md-8 col-lg-9">
              <input type="password" class="form-control" name="renewPassword" id="renewPassword" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="*********" required>
              <span class="message" id="msg1"></span>
              <br>
              <center><input type="submit" name="change-pass" class="btn btn-primary" value="Change Password"></center>
            </div>
          </div>
        </form>
      </div>

  </main>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>