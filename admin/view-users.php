<?php
include 'admin-session.php';
include '../db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Admin Dashboard</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/btn.css" rel="stylesheet" />
  <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center sidebar-collapse" style="background-color: #3c8dbc">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="" />
        <span class="d-none d-lg-block" style="color: white">BookMyTickets</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color: white"></i>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown"></li>

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white">Hi, Admin</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="change-pass.php">
                <i class="ri-lock-password-line"></i>
                <span>Change password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <!-- <i class="bi bi-menu-button-wide"></i> -->
          <span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="view-users.php">
              <!-- <i class="bi bi-circle"></i> -->
              <span>View</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
    </ul>
  </aside>
  <!-- End Sidebar-->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <main id="main" class="main">
    <!-- <section class="section dashboard"> -->
    <?php
    $user_check = "SELECT `type_id` FROM `tbl_usertype` WHERE `type_title` = 'user'";
    $user_check_rslt = mysqli_query($conn, $user_check);
    while ($row = mysqli_fetch_array($user_check_rslt)) {
      $type = $row['type_id'];
      $users = "SELECT * FROM `tbl_users` as a, `tbl_login` as b WHERE a.login_id=b.login_id and b.type_id='$type'";
      $users_run = mysqli_query($conn, $users);
      $i = 1;
    ?>

      <table class="sortable">
        <thead style="cursor: pointer;">
          <tr>
            <th>Sl.No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php while ($data = mysqli_fetch_array($users_run)) { ?>
          <tbody>
            <tr class="item">
              <td data-label="Sl.No."><?php echo $i; ?></td>
              <td data-label="Name"><?php echo $data['user_fname'] . " " . $data['user_lname']; ?></td>
              <td data-label="Email"><?php echo $data['email']; ?></td>
              <td data-label="Phone number"><?php echo $data['user_phno']; ?></td>
              <td data-label="Status"><?php echo $data['user_status']; ?></td>
              <td data-label="Action">
              <a class="small green button" style="padding-right: 16%;" href="activate.php?actid=<?php echo $data["user_id"]; ?>">Activate</a><br><br>
              <a class="small red button" href="deactivate.php?deactid=<?php echo $data["user_id"]; ?>">Deactivate</a>
              </td>
            </tr> <?php
                  $i++;
                }
              }
                  ?>
          </tbody>
      </table>
      <!-- </section> -->
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