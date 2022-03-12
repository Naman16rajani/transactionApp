<?php
// session_start();
if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }
$user_check="";
function CreateServer(){
    $user_check = $_SESSION['login_user'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transaction";

    return new mysqli($servername, $username, $password,$dbname);

}
function insert($itemName, $credit, $debit, $total){
    $user_check = $_SESSION['login_user'];

    $conn = CreateServer();
    $lastId=$conn->query('SELECT * FROM data ORDER BY id DESC LIMIT 1');
$index=0;
    while ($rows=$lastId->fetch_assoc()){
        $index=$rows['id'];
    }

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$index++;

    $sql = "INSERT INTO data (ItemName, credit, debit,total,UserName)
VALUES ('".$itemName."', '".$credit."', '".$debit."','".$total."','".$user_check."')";
    if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
function update($itemName, $credit, $debit, $total){
    $user_check = $_SESSION['login_user'];

    $conn = CreateServer();

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $date = date('Y/m/d H:i:s');
    $sql = 'SELECT * FROM data WHERE ItemName = "'.$itemName.'" AND UserName = "'.$user_check.'"';
    $result = $conn->query($sql);
    while ($rows=$result->fetch_assoc()){
        $credit=$credit+$rows['credit'];
        $debit=$debit+$rows['debit'];
    }
    $total=$credit-$debit;
    $sql = "UPDATE data SET credit='".$credit."',debit='".$debit."',total='".$total."',lastDate='".$date."' WHERE ItemName='".$itemName."' AND UserName='".$user_check."'";

    if ($conn->query($sql) === TRUE) {
       echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }



    $conn->close();

}

function find($itemName){
    $user_check = $_SESSION['login_user'];

    $conn = CreateServer();

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = 'SELECT COUNT(ItemName) FROM data WHERE ItemName = "'.$itemName.'" AND UserName = "'.$user_check.'"';
   echo "gyung".$itemName . $conn->errno;
    $result = $conn->query($sql);
    $resultArr=$result->fetch_assoc();
    $resultCount=0;
    foreach ($resultArr as $key => $val) {
       echo "<br>key: ".$key." val ". $val."<br>";
        $resultCount=$val;

    }
   echo "cccungtt".$resultArr."    arr   ";

    $conn->close();
    if ($resultCount>0) {
        return TRUE;
    } else {
        return FALSE;
//        echo "0 results";
    }

}
?>
