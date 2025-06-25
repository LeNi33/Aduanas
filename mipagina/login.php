<?php
include("conexion.php");
session_start();
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE email = '$correo'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario["password"])) {
            $_SESSION["usuario"] = $usuario["nombre"];
            header("Location: bienvenido.php");
            exit;
        } else {
            $mensaje = "❌ Contraseña incorrecta.";
        }
    } else {
        $mensaje = "❌ Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión - Aduanas</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #ececec;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #002664;
      color: white;
      padding: 20px;
      text-align: center;
      background-image: url('img/foto-loslibertadores-abril.jpg');
      background-size: cover;
      background-position: center;
    }

    nav {
      background-color: #003366;
      text-align: center;
      padding: 10px;
    }

    nav button {
      margin: 5px;
      padding: 10px 15px;
      background-color: #ffffff;
      border: none;
      color: #003366;
      font-weight: bold;
      cursor: pointer;
    }

    .container {
      max-width: 800px;
      margin: auto;
      padding: 20px;
      background: white;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button[type="submit"] {
      background-color: #002664;
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
    }

    .mensaje {
      color: #c8102e;
      font-weight: bold;
      margin-top: 10px;
    }

    footer {
      text-align: center;
      font-size: 12px;
      padding: 10px;
      margin-top: 30px;
      background-color: #eeeeee;
    }
  </style>
</head>
<body>
  <header>
    <h1>Servicio Nacional de Aduanas</h1>
    <p>Plataforma de Gestión Fronteriza: Paso Los Libertadores</p>
  </header>

  <nav>
    <button onclick="window.location.href='index.php'">Inicio</button>
    <button onclick="window.location.href='registro.php'">Registrarse</button>
  </nav>

  <div class="container">
    <h2>Iniciar Sesión</h2>
    <form method="post">
      <input type="email" name="correo" placeholder="Correo electrónico" required>
      <input type="password" name="contrasena" placeholder="Contraseña" required>
      <button type="submit">Entrar</button>
    </form>
    <p class="mensaje"><?= $mensaje ?></p>
  </div>

  <footer>
    &copy; 2025 Servicio Nacional de Aduanas. Todos los derechos reservados.
  </footer>
</body>
</html>
