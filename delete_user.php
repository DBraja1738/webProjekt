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
    $userID=$_GET["id"];

    
    
    
    $sql = "DELETE FROM Users WHERE id = $userID";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: admin.html");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
        header("Location: admin.html");
        exit();
        
    }
} else {
    echo "Invalid user ID";
    header("Location: admin.html");
    exit();
}

?>