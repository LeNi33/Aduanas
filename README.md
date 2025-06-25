# Aduanas
plataforma de aduanas paso los libertadores
# Sistema de Gestión Fronteriza Paso Los Libertadores Aduanas Chile

Este es un prototipo de sistema con diseño visual y funcionalidades básicas:

## Funcionalidades
- Registro de usuarios
- Inicio de sesión
- Navegación entre secciones, esta parte visual solamente: documentos, reportes, ayuda, etc.

## Cómo probar: esta la forma en que me funciona desde otro computador, le dejo los pasos.

1. Abrir Xampp.
2. Coloque  en la carpeta:  
   C:\xampp\htdocs.
3. Cree la siguiente base de datos en **phpMyAdmin**:


CREATE DATABASE usuariosdb;

USE usuariosdb;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255)
);

4. En el navegador ir a:
http://localhost/mipagina/index.php
