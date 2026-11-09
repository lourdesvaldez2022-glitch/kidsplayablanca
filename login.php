<?php
// Mostrar errores para depuración en entorno local
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura y limpieza de datos ingresados
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validar que los campos no estén vacíos
    if (empty($email) || empty($password)) {
        echo "<script>alert('Por favor completa todos los campos.'); window.history.back();</script>";
        exit();
    }

    // Consultar el usuario en la base de datos por su correo
    $stmt = $conexion->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        // Verificar la contraseña encriptada
        if (password_verify($password, $usuario['password'])) {
            // Guardar datos esenciales en la sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirección automática según el rol del usuario
            switch ($usuario['rol']) {
                case 'admin':
                    header("Location: admin_dashboard.php");
                    break;
                case 'personal':
                        header("Location: personal.php");
                        break;
                case 'padre':
                    header("Location: padres.php"); // Asegúrate de que apunte al archivo correcto de padres
                    break;
                default:
                    echo "<script>alert('Rol de usuario no válido.'); window.location.href='index.php';</script>";
                    break;
            }
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta.'); window.history.back();</script>";
        }
    } else {
        // Correo no encontrado en la base de datos
        echo "<script>alert('El correo electrónico no está registrado.'); window.history.back();</script>";
    }

    $stmt->close();
    $conexion->close();
} else {
    header("Location: index.php");
    exit();
}
?>