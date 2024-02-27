<?php


session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if(isset($_GET["id"])){
    $orderID=$_GET["id"];

    
    
    
    $query = "DELETE FROM TankConfiguration WHERE id = $orderID";
    $result=$conn->query($query);
    if ($result) {
        
        header("Location: myOrders.html");
        exit();
    } else {
        echo "Error deleting order: " . $conn->error;
        header("Location: myOrders.html");
        exit();
        
    }
} else {

    header("Location: myOrders.html");
    exit();
}

?>