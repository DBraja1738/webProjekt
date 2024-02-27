<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";
$conn=mysqli_connect($servername, $username, $password, $dbname);
if($_SESSION["role"] != "admin"){
    header("Location: index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $orderId = $_GET['id'];

    $query="SELECT * FROM tankconfiguration WHERE id='$orderId' ";
    $result = mysqli_query($conn, $query);

    $row = $result->fetch_assoc();
    $user_id= $row["user_id"];
    $hullType = $row["hullType"];
    $calibre= $row["calibre"];
    $chassis= $row["chassis"];
    $addons= $row["addons"];
    $price = $row["price"];
    $timeOfOrder = $row["timeOfOrder"];
    $timeOfCompletion = date("Y-m-d H:i:s");

    $query= "INSERT INTO completed_orders (hullType, calibre, chassis, addons, user_id, timeOfOrder, price, timeOfCompletion) VALUES ('$hullType','$calibre','$chassis','$addons','$user_id','$timeOfOrder','$price','$timeOfCompletion')";
    $result = mysqli_query($conn, $query);
   
    $deleteOrderQuery = "DELETE FROM tankconfiguration WHERE id = $orderId";
    $resultDeleteOrder = mysqli_query($conn, $deleteOrderQuery);

    if ($result && $resultDeleteOrder) {
        echo "Order completed successfully.";
        header("Location: admin.html");
        exit();
    } else {
        echo "Error completing the order.";
        header("Location: admin.html");
        exit();
    }
} else {
    echo "Invalid request.";
    header("Location: admin.html");
    exit();
}