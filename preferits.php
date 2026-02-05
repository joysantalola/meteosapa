<?php
session_start();

require_once "connexio.php";

$usuari_id = $_SESSION['usuari_id'];

function valor($conn, $taula, $data) {
    $sql = "
        SELECT ROUND(AVG(valor),2) AS v
        FROM $taula
        WHERE DATE(data_registre) = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc()['v'] ?? '—';
}

$preferits = $conn->prepare("
    SELECT data
    FROM preferits
    WHERE usuari_id = ?
    ORDER BY data DESC
");
$preferits->bind_param("i", $usuari_id);
$preferits->execute();
$result = $preferits->get_result();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Preferits</title>
    <link rel="stylesheet" href="/Projecte/estils/styles.css?v=2">
</head>
<body>

<?php include "header.php"; ?>

<div class="container">
    <h2>Dies preferits</h2>

        <?php if ($result->num_rows === 0): ?>
            <div class="error">
                No tens dies guardats
            </div>
        <?php endif; ?>

<?php while ($row = $result->fetch_assoc()): ?>
    <?php $data = $row['data']; ?>

    <div class="resultats">
        <h3><?= htmlspecialchars($data) ?></h3>

        <ul>
            <li>Temperatura: <?= valor($conn, 'temperatura', $data) ?> °C</li>
            <li>Humitat: <?= valor($conn, 'humitat', $data) ?> %</li>
            <li>Vent: <?= valor($conn, 'vent', $data) ?> km/h</li>
            <li>Pressió: <?= valor($conn, 'pressio', $data) ?> hPa</li>
            <li>Precipitació: <?= valor($conn, 'precipitacio', $data) ?> mm</li>
        </ul>

        <!-- BOTÓN ELIMINAR -->
        <form method="post" action="preferits_eliminar.php">
            <input type="hidden" name="data" value="<?= htmlspecialchars($data) ?>">
            <button type="submit"
                    onclick="return confirm('Eliminar aquest dia dels preferits?')">
                Eliminar
            </button>
        </form>
    </div>


<?php endwhile; ?>

    <a href="index.php">
        <button>Tornar a l’inici</button>
    </a>
    
</div>

<?php include "footer.php"; ?>

</body>
</html>