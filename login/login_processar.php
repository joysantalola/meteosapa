<?php
session_start();
require_once "../connexio.php";

if (isset($_POST["login"])) {

    $nom_usuari = $_POST["nom_usuari"];
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT id, password_hash FROM usuaris WHERE nom_usuari = ?"
    );
    $stmt->bind_param("s", $nom_usuari);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password_hash"])) {
            $_SESSION["usuari_id"] = $user["id"];
            $_SESSION["nom_usuari"] = $nom_usuari;

            header("Location: /Projecte/index.php");   // ← DESTÍ DESPRÉS DE LOGIN
            exit;
        }
    }

    // Si arriba aquí → error
    header("Location: login.php?error=1");
    exit;
}