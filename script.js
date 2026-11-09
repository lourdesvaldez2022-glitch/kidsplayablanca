// Manejo de modales de autenticación en la interfaz del Kids Club

document.addEventListener('DOMContentLoaded', () => {
    // Selección de elementos DOM para modales
    const modalLogin = document.getElementById('modal-login');
    const modalRegister = document.getElementById('modal-register');

    // Botones de apertura
    const btnLoginOpen = document.getElementById('btn-login-open');
    const btnRegisterOpen = document.getElementById('btn-register-open');
    const btnHeroRegister = document.getElementById('btn-hero-register');
    const btnHeroLogin = document.getElementById('btn-hero-login');

    // Botones de cierre
    const closeLogin = document.getElementById('close-login');
    const closeRegister = document.getElementById('close-register');

    // Alternadores entre modales
    const switchToRegister = document.getElementById('switch-to-register');
    const switchToLogin = document.getElementById('switch-to-login');

    // Funciones auxiliares para mostrar y ocultar modales
    const openModal = (modal) => {
        if (modal) modal.classList.add('active');
    };

    const closeModal = (modal) => {
        if (modal) modal.classList.remove('active');
    };

    // Asignación de eventos de apertura
    if (btnLoginOpen) btnLoginOpen.addEventListener('click', () => openModal(modalLogin));
    if (btnHeroLogin) btnHeroLogin.addEventListener('click', () => openModal(modalLogin));

    if (btnRegisterOpen) btnRegisterOpen.addEventListener('click', () => openModal(modalRegister));
    if (btnHeroRegister) btnHeroRegister.addEventListener('click', () => openModal(modalRegister));

    // Asignación de eventos de cierre
    if (closeLogin) closeLogin.addEventListener('click', () => closeModal(modalLogin));
    if (closeRegister) closeRegister.addEventListener('click', () => closeModal(modalRegister));

    // Alternar entre Login y Registro
    if (switchToRegister) {
        switchToRegister.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal(modalLogin);
            openModal(modalRegister);
        });
    }

    if (switchToLogin) {
        switchToLogin.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal(modalRegister);
            openModal(modalLogin);
        });
    }

    // Cerrar modal al hacer clic en el fondo oscuro exterior
    window.addEventListener('click', (event) => {
        if (event.target === modalLogin) closeModal(modalLogin);
        if (event.target === modalRegister) closeModal(modalRegister);
    });
});
    // Detectar si el usuario fue redirigido porque ya tiene cuenta para abrir el modal de login automáticamente
    document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('action') === 'login') {
            const modalLogin = document.getElementById('modal-login');
        if (modalLogin) {
            modalLogin.classList.add('active');
        }
    }
});