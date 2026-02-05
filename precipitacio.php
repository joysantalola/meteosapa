<?php
session_start();

require_once "connexio.php";

$data = $_GET['data'] ?? '';
$resultats = null;

if ($data) {
    $stmt = $conn->prepare("
        SELECT 
            MAX(valor) AS max,
            MIN(valor) AS min,
            AVG(valor) AS mitja
        FROM precipitacio
        WHERE DATE(data_registre) = ?
    ");
    $stmt->bind_param("s", $data);
    $stmt->execute();
    $resultats = $stmt->get_result()->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Precipitació</title>
    <link rel="stylesheet" href="/Projecte/estils/styles.css?v=5">
</head>
<body>

<?php include "header.php"; ?>

<div class="container">

    <h2>Precipitació</h2>

    <div class="introduccio">
        <h3>Consulta de les precipitacions</h3>

        <p>
            En aquesta secció pots consultar les dades de precipitació registrades
            per l’estació meteorològica.
        </p>

        <p>
            A partir de la data seleccionada, es mostren els valors acumulats de
            precipitació enregistrats durant el dia.
        </p>

        <p>
            Aquesta informació és útil per analitzar episodis de pluja i estudiar
            el comportament pluviomètric de la zona.
        </p>
    </div>

    <form method="get" class="formulari">
        <label><strong>Selecciona una data:</strong></label><br><br>
        <input type="date" name="data" value="<?= htmlspecialchars($data) ?>" required>
        <br><br>
        <button type="submit">Mostrar dades</button>
    </form>

    <?php if ($data): ?>
        <?php if ($resultats && $resultats['max'] !== null): ?>

            <div class="resultats">
                <h3>Dades del <?= $data ?></h3>
                <p>Màxima: <strong><?= $resultats['max'] ?> mm</strong></p>
                <p>Mínima: <strong><?= $resultats['min'] ?> mm</strong></p>
                <p>Mitjana: <strong><?= round($resultats['mitja'], 2) ?> mm</strong></p>
            </div>

        <?php else: ?>
            <div class="error">
                No hi ha dades per a aquesta data
            </div> 
        <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'sense_dades'): ?>
        <div class="error">
            No es pot afegir aquesta data perquè no hi ha dades registrades
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'data_buida'): ?>
        <div class="error">
            Has de seleccionar una data abans d’afegir-la a preferits
        </div>
    <?php endif; ?>

    <div class="botons-accions">
        <form method="post" action="preferits_afegir.php">
            <input type="hidden" name="data" value="<?= htmlspecialchars($data) ?>">
            <button type="submit">Afegir a preferits</button>
        </form>

        <form action="index.php" method="get">
            <button type="submit">Tornar a l’inici</button>
        </form>
    </div>

</div>

<?php include "footer.php"; ?>

</body>
</html>
