<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $rol = trim($_POST['rol']);
    $password = $_POST['password'];

    if (empty($nombre) || empty($email) || empty($rol) || empty($password)) {
        echo "<script>alert('Por favor completa todos los campos.'); window.history.back();</script>";
        exit();
    }

    // Verificar si el correo ya está registrado
    $stmt_check = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $stmt_check->close();
        // Modificado: Simplemente avisa y regresa al formulario para corregir o cambiar el correo
        echo "<script>
            alert('Este correo ya está registrado.'); 
            window.history.back();
        </script>";
        exit();
    }
    $stmt_check->close();

    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    $stmt_insert = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
    $stmt_insert->bind_param("ssss", $nombre, $email, $password_hashed, $rol);

    if ($stmt_insert->execute()) {
        $usuario_id = $stmt_insert->insert_id;

        if ($rol === 'padre') {
            $stmt_padre = $conexion->prepare("INSERT INTO padres (usuario_id, nombre_completo) VALUES (?, ?)");
            $stmt_padre->bind_param("is", $usuario_id, $nombre);
            $stmt_padre->execute();
            $stmt_padre->close();
        }

        echo "<script>alert('¡Registro exitoso! Ya puedes iniciar sesión.'); window.location.href='index.php?action=login';</script>";
    } else {
        echo "<script>alert('Error al registrar: " . $conexion->error . "'); window.history.back();</script>";
    }

    $stmt_insert->close();
    $conexion->close();
} else {
    header("Location: index.php");
    exit();
}
?>