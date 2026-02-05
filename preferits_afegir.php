<?php
session_start();
require_once "connexio.php";

if (!isset($_SESSION['usuari_id'])) {
    header("Location: login/login.php");
    exit;
}

if (!isset($_POST['data']) || trim($_POST['data']) === '') {
    header("Location: temperatura.php?error=data_buida");
    exit;
}

$usuari_id = $_SESSION['usuari_id'];
$data = $_POST['data'];

/* COMPROBAR SI HAY DATOS PARA ESA FECHA */
$check = $conn->prepare("
    SELECT COUNT(*) AS total
    FROM temperatura
    WHERE DATE(data_registre) = ?
");
$check->bind_param("s", $data);
$check->execute();
$result = $check->get_result()->fetch_assoc();

if ($result['total'] == 0) {
    header("Location: temperatura.php?error=sense_dades");
    exit;
}

/* ✅ SI HAY DATOS, SE GUARDA */
$stmt = $conn->prepare("
    INSERT IGNORE INTO preferits (usuari_id, data)
    VALUES (?, ?)
");
$stmt->bind_param("is", $usuari_id, $data);
$stmt->execute();

header("Location: preferits.php");
exit;
