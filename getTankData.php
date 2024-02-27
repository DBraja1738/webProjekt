<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Connect to your local MySQL database
$conn = new mysqli("localhost", "root", "", "tankskladiste");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from your database
$result = $conn->query("SELECT * FROM tankconfiguration");

// Convert result to JSON
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();

// Send JSON response
header("Content-Type: application/json");
echo json_encode($data);