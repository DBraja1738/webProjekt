<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";

if (!isset($_SESSION["id"])){
    header("Location: index.html");
    exit();
}else{
    
    $conn=mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $orderID=$_POST["orderID"];
    $hull= $_POST["hullRadio"];
    $cal= $_POST["calibre"];
    $price=$_POST["totalPrice"];
    $chassis= $_POST["chassisRadio"];
    $addons=$_POST["bonus"];
    $addonArray=array();
    $userID=$_SESSION["id"];
    foreach ($addons as $selected) {
    array_push($addonArray, $selected);
    }
    $addonsAsString=implode(", ",$addonArray);
    $sql= "UPDATE tankconfiguration SET hullType='$hull', calibre='$cal', chassis='$chassis', addons='$addonsAsString', price='$price' WHERE id=$orderID";


    $result=$conn->query($sql);

    if($result){
        header("Location: index.html");
        exit();
    }else{
        echo "submit fail";
    }
    $conn->close();
}


?>