<!-- <?php
session_start();
if (!(isset($_SESSION['email']))) {
    echo '<script> alert ("Session expired");</script>';
    echo'<script>window.location.href="../login.php";</script>';
} 
else {
    $username = $_SESSION['email'];
    }

?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
    <style>
        body{
            background-color: #DEDEDE;
        }
      .navbar {
    overflow: hidden;
    background-color: #333;
  }

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  text-decoration: none;
}
        .navbar h4{
            font-family: Poppins;
            margin:-40px 25px 30px 0;
            color: white;
            float: right;
        }
        .w3-button{
            color: white;
            background-color: #333;

        }
        button.custom-hover-color:hover { 
            background-color: #333 !important;
            color: white !important;
          }
        .w3-sidebar{
            background-color: #333;
        }
        .dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 0px 40px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
        </style>
<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-signal-white";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-signal-white", "");
  }
}

function myDropFunc() {
  var x = document.getElementById("demoDrop");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-signal-white";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-signal-white", "");
  }
}
</script>
</head>
<body>
    <div class="navbar">
    <div style="border-bottom-style: solid;border-bottom-width: 0px;margin-bottom: 10px;">
    <button class="w3-button w3-xxlarge custom-hover-color" style="padding: 10px 0 0 20px;" onclick="w3_open()">&#9776;</button>
    </div>
        <!-- <a class="left" href="index.php"><img src="imgs/main-logo.png" alt="BookMyTickets" width="200" height="80"></a> -->
        <!-- <h4>Hi, <?php echo $username; ?></h4> -->
       
        <!-- <h4>Hi, admin</h4> -->
        <div class="dropdown" style="border-top-style: solid;border-top-width: 0px;margin-top: -44px;">
    <button class="dropbtn">Hi, Admin
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" >
      <a href="#">My Profile</a>
      <a href="../logout.php">Logout</a>
    </div>
  </div> 
    </div>
    <div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none; margin-top: -112px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-xxlarge custom-hover-color"
  onclick="w3_close()" style="margin-left:120px;">&#9776;</button>
  <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
  Movies <i class="fa fa-caret-down"></i>
  </button>
  <div id="demoAcc" class="w3-hide w3-ash w3-card">
    <a href="#" class="w3-bar-item w3-button">Add Movie</a>
    <a href="#" class="w3-bar-item w3-button">View Movies</a>
  </div>
  <div class="w3-dropdown-click">
    <button class="w3-button" onclick="myDropFunc()">
      Theater <i class="fa fa-caret-down"></i>
    </button>
    <div id="demoDrop" class="w3-dropdown-content w3-bar-block w3-white w3-card">
      <a href="#" class="w3-bar-item w3-button">Link</a>
      <a href="#" class="w3-bar-item w3-button">Link</a>
    </div>
  </div>
</div>
</body>
</html>