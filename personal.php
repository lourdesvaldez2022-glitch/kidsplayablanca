<?php
session_start();
require_once 'conexion.php';

// Verificación de sesión y rol de personal
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'personal') {
    header("Location: index.php");
    exit();
}

// Consultar el registro de asistencia relacionando las tablas ninos y actividades
$query_asistencia = "SELECT a.id, n.nombre, n.apellido, act.nombre AS actividad, a.estado, a.hora_entrada 
                    FROM asistencia a
                    INNER JOIN ninos n ON a.nino_id = n.id
                    INNER JOIN actividades act ON a.actividad_id = act.id
                    ORDER BY a.hora_entrada DESC";

$asistencias = $conexion->query($query_asistencia);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Personal - Kids Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .card-panel {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <i class="fa-solid fa-clipboard-check"></i>
            <span>Kids<strong>Staff</strong></span>
        </div>
        <div class="auth-buttons">
            <span style="font-weight:600; margin-right:1rem;">Recreador: <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
            <a href="logout.php" class="btn btn-outline"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
        </div>
    </header>

    <div class="dashboard-container">
        <div class="card-panel">
            <h2><i class="fa-solid fa-list-check"></i> Control de Asistencia e Inscripciones</h2>
            <p style="margin-bottom:1.5rem; color: #666;">Monitoreo en tiempo real de los menores inscritos en las actividades del Kids Club del hotel.</p>

            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#0ea5e9; color:white;">
                        <th style="padding:12px;">Niño/a</th>
                        <th style="padding:12px;">Actividad</th>
                        <th style="padding:12px;">Hora Entrada</th>
                        <th style="padding:12px;">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($asistencias && $asistencias->num_rows > 0): ?>
                        <?php while ($row = $asistencias->fetch_assoc()): ?>
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:12px; font-weight: 600;"><?php echo htmlspecialchars($row['nombre'] . ' ' . $row['apellido']); ?></td>
                            <td style="padding:12px; color: #4f46e5; font-weight: 600;"><?php echo htmlspecialchars($row['actividad']); ?></td>
                            <td style="padding:12px; color: #64748b;"><?php echo date("H:i", strtotime($row['hora_entrada'])); ?></td>
                            <td style="padding:12px;">
                                <span style="background:#dcfce7; color:#15803d; padding:4px 8px; border-radius:12px; font-weight:600;">
                                    <?php echo ucfirst($row['estado']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="padding:20px; text-align:center; color: #666;">No hay registros de asistencia en este momento.</td>
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