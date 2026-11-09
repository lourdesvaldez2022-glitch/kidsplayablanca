<?php
session_start();
require_once 'conexion.php';

// Verificación de sesión y rol de padre
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'padre') {
    header("Location: index.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$nombre_tutor_sesion = $_SESSION['nombre'];

// Obtener ID de la tabla padres
$stmt_padre = $conexion->prepare("SELECT id FROM padres WHERE usuario_id = ?");
$stmt_padre->bind_param("i", $usuario_id);
$stmt_padre->execute();
$padre = $stmt_padre->get_result()->fetch_assoc();
$padre_id = $padre ? $padre['id'] : 0;

// Procesar el registro de un nuevo niño si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar_nino'])) {
    $nombre_nino = trim($_POST['nombre']);
    $edad_nino = intval($_POST['edad']);
    $habitacion = trim($_POST['habitacion']);
    $alergias = trim($_POST['alergias']);
    $observaciones = trim($_POST['observaciones_medicas']);

    if (!empty($nombre_nino) && $edad_nino > 0) {
        $stmt_insert_nino = $conexion->prepare("INSERT INTO ninos (padre_id, nombre, edad, habitacion, alergias, observaciones_medicas) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_insert_nino->bind_param("isisss", $padre_id, $nombre_nino, $edad_nino, $habitacion, $alergias, $observaciones);
        
        if ($stmt_insert_nino->execute()) {
            echo "<script>alert('¡Menor registrado exitosamente!'); window.location.href='padres.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error al registrar el menor.');</script>";
        }
        $stmt_insert_nino->close();
    } else {
        echo "<script>alert('Por favor completa los campos obligatorios del niño.');</script>";
    }
}

// Obtener los niños asociados a este padre
$stmt_ninos = $conexion->prepare("SELECT * FROM ninos WHERE padre_id = ?");
$stmt_ninos->bind_param("i", $padre_id);
$stmt_ninos->execute();
$ninos = $stmt_ninos->get_result();

// Obtener las inscripciones o asistencias asociadas a este tutor o sus niños
$stmt_asistencias = $conexion->prepare("SELECT * FROM asistencia WHERE tutor = ? OR habitacion IN (SELECT habitacion FROM ninos WHERE padre_id = ?) ORDER BY id DESC");
$stmt_asistencias->bind_param("si", $nombre_tutor_sesion, $padre_id);
$stmt_asistencias->execute();
$asistencias = $stmt_asistencias->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Padres - Kids Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-container {
            max-width: 1000px;
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
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">
            <i class="fa-solid fa-heart"></i>
            <span>Kids<strong>Parents</strong></span>
        </div>
        <div class="auth-buttons">
            <span style="font-weight:600; margin-right:1rem;">Tutor: <?php echo htmlspecialchars($nombre_tutor_sesion); ?>[cite: 17]</span>
            <a href="logout.php" class="btn btn-outline"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
        </div>
    </header>

    <div class="dashboard-container">
        
        <!-- Sección para Registrar un Menor -->
        <div class="card-panel">
            <h2><i class="fa-solid fa-user-plus"></i> Registrar Nuevo Menor</h2>
            <p style="color: #666; font-size: 14px; margin-bottom: 20px;">Añade los datos de tus hijos para mantener actualizada su ficha médica y de control.</p>
            
            <form action="padres.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <input type="text" name="nombre" placeholder="Nombre y Apellido del Niño" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="edad" min="1" max="17" placeholder="Edad" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="habitacion" placeholder="Número de Habitación" required>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <input type="text" name="alergias" placeholder="Alergias (Ej. Maní, lácteos o Ninguna)">
                    </div>
                    <div class="form-group">
                        <input type="text" name="observaciones_medicas" placeholder="Observaciones médicas especiales">
                    </div>
                </div>
                <button type="submit" name="registrar_nino" class="btn btn-primary" style="padding: 10px 20px; cursor: pointer;">Guardar Ficha del Niño</button>
            </form>
        </div>

        <!-- Sección de Hijos Registrados -->
        <div class="card-panel">
            <h2><i class="fa-solid fa-child"></i> Mis Hijos Registrados</h2>
            <p style="color: #666; font-size: 14px; margin-bottom: 20px;">Información general y alertas médicas de tus menores en el resort[cite: 17].</p>

            <div class="team-grid">
                <?php if ($ninos && $ninos->num_rows > 0): ?>
                    <?php while ($nino = $ninos->fetch_assoc()): ?>
                        <div class="team-card" style="text-align: left; padding: 20px;">
                            <div class="team-avatar" style="margin-bottom: 10px;">
                                <i class="fa-solid fa-face-smile"></i>
                            </div>
                            <h3 style="margin-bottom: 10px;"><?php echo htmlspecialchars($nino['nombre']); ?></h3>
                            <p><strong>Edad:</strong> <?php echo $nino['edad']; ?> años</p>
                            <p><strong>Habitación:</strong> <?php echo htmlspecialchars($nino['habitacion']); ?></p>
                            <p><strong>Alergias:</strong> <span style="color: #dc2626;"><?php echo htmlspecialchars($nino['alergias'] ?: 'Ninguna'); ?></span>[cite: 17]</p>
                            <p><strong>Observaciones:</strong> <?php echo htmlspecialchars($nino['observaciones_medicas'] ?: 'Sin observaciones'); ?>[cite: 17]</p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p style="color: #666;">Aún no has registrado a ningún menor en el sistema.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sección de Actividades e Inscripciones Realizadas -->
        <div class="card-panel">
            <h2><i class="fa-solid fa-calendar-check"></i> Actividades e Inscripciones</h2>
            <p style="color: #666; font-size: 14px; margin-bottom: 20px;">Historial de registros y actividades programadas para tus hijos.</p>

            <table style="width:100%; border-collapse:collapse; text-align:left;">
                <thead>
                    <tr style="background:#4f46e5; color:white;">
                        <th style="padding:10px;">Niño/a</th>
                        <th style="padding:10px;">Edad</th>
                        <th style="padding:10px;">Actividad</th>
                        <th style="padding:10px;">Habitación</th>
                        <th style="padding:10px;">Fecha de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($asistencias && $asistencias->num_rows > 0): ?>
                        <?php while ($asis = $asistencias->fetch_assoc()): ?>
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:10px;"><?php echo htmlspecialchars($asis['nombre_nino']); ?></td>
                            <td style="padding:10px;"><?php echo htmlspecialchars($asis['edad']); ?> años</td>
                            <td style="padding:10px; font-weight: 600; color: #4f46e5;"><?php echo htmlspecialchars($asis['actividad']); ?></td>
                            <td style="padding:10px;"><?php echo htmlspecialchars($asis['habitacion']); ?></td>
                            <td style="padding:10px;"><?php echo htmlspecialchars($asis['fecha_registro']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="padding:15px; text-align:center; color: #666;">No hay actividades inscritas todavía. ¡Explora el catálogo y anota a tus hijos!</td>
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