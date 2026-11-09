<?php
session_start();
require_once 'conexion.php';

// Capturar el nombre de la actividad desde la URL
$actividad_nombre = isset($_GET['actividad']) ? htmlspecialchars($_GET['actividad']) : 'Actividad General';

// Procesar la inscripción si el formulario se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_nino = trim($_POST['nombre_nino']);
    $edad_nino = intval($_POST['edad_nino']);
    $nombre_tutor = trim($_POST['nombre_tutor']);
    $habitacion = trim($_POST['habitacion']);
    $actividad_seleccionada = trim($_POST['actividad_seleccionada']);

    if (!empty($nombre_nino) && !empty($nombre_tutor) && !empty($habitacion)) {
        // Guardar la inscripción en la base de datos (puedes ajustar la tabla según tu estructura)
        $stmt = $conexion->prepare("INSERT INTO asistencia (nombre_nino, edad, tutor, habitacion, actividad, fecha_registro) VALUES (?, ?, ?, ?, ?, NOW())");
        
        // Si no existe esa columna exacta en asistencia, insertamos o adaptamos:
        if ($stmt) {
            $stmt->bind_param("sisss", $nombre_nino, $edad_nino, $nombre_tutor, $habitacion, $actividad_seleccionada);
            $stmt->execute();
            $stmt->close();
        }

        echo "<script>
            alert('¡Inscripción realizada con éxito para " . addslashes($nombre_nino) . " en " . addslashes($actividad_seleccionada) . "!');
            window.location.href = 'actividades.php';
        </script>";
        exit();
    } else {
        echo "<script>alert('Por favor completa todos los campos requeridos.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribir Actividad - Kids Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            max-width: 550px;
            margin: 30px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .form-group {
            margin-bottom: 18px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-group input[readonly] {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <i class="fa-solid fa-child-reaching"></i>
            <span>Kids<strong>Club</strong></span>
        </div>
        <div class="auth-buttons">
            <a href="actividades.php" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Regresar a Actividades</a>
        </div>
    </header>

    <div class="form-container">
        <div style="text-align: center; margin-bottom: 25px;">
            <i class="fa-solid fa-file-pen" style="font-size: 40px; color: #4f46e5; margin-bottom: 10px;"></i>
            <h2>REGISTRO DE NIÑO</h2>
            <p style="color: #666; font-size: 14px;">
        </div>

        <form action="" method="POST">
            <div class="form-group">
                <label><i class="fa-solid fa-star"></i>Numero de cedula</label>
                <input type="text" name="actividad_seleccionada" value="<?php echo $actividad_nombre; ?>" readonly>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-child"></i> Nombre Completo del Niño/a</label>
                <input type="text" name="nombre_nino" placeholder="Ej. Mateo Pérez" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-cake-candles"></i> Edad del Niño/a</label>
                <input type="number" name="edad_nino" min="1" max="17" placeholder="Ej. 7" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-user-shield"></i> Nombre del Padre o Tutor</label>
                <input type="text" name="nombre_tutor" placeholder="Ej. Carlos Pérez" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-door-closed"></i> Número de Habitación / Villa</label>
                <input type="text" name="habitacion" placeholder="Ej. Habitación 304" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 16px; margin-top: 10px; cursor: pointer;">Confirmar Inscripción</button>
        </form>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2026 Hotel Resort Management - Kids Club. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>