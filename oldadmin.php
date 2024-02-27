
<?php


session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TankSkladiste";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

function displayUsers($conn)
{
    $sql = "SELECT id, name, email, role FROM Users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th> <th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            if($row["role"]=="admin") continue;
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";

            echo "<td><a href='edit_user.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_user.php?id=" . $row["id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No users found";
    }
}

function displayOrders($conn){

    $query= "SELECT id, hullType, calibre, chassis, addons, price, user_id FROM TankConfiguration";
    $result=$conn->query($query);

    if($result->num_rows>0){

        echo "<h3>Order List:</h3>";
        echo '<table class="table">';
        echo "<tr><th>ID</th><th>Hull type</th><th>Calibre</th><th>Chassis</th><th>Addons</th><th>Price</th><th>User_id</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["hullType"] . "</td>";
            echo "<td>" . $row["calibre"] . "</td>";
            echo "<td>" . $row["chassis"] . "</td>";
            echo "<td>" . $row["addons"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["user_id"] . "</td>";

            echo "<td><a href='delete_order.php?id=" . $row["id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "There are no orders right now.";
    }
    

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
    <h1>Admin Panel</h1>
    <h3>User List:</h3>
    <?php displayUsers($conn); 
    echo "<br>";
        displayOrders($conn);
    ?>
    <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>