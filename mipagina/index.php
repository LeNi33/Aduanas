<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Servicio Nacional de Aduanas</title>
  <link rel="stylesheet" href="css/estilos.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #ececec;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #002664;
      color: rgb(255, 255, 255);
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

    section {
      display: none;
    }

    input, select, textarea {
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
      color: green;
      font-weight: bold;
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
    <button onclick="mostrar('dashboard')">Inicio</button>
    <button onclick="window.location.href='login.php'">Iniciar Sesión</button>
    <button onclick="window.location.href='registro.php'">Registrarse</button>
    <button onclick="mostrar('verificador')">Verificador</button>
    <button onclick="mostrar('documentos')">Documentación</button>
    <button onclick="mostrar('reportes')">Reportes</button>
    <button onclick="mostrar('ayuda')">Ayuda</button>
  </nav>

  <div class="container">
    <section id="dashboard">
      <h2>Bienvenido</h2>
      <p>Use el menú superior para navegar entre módulos del sistema.</p>
    </section>

    <section id="verificador">
      <h2>Verificador de Documentos</h2>
      <form onsubmit="return verificarDocumento(event)">
        <input type="file" id="archivo" accept=".pdf,.docx" required>
        <button type="submit">Verificar</button>
        <p id="mensajeVerificador" class="mensaje"></p>
      </form>
    </section>

    <section id="documentos">
      <h2>Información de Documentos</h2>
      <ul>
        <h1>Será obligatoria la presentación de los siguientes antecedentes:</h1>
        <li>Certificado de Residencia, extendido por la Gobernación Provincial o la Intendencia Regional.</li>
        <li>Certificado de Rentas del SII.</li>
        <li>Declaración Jurada Notarial del nuevo domicilio.</li>
        <li>Fotocopia de la cédula de Identidad vigente.</li>
        <li>Mandato notarial si aplica un tercero.</li>

        <h1>Para vehículos:</h1>
        <li>Factura de Zona Franca o Compraventa.</li>
        <li>Certificado de Inscripción vigente.</li>

        <h1>Otros:</h1>
        <li>Autorización notarial para menores.</li>
        <li>Formulario SAG de alimentos.</li>
        <li>Declaración jurada para mascotas.</li>
      </ul>
    </section>

    <section id="reportes">
      <h2>Generación de Reportes</h2>
      <form onsubmit="return generarReporte(event)">
        <label>Fecha:</label>
        <input type="date" required>
        <label>Tipo:</label>
        <select required>
          <option value="personas">Personas</option>
          <option value="vehiculos">Vehículos</option>
        </select>
        <button type="submit">Generar</button>
        <p id="mensajeReporte" class="mensaje"></p>
      </form>
    </section>

    <section id="ayuda">
      <h2>Centro de Ayuda</h2>
      <p>¿Tienes dudas? Revisa las preguntas frecuentes o consulta directamente:</p>
      <ul>
        <li>¿Qué documentos necesito para viajar?</li>
        <li>¿Dónde puedo descargar el formulario de vehículos?</li>
        <li>¿Qué hacer si llevo alimentos?</li>
      </ul>
      <form onsubmit="return enviarPregunta(event)">
        <textarea placeholder="Escribe tu pregunta..." required></textarea>
        <button type="submit">Enviar</button>
        <p id="mensajeAyuda" class="mensaje"></p>
      </form>
    </section>
  </div>

  <footer>
    &copy; 2025 Servicio Nacional de Aduanas. Todos los derechos reservados.
  </footer>

  <script>
    function mostrar(id) {
      document.querySelectorAll('section').forEach(sec => sec.style.display = 'none');
      document.getElementById(id).style.display = 'block';
    }
    mostrar('dashboard');

    function verificarDocumento(event) {
      event.preventDefault();
      const archivo = document.getElementById('archivo').files[0];
      const mensaje = document.getElementById('mensajeVerificador');
      if (!archivo) return mensaje.textContent = "Debe seleccionar un archivo.";
      if (archivo.size > 5 * 1024 * 1024) return mensaje.textContent = "Archivo demasiado grande.";
      mensaje.style.color = 'green';
      mensaje.textContent = "Verificación exitosa (simulada).";
    }

    function generarReporte(event) {
      event.preventDefault();
      document.getElementById('mensajeReporte').textContent = "Reporte generado (simulado).";
    }

    function enviarPregunta(event) {
      event.preventDefault();
      document.getElementById('mensajeAyuda').textContent = "Tu pregunta fue enviada.";
    }
  </script>
</body>
</html>
