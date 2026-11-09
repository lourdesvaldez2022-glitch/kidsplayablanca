<?php
session_start();
require_once 'conexion.php';

// Verificación de sesión y rol de administrador
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Consultas para tarjetas de estadísticas
$total_ninos = $conexion->query("SELECT COUNT(*) AS total FROM ninos")->fetch_assoc()['total'];
$total_personal = $conexion->query("SELECT COUNT(*) AS total FROM usuarios WHERE rol = 'personal'")->fetch_assoc()['total'];
$asistencia_hoy = $conexion->query("SELECT COUNT(*) AS total FROM asistencia WHERE DATE(fecha_registro) = CURDATE()")->fetch_assoc()['total'];

// Obtener lista de actividades
$actividades = $conexion->query("SELECT * FROM actividades ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador - Kids Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: #e0e7ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }
        .stat-info h3 {
            margin: 0;
            font-size: 28px;
            color: #1e1b4b;
        }
        .stat-info p {
            margin: 5px 0 0 0;
            color: #64748b;
            font-size: 14px;
        }
        .table-card {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <!-- Navbar Admin -->
    <header class="navbar">
        <div class="logo">
            <i class="fa-solid fa-user-gear"></i>
            <span>Kids<strong>Admin</strong></span>
        </div>
        <div class="auth-buttons">
            <span style="font-weight:600; margin-right:1rem;">Administrador: <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
            <a href="logout.php" class="btn btn-outline"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
        </div>
    </header>

    <div class="admin-container">
        
        <!-- Tarjetas Metricas / Estadísticas -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-children"></i></div>
                <div class="stat-info">
                    <h3><?php echo $total_ninos; ?></h3>
                    <p>Niños Registrados</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #e0f2fe; color: #0284c7;"><i class="fa-solid fa-id-card-clip"></i></div>
                <div class="stat-info">
                    <h3><?php echo $total_personal; ?></h3>
                    <p>Personal de Animación</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #dcfce7; color: #16a34a;"><i class="fa-solid fa-clipboard-user"></i></div>
                <div class="stat-info">
                    <h3><?php echo $asistencia_hoy; ?></h3>
                    <p>Inscripciones de Hoy</p>
                </div>
            </div>
        </div>

        <!-- Tabla Gestión de Actividades -->
        <div class="table-card">
            <h2><i class="fa-solid fa-shapes"></i> Catálogo General de Actividades</h2>
            <p style="margin-bottom:1.5rem; color: #666;">Gestión de programas recreativos y capacidad de atención en el Kids Club.</p>
            
            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#4f46e5; color:white;">
                        <th style="padding:12px;">ID</th>
                        <th style="padding:12px;">Nombre de Actividad</th>
                        <th style="padding:12px;">Rango de Edad</th>
                        <th style="padding:12px;">Cupo Máximo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($actividades && $actividades->num_rows > 0): ?>
                        <?php while ($act = $actividades->fetch_assoc()): ?>
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:12px;"><?php echo $act['id']; ?></td>
                            <td style="padding:12px; font-weight:600; color:#1e1b4b;"><?php echo htmlspecialchars($act['nombre']); ?></td>
                            <td style="padding:12px;"><?php echo $act['edad_minima'] . ' - ' . $act['edad_maxima']; ?> años</td>
                            <td style="padding:12px; font-weight:600; color:#16a34a;"><?php echo $act['cupo_maximo']; ?> niños</td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:12px;">1</td>
                            <td style="padding:12px; font-weight:600; color:#1e1b4b;">Juegos Acuáticos</td>
                            <td style="padding:12px;">6 - 12 años</td>
                            <td style="padding:12px; font-weight:600; color:#16a34a;">20 niños</td>
                        </tr>
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:12px;">2</td>
                            <td style="padding:12px; font-weight:600; color:#1e1b4b;">Talleres de Manualidades</td>
                            <td style="padding:12px;">4 - 10 años</td>
                            <td style="padding:12px; font-weight:600; color:#16a34a;">15 niños</td>
                        </tr>
                        <tr>
                            <td style="padding:12px;">3</td>
                            <td style="padding:12px; font-weight:600; color:#1e1b4b;">Mini Disco y Talentos</td>
                            <td style="padding:12px;">Todas las edades</td>
                            <td style="padding:12px; font-weight:600; color:#16a34a;">30 niños</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2026 Hotel Resort Management - Kids Club. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>