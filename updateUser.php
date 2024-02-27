<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "TankSkladiste";


$id=$_POST["userId"];
$name=$_POST["userName"];
$email=$_POST["userEmail"];
$password=$_POST["userPassword"];


$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Error:". $conn->connect_error);
}

$sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";

$result = $conn->query($sql);

$conn->close();
header("Location: admin.html");
exit();


?>