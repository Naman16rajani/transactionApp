<?php
include('../DatabaseHelper/helper.php');



$user_check = $_SESSION['login_user'];

// echo $user_check."jjj";


$servername = "localhost";
$user = "root";
$password = "";
$database = "transaction";
$mysqli = new mysqli($servername, $user,
    $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
}
// SQL query to select data from database

$sql = "SELECT * FROM data WHERE UserName='".$user_check."'  ORDER BY id ASC ";

$result = $mysqli->query($sql);

$mysqli->close();
$name="";
while($row=$result->fetch_assoc())
{
    $name=$row['ItemName'];
}

// echo $name;
mysqli_data_seek($result,0);
$html1='<table class="centered highlight">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Credit</th>
                <th>Debit</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>

            <tbody>';
$html2="</tbody>
        </table>";

?>
<?php   
if($name == ""){
?>
<?php
    $html1="";
    $html2="";
?>
        <h1 class="center">No Transactions</h1>
    <img src="6134223.svg" alt="picture" style="width: 100%;">
    <?php } ?>

<?php
$i=1;
?>

<?php

                echo $html1;
                while($rows=$result->fetch_assoc())
                {
?>
            <tr>
                <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
                    
                <td style="cursor: default"><?php echo $i;?></td>
                <td style="cursor: default"><?php echo $rows['ItemName'];$name=$rows['ItemName'];?></td>
                <td style="cursor: default"><?php echo $rows['credit'];?></td>
                <td style="cursor: default"><?php echo $rows['debit'];?></td>
                <td style="cursor: default"><?php echo $rows['total'];?></td>
    <td>
    <div>
        <form  class="center-align" action="../DatabaseHelper/delete.php" method="post">
            <button  type="submit" value="<?php echo $rows['id'];?>" name="id" class=" btn-floating waves-effect waves-circle waves-circle waves-teal btn-flat transparent">
                <i class="material-icons red-text tooltipped" data-position="left" type="submit" data-tooltip="delete">delete</i>
            </button>
        </form>
    </div>
   </td>
            </tr>
            <?php
                    $i++;
                }
                echo $html2;
             ?>
             

    
