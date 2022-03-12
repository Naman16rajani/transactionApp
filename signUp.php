<?php
const DB_SERVER = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_DATABASE = "transaction";
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$username = "";
$password = "";
session_start();
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $check="";
     if(isset($_POST['rememberMe'])){
        $check=$_POST['rememberMe'];
    }
    $sql = "SELECT id FROM `UserData` WHERE `username` = '" . hash('md5', $myusername) . "'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = "";
    if(isset($row['active'])){
        $active=$row['active'];
    }
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $error = "Your Name or Password is taken";
    } else {
    //     $sql = "SELECT id FROM `UserData` WHERE `password` = '" . hash('md5', $mypassword) . "'";
    //     $result = mysqli_query($db, $sql);
    //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //     $active = "";
    // if(isset($row['active'])){
    //     $active=$row['active'];
    // }
    //     $count = mysqli_num_rows($result);
    //     if ($count == 1) {
    //         $error = "Your Name or Password is taken";
    //     } else {
            $sql = "INSERT INTO `UserData` (`username`, `password`,`id`)
VALUES ('" . hash('md5', $myusername) . "', '" . hash('md5', $mypassword) . "', NULL)";


echo "234";

            $result = mysqli_query($db, $sql);
            echo "loda. ".hash('md5', $myusername).$result;
            // If result matched $myusername and $mypassword, table row must be 1 row
            if ($check == 1) {
                setcookie("username", $myusername, time() + (86400 * 30), "/");
                setcookie("password", $mypassword, time() + (86400 * 30), "/");
            }
            if ($result == true) {
//        session_register("myusername");
                $_SESSION['login_user'] = hash('md5', $myusername);
                header("location: home.php");
            } else {
                $error = "Your Name or 3 Password is taken";
            }
        // }
    }


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/"> -->


    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
    <form action="" method="post">
        <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-bold text-danger text-uppercase ">PLEASE SIGN UP</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                   required>
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="1" name="rememberMe"> Remember me
            </label>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <a class="w-100 btn btn-lg btn-danger" href="login.php" type="button">Log in</a>

                </div>
                <div class="col">
                    <button class="w-100 btn btn-lg btn-danger" type="submit">Sign in</button>

                </div>
            </div>

        </div>

    </form>
    <?php if ($error==="Your Name or Password is taken") {
        ?>
        <div class="toast-container position-absolute bottom-0 end-0">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="margin: 20px;padding: 5px;">
                <div class="toast-header" style="margin-bottom: 15px">
                    <strong class="me-auto text-danger">OOPS! Error</strong>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" style="margin: 10px">
                    <?php echo $error ?>
                </div>
            </div>
        </div>


        <?php
    } ?>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>

