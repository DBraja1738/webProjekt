<?php


session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";

$conn = new mysqli($servername, $username, $password, $dbname);
echo 1;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

echo 2;
if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    $orderID=$_GET["id"];

    
    
    
    $query = "DELETE FROM TankConfiguration WHERE id = $orderID";
    $result=$conn->query($query);
    if ($result) {
        
        header("Location: admin.html");
        exit();
    } else {
        echo "Error deleting order: " . $conn->error;
        header("Location: admin.html");
        exit();
        
    }
} else {

    header("Location: admin.html");
    exit();
}

?>