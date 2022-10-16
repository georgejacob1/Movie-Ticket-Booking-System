<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Login</title>
    <style>
        body {
            background-color: #DEDEDE;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            position: absolute;
            width: 100%;
            left: 0px;
            top: 0px;
        }


        .navbar a {
            float: right;
            color: white;
            padding-top: 30px;
            margin-right: 50px;
            text-decoration: none;
            font-family: 'Itim';
        }

        .navbar a.left {
            float: left;
            padding: 0%;
            padding-left: 25px;
        }

        .navbar a:hover {
            color: rgb(185, 185, 185);
        }

        .ticket {
            position: absolute;
            width: 561px;
            height: 497px;
            left: 807px;
            top: 163px;
        }

        table {
            position: absolute;
            left: 107px;
            top: 200px;
        }

        table label {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 23px;
            line-height: 48px;
        }

        input:not([type=submit]) {
            box-sizing: border-box;
            background: #D9D9D9;
            border: 2px solid #757070;
            border-radius: 9px;
            padding: 10px;
            width: 300px;
            height: 45px;
        }

        input[type="submit"],
        button {
            position: absolute;
            background: #1E1E1E;
            top: 330px;
            height: 40px;
            width: 145px;
            border-radius: 10px;
            color: white;
            border: none;
            font-family: 'Poppins';

        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #000000;
            cursor: pointer;
        }

        ::placeholder {
            font-family: 'Poppins';
            padding-left: 8px;
            font-weight: 700;
        }

        td a {
            font-weight: bold;
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    session_destroy();
    ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
                <div class="navbar">
                    <a class="left" href="index.php"><img src="imgs/main-logo.png" alt="BookMyTickets" width="200" height="80"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="ticket">
        <img src="imgs/login-logo.png" alt="ticket">
    </div>
    <form action="login_conn.php" method="POST">
        <table>
            <tr>
                <td><img src="imgs/login-avatar.png" alt="" width="80px" height="80px"></td>
            </tr>
            <tr>
                <td><label for="username">Email</label></td>
            </tr>
            <tr>
                <td><input type="text" name="username" placeholder="Enter your email here" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" title="Please enter a valid email address"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Enter your password here" required></td>
            </tr>
            <tr>
            <tr></tr>
            </tr>
            <tr>
                <td><a href="forgot.php">Forgot password?</a></td>
            </tr>
            <!-- <tr><td><a href="register.php">Don’t have an account? Register here!</a></td></tr> -->
            <tr>
                <td><input type="submit" name="submit_login" value="Login"></td>
                <td><button style="margin-left: -150px;" onclick="location.href='register.php'">Register</button></td>
            </tr>

        </table>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>