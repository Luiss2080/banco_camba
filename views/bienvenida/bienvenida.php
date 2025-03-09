<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco Mercantil</title>
    <!-- Enlace a la hoja de estilos principal -->
    <link rel="stylesheet" href="assets/css/styleBienvenida.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Título con fondo verde y elementos decorativos - ALTURA REDUCIDA -->
    <div class="titulo-valores-container">
        <div class="decoracion-izq"></div>
        <div class="decoracion-der"></div>
        
        <div class="titulo-content">
            <div class="titulo-icon"><i class="fas fa-university"></i></div>
            <h2 class="valores-heading">NUESTROS VALORES</h2>
            <div class="titulo-decoration">
                <span class="titulo-line"></span>
                <i class="fas fa-star"></i>
                <span class="titulo-line"></span>
            </div>
            <p class="valores-descripcion">Los pilares que guían nuestra misión de servicio</p>
        </div>
    </div>

    <!-- Sección de iconos/tarjetas - ALTURA REDUCIDA -->
    <div class="icons-section">
        <div class="movie-grid">
            <!-- Tarjeta 1: Liderazgo -->
            <div class="movie-card">
                <img src="/BANCO_CAMBA/assets/img/Liderazgo.jpg" alt="Icono Liderazgo">
                <div class="card-overlay">
                    <h3 class="card-title">Liderazgo</h3>
                    <p class="card-description">"Ser reconocidos como el mejor banco financiero."</p>
                </div>
            </div>

            <!-- Tarjeta 2: Servicio al cliente -->
            <div class="movie-card">
                <img src="/BANCO_CAMBA/assets/img/servicio.jpg" alt="Icono Servicio al cliente">
                <div class="card-overlay">
                    <h3 class="card-title">Servicio al cliente</h3>
                    <p class="card-description">"Satisfacer las expectativas de nuestros clientes"</p>
                </div>
            </div>

            <!-- Tarjeta 3: Calidad y confiabilidad -->
            <div class="movie-card">
                <img src="/BANCO_CAMBA/assets/img/calidad_confiabilidad.jpeg" alt="Icono Calidad y confiabilidad">
                <div class="card-overlay">
                    <h3 class="card-title">Confiabilidad</h3>
                    <p class="card-description">"Cumplir eficientemente con los compromisos pactados."</p>
                </div>
            </div>

            <!-- Tarjeta 4: Integridad -->
            <div class="movie-card">
                <img src="/BANCO_CAMBA/assets/img/integridad.jpeg" alt="Icono Integridad">
                <div class="card-overlay">
                    <h3 class="card-title">Integridad</h3>
                    <p class="card-description">"Actuar con honestidad, lealtad y ética profesional"</p>
                </div>
            </div>

            <!-- Tarjeta 5: Excelencia y profesionalismo -->
            <div class="movie-card">
                <img src="/BANCO_CAMBA/assets/img/excelencia_profesionalismo.jpeg" alt="Icono Excelencia y profesionalismo">
                <div class="card-overlay">
                    <h3 class="card-title">Profesionalismo</h3>
                    <p class="card-description">"Desempeñar una gestión sobresaliente"</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de cierre mejorada - ALTURA REDUCIDA -->
    <div class="cierre-bienvenida-mejorado">
        <div class="separador-decorativo-animado">
            <span class="linea-animada"></span>
            <span class="emoji-animado"><i class="fas fa-handshake"></i></span>
            <span class="linea-animada"></span>
        </div>
        
        <div class="mensaje-compromiso-mejorado">
            <h3 class="titulo-compromiso">NUESTRO COMPROMISO CONTIGO</h3>
            <p class="subtitulo-compromiso">Te acompañamos en cada paso de tu camino financiero</p>
            



 <!-- Insertar los iconos de compromiso aquí -->
 <div class="compromiso-iconos-fila">
        <div class="compromiso-icono-item">
            <i class="fas fa-headset"></i>
            <span>Soporte 24/7</span>
        </div>
        <div class="compromiso-icono-item">
            <i class="fas fa-shield-alt"></i>
            <span>Máxima seguridad</span>
        </div>
        <div class="compromiso-icono-item">
            <i class="fas fa-handshake"></i>
            <span>Asesoría experta</span>
        </div>
        <div class="compromiso-icono-item">
            <i class="fas fa-mobile-alt"></i>
            <span>Banca móvil</span>
        </div>
    </div>



            <div class="compromiso-detalles">
                <div class="compromiso-item">
                    <i class="fa fa-check-circle"></i>
                    <span>Atención personalizada</span>
                </div>
                <div class="compromiso-item">
                    <i class="fa fa-lock"></i>
                    <span>Seguridad garantizada</span>
                </div>
                <div class="compromiso-item">
                    <i class="fa fa-chart-line"></i>
                    <span>Crecimiento sostenible</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer con fondo verde - ALTURA REDUCIDA -->
    <div class="footer-bienvenida-mejorado">
        <p>
            © 2025 Banco Mercantil Santa Cruz S.A. | 
            <a href="#" class="footer-link">Términos y Condiciones</a> | 
            <a href="#" class="footer-link">Política de Privacidad</a> |
            <span class="version-info">Versión: 1.0.0</span>
        </p>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para animar elementos al hacer scroll
        function animateOnScroll() {
            const cards = document.querySelectorAll('.movie-card');
            cards.forEach((card, index) => {
                const rect = card.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;
                
                if (isVisible) {
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }
        
        // Iniciar animaciones al cargar
        animateOnScroll();
        window.addEventListener('scroll', animateOnScroll);
    });
    </script>
</body>
</html>