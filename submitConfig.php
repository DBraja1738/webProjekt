<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} else {
echo $_SESSION["username"];
$addons=$_POST["bonus"];
$addonArray=array();
$user=$_SESSION["username"];
foreach ($addons as $selected) {
    array_push($addonArray, $selected);
}

$hull= $_POST["hullRadio"];
$cal= $_POST["calibre"];
$price=$_POST["totalPrice"];
$chassis= $_POST["chassisRadio"];

$currentTime = date("Y-m-d H:i:s");
$addonsAsString=implode(", ",$addonArray);



$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connection fail:".$conn->connect_error);
}

$sql = "SELECT id FROM users WHERE name = '$user'";
$usernameResult=$conn->query($sql);


if ($usernameResult->num_rows > 0) {

    $row = $usernameResult->fetch_assoc();
    $userId = $row['id'];

} else {
    echo 'How did you get here.';
}




if($_SERVER["REQUEST_METHOD"]=="POST"){
    $query="INSERT INTO TankConfiguration (hullType, calibre, chassis, addons, user_id, timeOfOrder, price) VALUES ('$hull', '$cal', '$chassis', '$addonsAsString', '$userId', '$currentTime','$price')";

   $result=$conn->query($query);

    if($result){
        header("Location: index.html");
        exit();
    }else{
        echo "submit fail";
    }
}
$conn->close();

}
?>