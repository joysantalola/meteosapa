<?php
require_once "../connexio.php";

$nom_usuari = $_POST["nom_usuari"];
$password = $_POST["password"];

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO usuaris (nom_usuari, password_hash) VALUES (?, ?)"
);
$stmt->bind_param("ss", $nom_usuari, $password_hash);

if ($stmt->execute()) {
    header("Location: login.php?registrat=1");
} else {
    echo "Error: usuari ja existent";
}