<?php
session_start();
session_destroy();
header("Location: /Projecte/index.php");
exit;
?>