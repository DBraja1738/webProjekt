<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error:". $conn->connect_error);
}

$sql = "SELECT component, price FROM pricing_table";

$result = $conn->query($sql);
$pricingData=array();

while ($row = $result->fetch_assoc()) {
    
    $pricingData[$row['component']] = $row['price'];
}
//print_r($data);
header("Content-Type: application/json");
echo json_encode($data);

$conn->close();
