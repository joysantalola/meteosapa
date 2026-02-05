<?php
session_start();
require_once "connexio.php";

if (!isset($_SESSION['usuari_id'], $_POST['data'])) {
    header("Location: preferits.php");
    exit;
}

$usuari_id = $_SESSION['usuari_id'];
$data = $_POST['data'];

$stmt = $conn->prepare("
    DELETE FROM preferits
    WHERE usuari_id = ? AND data = ?
");
$stmt->bind_param("is", $usuari_id, $data);
$stmt->execute();

header("Location: preferits.php");
exit;
