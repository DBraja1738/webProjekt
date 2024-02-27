<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";



$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    


    
    $query = "SELECT * FROM Users WHERE name='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['role'] === 'user') {
            $_SESSION["id"]= $user["id"];
            $_SESSION["username"]=$_POST["username"];
            $_SESSION["role"]="user";
            header("Location: index.html");
            exit();
        } elseif ($user['role'] === 'admin') {
            $_SESSION['id']= $user['id'];
            $_SESSION["role"]="admin";
            $_SESSION["username"]=$_POST["username"];
            header("Location: admin.html");
            exit();
            
        }
        
    } else {
        

        echo 'Invalid credentials, redirecting';
        header("Location: login.html?login_fail=true");
        exit();

        
    }
}


$conn->close();
?>