<?php
$host = "localhost";
$user = "root";
$password = "";          // XAMPP normalment no té password
$database = "projecte";
$socket = "/opt/lampp/var/mysql/mysql.sock";

$conn = new mysqli($host, $user, $password, $database, null, $socket);

if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>