<?php

include 'databaseConnector.php';

$ItemName="";
$credit=$debit=$total=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ItemName=test_input($_POST["itemName"]);
    $credit=test_input($_POST["credit"]);
    $debit=test_input($_POST["debit"]);
    $total=$credit-$debit;
    if (find($ItemName)==TRUE){
       echo "update";

    update(ucwords($ItemName),$credit,$debit,$total);

    }
    else{
       echo "insert";
if ($ItemName!=""){
    insert(ucwords($ItemName),$credit,$debit,$total);

}
    }
       echo "update2";

if (!headers_sent()) {

      header("location: ../home.php");

  exit;
}
//    exit();

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


