<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Club - Hotel Resort Management</title>
    <!-- Iconos FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Hojas de Estilos CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header / Barra de Navegación -->
    <header class="navbar">
        <div class="logo">
            <i class="fa-solid fa-child-reaching"></i>
            <span>Kids<strong>Club</strong></span>
        </div>
        <nav class="nav-links">
            <a href="#inicio" class="active">Inicio</a>
            <a href="horarios.php">Horarios</a>
            <a href="actividades.php">Actividades</a>
            <a href="#personal">Personal</a>
            <a href="#contacto">Contacto</a>
        </nav>
        <div class="auth-buttons">
            <button class="btn btn-outline" id="btn-login-open">
                <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión
            </button>
            <button class="btn btn-primary" id="btn-register-open">
                <i class="fa-solid fa-user-plus"></i> Registrarse
            </button>
        </div>
    </header>

    <!-- Sección Hero (Principal) -->
    <section class="hero-section" id="inicio">
        <div class="hero-content">
            <span class="badge"><i class="fa-solid fa-sparkles"></i> Área de Animación Infantil</span>
            <h1>Diversión Segura para los Más Pequeños</h1>
            <p>
                Gestión, registro, control de asistencia y seguimiento en tiempo real para las actividades del Kids Club.
            </p>
            <div class="hero-actions">
                <button class="btn btn-primary btn-large" id="btn-hero-register">
                    Registrar a mi Hijo / Tutor <i class="fa-solid fa-arrow-right"></i>
                </button>
                <button class="btn btn-secondary btn-large" id="btn-hero-login">
                    Acceso Personal / Padres
                </button>
            </div>
        </div>
        <div class="hero-card" style="padding: 10px; background: transparent; box-shadow: none; display: flex; justify-content: center; align-items: center;">
            <img src="https://image-tc.galaxy.tf/wijpeg-8jh7lb2che8feahx2fyb2chey/whatsapp-image-2026-08-14-at-4-46-15-pm-1_standard.jpg?crop=0%2C400%2C1066%2C800" alt="Kids Club Hotel" style="width: 100%; max-height: 350px; object-fit: cover; border-radius: 14px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
        </div>
    </section>

    <!-- Sección de Funcionalidades Rápidas -->
    <section class="features-section">
        <div class="feature-box">
            <i class="fa-solid fa-shield-halved"></i>
            <h3>Seguridad Garantizada</h3>
            <p>Control estricto de entrada y salida con código de verificación para personas autorizadas.</p>
        </div>
        <div class="feature-box">
            <i class="fa-solid fa-calendar-days"></i>
            <h3>Actividades Diarias</h3>
            <p>Talleres, juegos en piscina, manualidades y mini disco con horarios organizados por edades.</p>
        </div>
        <div class="feature-box">
            <i class="fa-solid fa-bell"></i>
            <h3>Notificaciones</h3>
            <p>Avisos en tiempo real para los padres sobre la estancia, asistencia y eventos especiales.</p>
        </div>
    </section>

    <!-- Sección Equipo de Personal / Animadores -->
    <section class="team-section" id="personal">
        <div class="section-header">
            <h2>Nuestro Equipo de Animación</h2>
            <p>Personal certificado y altamente capacitado para el cuidado y entretenimiento de los niños</p>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar">
                    <i class="fa-solid fa-user-ninja"></i>
                </div>
                <h3>Recreadores Certificados</h3>
                <p>Especialistas en dinámicas de grupo, juegos al aire libre y actividades acuáticas.</p>
            </div>
            <div class="team-card">
                <div class="team-avatar">
                    <i class="fa-solid fa-user-nurse"></i>
                </div>
                <h3>Primeros Auxilios</h3>
                <p>Personal entrenado para responder con rapidez y seguridad ante cualquier eventualidad.</p>
            </div>
            <div class="team-card">
                <div class="team-avatar">
                    <i class="fa-solid fa-palette"></i>
                </div>
                <h3>Talleres Creativos</h3>
                <p>Instructores dedicados a manualidades, pintura, teatro y desarrollo artístico.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Contacto e Información -->
    <section class="contact-section" id="contacto">
        <div class="contact-container">
            <div class="contact-info">
                <h2>¿Tienes dudas sobre el Kids Club?</h2>
                <p>Contáctanos directamente con el departamento de animación o acércate a la recepción del hotel.</p>
                <ul>
                    <li><i class="fa-solid fa-clock"></i> Horario de Atención: 09:30 AM - 06:00 PM</li>
                    <li><i class="fa-solid fa-phone"></i> Extensión Interna: #4050</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Modal de Inicio de Sesión -->
    <div class="modal" id="modal-login">
        <div class="modal-content">
            <button class="modal-close" id="close-login">&times;</button>
            <div class="modal-header">
                <i class="fa-solid fa-circle-user"></i>
                <h2>Iniciar Sesión</h2>
                <p>Ingresa a tu cuenta de Kids Club</p>
            </div>
            <form id="form-login" action="login.php" method="POST">
                <div class="form-group">
                    <label for="login-email"><i class="fa-solid fa-envelope"></i> Correo Electrónico</label>
                    <input type="email" id="login-email" name="email" placeholder="ejemplo@correo.com" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="login-password"><i class="fa-solid fa-lock"></i> Contraseña</label>
                    <input type="password" id="login-password" name="password" placeholder="••••••••" required autocomplete="current-password">
                </div>
                <div class="form-options">
                    <label><input type="checkbox" name="recordar"> Recordarme</label>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </form>
            <div class="modal-footer">
                ¿No tienes una cuenta? <a href="#" id="switch-to-register">Regístrate aquí</a>
            </div>
        </div>
    </div>

    <!-- Modal de Registro -->
    <div class="modal" id="modal-register">
        <div class="modal-content">
            <button class="modal-close" id="close-register">&times;</button>
            <div class="modal-header">
                <i class="fa-solid fa-user-plus"></i>
                <h2>Registro de Personal</h2>
                <p>Regístrese como Personal de Animación del Kids Club</p>
            </div>
            <form id="form-register" action="procesar_registro.php" method="POST">
                <input type="hidden" name="rol" value="personal">
                <div class="form-group">
                    <label for="reg-name"><i class="fa-solid fa-user"></i> Nombre Completo</label>
                    <input type="text" id="reg-name" name="nombre" placeholder="Juan Pérez" required autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="reg-email"><i class="fa-solid fa-envelope"></i> Correo Electrónico</label>
                    <input type="email" id="reg-email" name="email" placeholder="ejemplo@correo.com" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="reg-password"><i class="fa-solid fa-lock"></i> Contraseña</label>
                    <input type="password" id="reg-password" name="password" placeholder="••••••••" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Completar Registro</button>
            </form>
            <div class="modal-footer">
                ¿Ya tienes una cuenta? <a href="#" id="switch-to-login">Inicia Sesión</a>
            </div>
        </div>
    </div>

    <!-- Modal de Registro / Control de Entrada y Salida (Actualizado) -->
    <div class="modal" id="modal-inscripcion">
        <div class="modal-content" style="max-width: 600px;">
            <button class="modal-close" id="close-inscripcion">&times;</button>
            <div class="modal-header">
                <i class="fa-solid fa-clipboard-user" style="font-size: 32px; color: #4f46e5; margin-bottom: 5px;"></i>
                <h2>Control de Entrada / Salida</h2>
                <p>Registro de asistencia y autorización en el Kids Club</p>
            </div>

            <form action="procesar_control.php" method="POST">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px; text-align: left;">
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Cédula del Tutor</label>
                        <input type="text" name="cedula" placeholder="Ej. 8-123-456" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Teléfono</label>
                        <input type="tel" name="telefono" placeholder="Ej. 6000-0000" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 12px; text-align: left;">
                    <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Nombre y Apellido del Padre / Tutor</label>
                    <input type="text" name="nombre_tutor" placeholder="Ej. Carlos Pérez" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 12px; margin-bottom: 12px; text-align: left;">
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Nombre y Apellido del Niño/a</label>
                        <input type="text" name="nombre_nino" placeholder="Ej. Mateo Pérez" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Edad</label>
                        <input type="number" name="edad" min="1" max="17" placeholder="Ej. 7" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px; text-align: left;">
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">No. de Habitación</label>
                        <input type="text" name="habitacion" placeholder="Ej. 304" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Firma (Autorización)</label>
                        <input type="text" name="firma" placeholder="Escriba su nombre como firma" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; text-align: left;">
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Hora de Entrada</label>
                        <input type="time" name="hora_entrada" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px; color: #334155;">Hora de Salida</label>
                        <input type="time" name="hora_salida" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="width: 100%; padding: 12px; font-size: 15px; cursor: pointer;">Registrar Asistencia</button>
            </form>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2026 Hotel Resort Management - Kids Club. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Script de JavaScript -->
    <script src="script.js"></script>
    <script>
        // Funcionalidad para abrir y cerrar el modal con el botón principal
        const btnHeroRegister = document.getElementById('btn-hero-register');
        const modalInscripcion = document.getElementById('modal-inscripcion');
        const closeInscripcion = document.getElementById('close-inscripcion');

        if (btnHeroRegister && modalInscripcion) {
            btnHeroRegister.addEventListener('click', () => {
                modalInscripcion.style.display = 'flex';
            });
        }

        if (closeInscripcion && modalInscripcion) {
            closeInscripcion.addEventListener('click', () => {
                modalInscripcion.style.display = 'none';
            });
        }

        window.addEventListener('click', (e) => {
            if (e.target === modalInscripcion) {
                modalInscripcion.style.display = 'none';
            }
        });
    </script>
</body>
</html>