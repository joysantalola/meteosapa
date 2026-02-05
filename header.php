<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="main-header">
    <div class="header-content">

        <!-- LOGO -->
        <div class="logo">
                <img src="/Projecte/imatges/logo.png" alt="Estació Meteo">
        </div>

        <!-- MENÚ -->
        <nav class="nav-menu">
            <a href="/Projecte/index.php">Inici</a>
            <a href="/Projecte/temperatura.php">Temperatura</a>
            <a href="/Projecte/humitat.php">Humitat</a>
            <a href="/Projecte/pressio.php">Pressió</a>
            <a href="/Projecte/vent.php">Vent</a>
            <a href="/Projecte/precipitacio.php">Precipitació</a>
            <a href="/Projecte/preferits.php">Preferits</a>
        </nav>

        <!-- LOGIN/LOGOUT -->
    <div class="header-right">

            <?php if (isset($_SESSION['usuari_id'])): ?>
                <span class="header-username">
                    <?= htmlspecialchars($_SESSION['nom_usuari']) ?>
            </span>

        <div class="header-auth">
            <a href="/Projecte/login/logout.php" class="header-button logout">
                Tancar sessió
            </a>
        </div>
    
        <?php else: ?>
            <div class="header-auth">
                <a href="/Projecte/login/login.php" class="header-button login">
                    Iniciar sessió
                </a>
            </div>
        <?php endif; ?>
</div>

    </div>
</header>
