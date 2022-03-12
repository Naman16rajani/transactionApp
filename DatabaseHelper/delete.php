<?php
session_start();
include 'databaseConnector.php';
$id="";
if(isset($_POST['id'])){
$id=$_POST['id'];
}
$iname="";
if(isset($_POST['clearAll'])){
$iname=$_POST['clearAll'];
}
$conn=CreateServer();

$user_check = $_SESSION['login_user'];

if ($iname=="Clear All"){
    $sql="DELETE FROM data WHERE UserName='".$user_check."'";

}
else{
    $sql="DELETE FROM data WHERE id='".$id."' AND UserName='".$user_check."'";

}

$conn->query($sql);
$conn->close();
if (!headers_sent()) {
header("Location: ../home.php");
  exit;
}
?>