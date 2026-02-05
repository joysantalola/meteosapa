<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Login Projecte Meteo</title>
    <link rel="stylesheet" href="/Projecte/estils/styles.css?v=2">
</head>
<body>

<div class="container">

    <h2>Inici de sessió</h2>

    <?php if (isset($_GET["error"])): ?>
        <div class="error">Usuari o contrasenya incorrectes</div>
    <?php endif; ?>

    <?php if (isset($_GET["registrat"])): ?>
        <div class="success">Usuari registrat correctament</div>
    <?php endif; ?>

    <form action="login_processar.php" method="POST">
        <label>Nom d'usuari</label>
        <input type="text" name="nom_usuari" required>

        <label>Contrasenya</label>
        <input type="password" name="password" required>

        <div class="login-actions">
            <button type="submit" name="login">Iniciar sessió</button>
        </div>
    </form>
        
        <form action="registre.php" method="GET">
            <div class="login-actions">
                <button type="submit" class="button-secondary">Registrar usuari</button>
            </div>
        </form>

        <a href="/Projecte/index.php">
        <button>Tornar a l’inici</button>
    </a>

</div>

</body>
</html>
