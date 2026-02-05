<?php
session_start();
require_once "connexio.php";

/* Datos públicos */
$estacio = $conn->query("
    SELECT utmx, utmy
    FROM estacio
    LIMIT 1
")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pàgina principal</title>
    <link rel="stylesheet" href="/Projecte/estils/styles.css?v=17">
</head>
<body class="bg-inici">

<?php include "header.php"; ?>

<div class="container">

    <h2>Estació Meteorològica</h2>

    <!-- TEXTO DE BIENVENIDA -->
    <?php if (isset($_SESSION['usuari_id'])): ?>
        <p style="text-align:center;">
            Benvingut, <strong><?= htmlspecialchars($_SESSION['nom_usuari']) ?></strong>
        </p>
    <?php endif; ?>


    <div class="introduccio">

    <h3>Benvingut a l’Estació Meteorològica</h3>

    <p>
        Aquesta plataforma permet consultar i analitzar dades meteorològiques
        registrades per l’estació, com ara la temperatura, la humitat, la pressió
        atmosfèrica, el vent i les precipitacions.
    </p>

    <p>
        A través del menú superior pots accedir a cada magnitud i seleccionar
        una data concreta per visualitzar els valors màxims, mínims i mitjans
        enregistrats durant aquell dia.
    </p>

    <p>
        Si disposes d’un compte d’usuari, també pots guardar consultes com a
        preferits per accedir-hi ràpidament més endavant.
    </p>

    <p>
        Aquest projecte té com a objectiu facilitar la visualització de dades
        meteorològiques d’una manera clara, accessible i estructurada.
    </p>

</div>


    <!-- UTM DE L'ESTACIÓ -->
    <?php if ($estacio): ?>
        <div class="ubicacio">
            <h3>Ubicació de l’estació</h3>
            <p>UTMx: <strong><?= $estacio['utmx'] ?></strong></p>
            <p>UTMy: <strong><?= $estacio['utmy'] ?></strong></p>
        </div>
    <?php endif; ?>

</div>

<?php include "footer.php"; ?>

</body>
</html>