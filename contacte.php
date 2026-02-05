<?php
session_start();

$missatge_enviat = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // En un projecte acadèmic, normalment només es simula l'enviament
    // Aquí simplement mostrem un missatge de confirmació
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $missatge = htmlspecialchars($_POST['missatge'] ?? '');

    if ($nom && $email && $missatge) {
        $missatge_enviat = true;
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Contacte</title>
    <link rel="stylesheet" href="/Projecte/estils/styles.css?v=2">
</head>
<body>

<?php include "header.php"; ?>

<div class="container">

    <h2>Formulari de contacte</h2>

    <?php if ($missatge_enviat): ?>
        <p><strong>Gràcies pel teu missatge.</strong></p>
        <p>Hem rebut la teva consulta correctament.</p>
    <?php else: ?>

        <form method="post">
            <label><strong>Nom:</strong></label><br>
            <input type="text" name="nom" required>

            <br><br>

            <label><strong>Correu electrònic:</strong></label><br>
            <input type="email" name="email" required>

            <br><br>

            <label><strong>Missatge:</strong></label><br>
            <textarea name="missatge" rows="5" required></textarea>

            <br><br>
            <div class="contacte-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>

    <?php endif; ?>


    <a href="index.php">
        <button>Tornar a l’inici</button>
    </a>

</div>

<?php include "footer.php"; ?>

</body>
</html>