<?php
$servername = "localhost";
$username = "default_user";
$password = "AidappartNova";
$dbname = "Aidappart";

// Creation de la connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Verification de la connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?>
