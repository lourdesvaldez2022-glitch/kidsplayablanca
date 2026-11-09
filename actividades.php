<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma de Actividades - Kids Club</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .schedule-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .schedule-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .schedule-header h2 {
            font-size: 32px;
            color: #1e1b4b;
            margin-bottom: 10px;
        }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
        }
        .day-card {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            overflow: hidden;
            border-top: 5px solid #4f46e5;
            transition: transform 0.2s ease;
        }
        .day-card:hover {
            transform: translateY(-5px);
        }
        .day-header {
            background: #f8fafc;
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .day-header h3 {
            margin: 0;
            color: #1e1b4b;
            font-size: 20px;
        }
        .day-header i {
            color: #020202;
            font-size: 20px;
        }
        .activity-list {
            padding: 15px 20px;
            list-style: none;
            margin: 0;
        }
        .activity-item {
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px dashed #f1f5f9;
        }
        .activity-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .activity-time {
            font-size: 12px;
            font-weight: 700;
            color: #050404;
            text-transform: uppercase;
            margin-bottom: 3px;
        }
        .activity-name {
            font-size: 14px;
            color: #334155;
            font-weight: 600;
        }
        .lunch-badge {
            background: #f3bfdd;
            color: #0e0d0d;
            text-align: center;
            font-weight: bold;
            padding: 8px;
            font-size: 13px;
            letter-spacing: 1px;
            margin: 10px 0;
            border-radius: 6px;
        }
    </style>
</head>
<body>

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
            <a href="index.php" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
        </div>
    </header>

    <div class="schedule-container">
        <div class="schedule-header">
            <h2><i class="fa-solid fa-calendar-days" style="color: #4f46e5;"></i> Cronograma Semanal del Kids Club</h2>
            <p>Descubre las actividades y talleres organizados para cada día de la semana.</p>
        </div>

        <div class="cards-grid">
            
            <!-- LUNES -->
            <div class="day-card">
                <div class="day-header">
                    <h3>Lunes</h3>
                    <i class="fa-solid fa-sun"></i>
                </div>
                <ul class="activity-list">
                    <li class="activity-item"><div class="activity-time">09:30 AM</div><div class="activity-name">Taller de Estiramiento</div></li>
                    <li class="activity-item"><div class="activity-time">10:30 AM</div><div class="activity-name">Pintura Corporal</div></li>
                    <li class="activity-item"><div class="activity-time">11:30 AM</div><div class="activity-name">Logística / Juegos Musicales</div></li>
                    <div class="lunch-badge">ALMUERZO</div>
                    <li class="activity-item"><div class="activity-time">01:30 PM</div><div class="activity-name">Taller de Arte</div></li>
                    <li class="activity-item"><div class="activity-time">02:30 PM</div><div class="activity-name">Cuentos Animados</div></li>
                    <li class="activity-item"><div class="activity-time">03:30 PM</div><div class="activity-name">Actividades Acuáticas / Piscina</div></li>
                    <li class="activity-item"><div class="activity-time">04:30 PM</div><div class="activity-name">Aqua-danza / Juegos de Agua</div></li>
                    <li class="activity-item"><div class="activity-time">05:30 PM</div><div class="activity-name">Paseo Playa Blanca / Cierre</div></li>
                </ul>
            </div>

            <!-- MARTES -->
            <div class="day-card" style="border-top-color: #0284c7;">
                <div class="day-header">
                    <h3>Martes</h3>
                    <i class="fa-solid fa-water"></i>
                </div>
                <ul class="activity-list">
                    <li class="activity-item"><div class="activity-time">09:30 AM</div><div class="activity-name">Taller de Origami</div></li>
                    <li class="activity-item"><div class="activity-time">10:30 AM</div><div class="activity-name">Pintura en Tela / Imaginación</div></li>
                    <li class="activity-item"><div class="activity-time">11:30 AM</div><div class="activity-name">Manualidades con Concha</div></li>
                    <div class="lunch-badge">ALMUERZO</div>
                    <li class="activity-item"><div class="activity-time">01:30 PM</div><div class="activity-name">Crea tu Mascarilla / Títeres</div></li>
                    <li class="activity-item"><div class="activity-time">02:30 PM</div><div class="activity-name">La Pipa / Cuentos</div></li>
                    <li class="activity-item"><div class="activity-time">03:30 PM</div><div class="activity-name">Competencias en Piscina</div></li>
                    <li class="activity-item"><div class="activity-time">04:30 PM</div><div class="activity-name">Juegos Libres con Agua</div></li>
                    <li class="activity-item"><div class="activity-time">05:30 PM</div><div class="activity-name">Dinámicas de Grupo / Despedida</div></li>
                </ul>
            </div>

            <!-- MIÉRCOLES -->
            <div class="day-card" style="border-top-color: #16a34a;">
                <div class="day-header">
                    <h3>Miércoles</h3>
                    <i class="fa-solid fa-palette"></i>
                </div>
                <ul class="activity-list">
                    <li class="activity-item"><div class="activity-time">09:30 AM</div><div class="activity-name">Taller de Dibujo Artístico</div></li>
                    <li class="activity-item"><div class="activity-time">10:30 AM</div><div class="activity-name">El Escapista / Destreza</div></li>
                    <li class="activity-item"><div class="activity-time">11:30 AM</div><div class="activity-name">Memorama / Lotería</div></li>
                    <div class="lunch-badge">ALMUERZO</div>
                    <li class="activity-item"><div class="activity-time">01:30 PM</div><div class="activity-name">Chef en Casa / Mini Chef</div></li>
                    <li class="activity-item"><div class="activity-time">02:30 PM</div><div class="activity-name">Juguete Viajero</div></li>
                    <li class="activity-item"><div class="activity-time">03:30 PM</div><div class="activity-name">Aquagym / Piscina</div></li>
                    <li class="activity-item"><div class="activity-time">04:30 PM</div><div class="activity-name">Circuito de Agua</div></li>
                    <li class="activity-item"><div class="activity-time">05:30 PM</div><div class="activity-name">Juegos Lúdicos / Recreativos</div></li>
                </ul>
            </div>

            <!-- JUEVES -->
            <div class="day-card" style="border-top-color: #d97706;">
                <div class="day-header">
                    <h3>Jueves</h3>
                    <i class="fa-solid fa-puzzle-piece"></i>
                </div>
                <ul class="activity-list">
                    <li class="activity-item"><div class="activity-time">09:30 AM</div><div class="activity-name">Taller de Dibujo Artístico</div></li>
                    <li class="activity-item"><div class="activity-time">10:30 AM</div><div class="activity-name">Juego de Bolos</div></li>
                    <li class="activity-item"><div class="activity-time">11:30 AM</div><div class="activity-name">Juego 1,2,3 / Pankyzoo Animado</div></li>
                    <div class="lunch-badge">ALMUERZO</div>
                    <li class="activity-item"><div class="activity-time">01:30 PM</div><div class="activity-name">Estatuas Musicales</div></li>
                    <li class="activity-item"><div class="activity-time">02:30 PM</div><div class="activity-name">Juego de la Silla / Talentos</div></li>
                    <li class="activity-item"><div class="activity-time">03:30 PM</div><div class="activity-name">Tarde de Piscina / Juegos</div></li>
                    <li class="activity-item"><div class="activity-time">04:30 PM</div><div class="activity-name">Relevos en Agua</div></li>
                    <li class="activity-item"><div class="activity-time">05:30 PM</div><div class="activity-name">Juegos con Pelota al Aire Libre</div></li>
                </ul>
            </div>

            <!-- VIERNES -->
            <div class="day-card" style="border-top-color: #9333ea;">
                <div class="day-header">
                    <h3>Viernes</h3>
                    <i class="fa-solid fa-star"></i>
                </div>
                <ul class="activity-list">
                    <li class="activity-item"><div class="activity-time">09:30 AM</div><div class="activity-name">Obra Manual (Pintura / Afuera)</div></li>
                    <li class="activity-item"><div class="activity-time">10:30 AM</div><div class="activity-name">Juego de Pirámides de Vasos</div></li>
                    <li class="activity-item"><div class="activity-time">11:30 AM</div><div class="activity-name">Bingo / Juegos de Mesa</div></li>
                    <div class="lunch-badge">ALMUERZO</div>
                    <li class="activity-item"><div class="activity-time">01:30 PM</div><div class="activity-name">Coreografías y Baile</div></li>
                    <li class="activity-item"><div class="activity-time">02:30 PM</div><div class="activity-name">Concurso de Disfraces</div></li>
                    <li class="activity-item"><div class="activity-time">03:30 PM</div><div class="activity-name">Fiesta en la Piscina / Clavados</div></li>
                    <li class="activity-item"><div class="activity-time">04:30 PM</div><div class="activity-name">Pintacaritas / Juegos Libres</div></li>
                    <li class="activity-item"><div class="activity-time">05:30 PM</div><div class="activity-name">Juego Loco / Cierre de Semana</div></li>
                </ul>
            </div>

            <!-- SÁBADO Y DOMINGO (FIN DE SEMANA) -->
            <div class="day-card" style="border-top-color: #0d9488;">
                <div class="day-header">
                    <h3>Fines de Semana</h3>
                    <i class="fa-solid fa-umbrella-beach"></i>
                </div>
                <ul class="activity-list">
                    <li class="activity-item"><div class="activity-time">09:30 AM</div><div class="activity-name">Juego Libre Dirigido</div></li>
                    <li class="activity-item"><div class="activity-time">10:30 AM</div><div class="activity-name">Manualidades Creativas</div></li>
                    <li class="activity-item"><div class="activity-time">11:30 AM</div><div class="activity-name">Dinámicas al Aire Libre</div></li>
                    <div class="lunch-badge">ALMUERZO</div>
                    <li class="activity-item"><div class="activity-time">01:30 PM</div><div class="activity-name">Juegos de Mesa</div></li>
                    <li class="activity-item"><div class="activity-time">02:30 PM</div><div class="activity-name">Competencias Grupales</div></li>
                    <li class="activity-item"><div class="activity-time">03:30 PM</div><div class="activity-name">Piscina Recreativa</div></li>
                    <li class="activity-item"><div class="activity-time">04:30 PM</div><div class="activity-name">Juego con Agua</div></li>
                    <li class="activity-item"><div class="activity-time">05:30 PM</div><div class="activity-name">Cierre de Actividades</div></li>
                </ul>
            </div>

        </div>
    </div>

    <footer class="footer" style="margin-top: 40px;">
        <div class="footer-content">
            <p>&copy; 2026 Hotel Resort Management - Kids Club. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>