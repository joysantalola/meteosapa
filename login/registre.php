<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Registrar usuari</title>
    <link rel="stylesheet" href="/Projecte/estils/styles.css?v=1">

</head>
<body>

<div class="container">

    <h2>Registre d'usuari</h2>

    <form action="registre_processar.php" method="POST">
        <label>Nom d'usuari</label>
        <input type="text" name="nom_usuari" required>

        <label>Contrasenya</label>
        <input type="password" name="password" required>

        <button type="submit">Registrar</button>
    </form>

        <a href="login.php">
        <button>Tornar al login</button>
    </a>

</div>

</body>
</html>
