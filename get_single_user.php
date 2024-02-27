<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";
if (!isset($_SESSION["id"])){
    header("Location: index.html");
    exit();
}

$conn=new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error:". $conn->connect_error);
}
$userID=$_GET["id"];
$sql = "SELECT * FROM users WHERE id='$userID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}else{
    echo "query fail";

}
$conn->close();

header("Content-Type: application/json");
echo json_encode($user);

?>