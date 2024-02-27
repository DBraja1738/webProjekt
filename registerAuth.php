<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";



$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connection fail:".$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $user_name=$_POST["name"];
    
    $pass_word=$_POST["password"];
    
    $email=$_POST["email"];
   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.html?registerInvalid=true");
        exit();
    }

    if (empty($user_name) || empty($pass_word) || empty($email)) {
        header("Location: register.html?registerInvalid=true");
        exit();
    }



    $query = "INSERT INTO Users (name, email, password, role) VALUES ('$user_name', '$email', '$pass_word', 'user')";
    $result = $conn->query($query);

    if ($result) {
        header("Location: login.html");
        exit();

    } else {
        echo "register fail";
        header("Location: register.html?registrationInvalid=true");
        exit();
    }
}  
$conn->close();
?>