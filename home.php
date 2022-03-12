

<?php

//include 'login.php';


session_start();
// const DB_SERVER = 'localhost';
// const DB_USERNAME = 'id18554074_root';
// const DB_PASSWORD = 'WH}Q<WN|qu0WZ6H>';
// const DB_DATABASE = 'id18554074_transaction';
// $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// if(isset($_SESSION['login_user'])){
// $user_check = $_SESSION['login_user'];
// }
// $ses_sql = mysqli_query($db,"select username from UserData where username = '$user_check' ");

// $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

// $login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
    if (!headers_sent()) {
      header("location: login.php");

  exit;
}
    die();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Transaction app">
    <meta name="keywords" content="HTML, Money manager,Transactions ">
    <meta name="author" content="Naman Rajani">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="style.css">-->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <link rel="stylesheet" href="style.css" >

    <title>Transaction app</title>
</head>
<body>
<!--navigation header start-->
<?php include 'components/navBar.php'; ?>
<!--navigation header stops-->

<!--main content starts-->
<div>

    <!--table starts-->
    <div class="MYtable">
    
    <?php include 'components/table.php' ?>

        
        
    </div>

    <!--table ends-->


    <!--floating action buttons start-->
    <div class="fixed-action-btn horizontal click-to-toggle">
                            <a class="btn-floating btn-large  red lighten-1 tooltipped" data-position="top" type="submit" data-tooltip="Settings" >
                                <i class="large material-icons">settings</i>
                            </a>
                            <ul>
                                <li><a data-position="top" type="submit" data-tooltip="Add Data" class="btn-floating red modal-trigger tooltipped" href="#modal1"><i class="material-icons">add</i></a></li>
                                <li><form action="DatabaseHelper/delete.php" method="post">
                                        <button class="btn-floating waves-effect waves-light teal tooltipped" data-position="top" type="submit" data-tooltip="Clear All" value="Clear All" name="clearAll">
                                            <i class="material-icons" >clear_all</i>
                                        </button>
                                    </form>
                                </li>
                                <li><a href="logout.php" data-position="top" type="submit" data-tooltip="Logout" class=" tooltipped btn-floating blue"><i class="material-icons">logout</i></a></li>
                            </ul>
                        </div>

    <div id="modal1" class="modal bottom-sheet">
        <?php include 'components/modal.php' ?>
    </div>
    <!--floating action buttons stops-->


</div>


<!--main content stops-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<script src="stlye.js"></script>
</body>
</html>