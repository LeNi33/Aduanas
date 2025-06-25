<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido - Aduanas</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <header>
    <h1>Servicio Nacional de Aduanas</h1>
    <p>Plataforma de Gestión Fronteriza: Paso Los Libertadores</p>
  </header>

  <nav>
    <button onclick="window.location.href='index.php'">Inicio</button>
    <button onclick="window.location.href='cerrar.php'">Cerrar Sesión</button>
  </nav>

  <div class="container">
    <h2>Bienvenido, <?= htmlspecialchars($_SESSION["usuario"]) ?> 🎉</h2>
    <p>Has iniciado sesión correctamente.</p>
  </div>

  <footer>
    &copy; 2025 Servicio Nacional de Aduanas. Todos los derechos reservados.
  </footer>
</body>
</html>
