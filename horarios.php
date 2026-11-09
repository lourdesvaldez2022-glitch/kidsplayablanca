<?php
session_start();
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios - Kids Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">
            <i class="fa-solid fa-child-reaching"></i>
            <span>Kids<strong>Club</strong></span>
        </div>
        <nav class="nav-links">
            <a href="index.php">Inicio</a>
            <a href="horarios.php" class="active">Horarios</a>
            <a href="actividades.php">Actividades</a>
            <a href="index.php#contacto">Contacto</a>
        </nav>
        <div class="auth-buttons">
            <a href="index.php" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </header>

    <!-- Sección de Horarios -->
    <section class="hero-section" style="padding: 40px 20px; min-height: auto;">
        <div class="hero-content" style="max-width: 800px; margin: 0 auto; text-align: center;">
            <span class="badge"><i class="fa-solid fa-clock"></i> Organización Diaria</span>
            <h1>Horarios de Atención y Servicios</h1>
            <p>Consulta los bloques de apertura, cierre y los momentos dedicados a cada grupo de edad en el resort.</p>
        </div>
    </section>

    <section class="features-section" style="padding: 20px 50px 60px 50px;">
        <div class="feature-box">
            <i class="fa-solid fa-sun"></i>
            <h3>Turno Mañana</h3>
            <p><strong>09:30 AM - 12:30 PM</strong></p>
            <p>Talleres de dibujo, manualidades creativas, pintura corporal y juegos lúdicos matutinos.</p>
        </div>
        <div class="feature-box">
            <i class="fa-solid fa-utensils"></i>
            <h3>Receso / Almuerzo</h3>
            <p><strong>12:30 PM - 01:30 PM</strong></p>
            <p>Pausa para el almuerzo supervisado con los padres y descanso en áreas protegidas.</p>
        </div>
        <div class="feature-box">
            <i class="fa-solid fa-moon"></i>
            <h3>Turno Tarde / Noche</h3>
            <p><strong>01:30 PM - 06:00 PM</strong></p>
            <p>Talleres de arte, juegos de roles, minidisco y eventos especiales nocturnos.</p>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2026 Hotel Resort Management - Kids Club. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>