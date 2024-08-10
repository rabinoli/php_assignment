<?php
// Include database configuration file
include 'config/dbconfig.php';

// Use the $conn object to interact with the database
$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<?php
// dbconfig.php

// Database configuration
$servername = "localhost";
$username = "root"; // or your MySQL username
$password = ""; // or your MySQL password
$dbname = "car"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// dbconfig.php

// Database configuration
$dsn = "mysql:host=localhost;dbname=car";
$username = "root"; // or your MySQL username
$password = ""; // or your MySQL password

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php
// Include database configuration file
include 'config/dbconfig.php';

// Use the $pdo object to interact with the database
$stmt = $pdo->prepare("SELECT * FROM accounts");
$stmt->execute();

// Fetch all rows
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
}
?>

