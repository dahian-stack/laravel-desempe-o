
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#090711">
    <meta name="description" content="MEDIAPRO: creatividad, producción audiovisual e ideas que cobran vida.">
    <title>MEDIAPRO | ImagenesCreativas</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>

<header class="site-header">
    <a class="brand" href="#inicio" aria-label="MEDIAPRO, inicio">
        MEDIA<span>PRO</span>
        <small>IMAGENESCREATIVAS</small>
    </a>

    <nav class="main-nav" aria-label="Navegación principal">
        <a href="#nosotros">Nosotros</a>
        <a href="#servicios">Servicios</a>
        <a href="#portafolio">Portafolio</a>
        <a href="#clientes">Clientes</a>
        <a href="#planes">Planes</a>
        <a href="#contacto">Contacto</a>
    </nav>

    <div class="header-actions">
        <a class="login-link" href="{{ route('login') }}">Iniciar sesión</a>
        <a class="button button-small" href="{{ route('register') }}">
            Registrarse <span>↗</span>
        </a>
    </div>
</header>

<main>

    <!-- =========================
         PORTADA PRINCIPAL
    ========================== -->

    <section class="hero" id="inicio">

        <div class="hero-image"></div>
        <div class="hero-shade"></div>

        <div class="hero-content">

            <p class="eyebrow">
                <span></span>
                IMAGENESCREATIVAS PRESENTA
            </p>

            <h1>
                Donde tus ideas<br>
                cobran <em>vida.</em>
            </h1>

            <p class="hero-copy">
                Creamos experiencias visuales que cuentan historias,
                conectan personas y hacen que cada proyecto deje huella.
            </p>

            <div class="hero-actions">
                <a class="button" href="#portafolio">
                    Explorar proyectos <span>↗</span>
                </a>

                <a class="text-link" href="#nosotros">
                    Conoce MEDIAPRO <span>↓</span>
                </a>
            </div>

        </div>

        <div class="hero-caption">
            <span>01 / 06</span>
            <span>CREATIVIDAD · PRODUCCIÓN · VISIÓN</span>
            <span>MEDELLÍN, COLOMBIA</span>
        </div>

        <a class="scroll-cue" href="#nosotros">
            DESLIZA PARA DESCUBRIR <span>↓</span>
        </a>

    </section>


    <!-- =========================
         NOSOTROS
    ========================== -->

    <section class="intro section-wrap" id="nosotros">

        <div class="section-kicker">01 — NOSOTROS</div>

        <div class="intro-grid">

            <h2>
                Las grandes historias<br>
                merecen ser <em>vistas.</em>
            </h2>

            <div class="intro-copy">

                <p class="lead">
                    En MEDIAPRO transformamos ideas en contenido audiovisual
                    con intención, creatividad y cuidado por cada detalle.
                </p>

                <p>
                    Somos un espacio para imaginar, planear y dar forma a
                    proyectos visuales. Nos mueve contar historias de manera
                    auténtica y encontrar la mejor forma de comunicar cada idea.
                </p>

                <a class="under-link" href="#contacto">
                    Hablemos de tu idea <span>↗</span>
                </a>

            </div>

            <!-- Fotografía independiente de Nosotros -->

            <figure class="intro-image">

                <img
                    src="{{ asset('images/landing/nosotros.jpg') }}"
                    alt="Imagen representativa del equipo y la creatividad de MEDIAPRO"
                >

                <figcaption>
                    <span>IMAGINAR · CREAR · CONTAR</span>
                    <strong>Cada historia comienza con una idea.</strong>
                </figcaption>

            </figure>

        </div>

        <div class="intro-statement">

            <span class="statement-mark">“</span>

            <p>
                No se trata solo de crear imágenes.<br>
                <em>Se trata de provocar algo en quien las mira.</em>
            </p>

            <span class="statement-line"></span>

        </div>

    </section>


    <!-- =========================
         SERVICIOS
    ========================== -->

    <section class="services section-wrap" id="servicios">

        <div class="section-heading">

            <div>
                <div class="section-kicker">02 — LO QUE HACEMOS</div>

                <h2>
                    Ideas que toman <em>forma.</em>
                </h2>
            </div>

            <p>
                Un proceso creativo, distintas maneras de contar tu historia.
            </p>

        </div>

        <div class="service-grid">

            <article class="service-card">
                <span class="service-number">01</span>
                <div class="service-icon">▶</div>
                <h3>Producción de video</h3>
                <p>
                    Grabación y realización audiovisual para comunicar,
                    emocionar y conectar.
                </p>
                <span class="service-arrow">↗</span>
            </article>

            <article class="service-card">
                <span class="service-number">02</span>
                <div class="service-icon">◎</div>
                <h3>Fotografía</h3>
                <p>
                    Imágenes cuidadas para capturar momentos, productos
                    e ideas con personalidad.
                </p>
                <span class="service-arrow">↗</span>
            </article>

            <article class="service-card">
                <span class="service-number">03</span>
                <div class="service-icon">✳</div>
                <h3>Edición y postproducción</h3>
                <p>
                    Montaje, color y ritmo para convertir cada toma
                    en una historia completa.
                </p>
                <span class="service-arrow">↗</span>
            </article>

            <article class="service-card">
                <span class="service-number">04</span>
                <div class="service-icon">✧</div>
                <h3>Animación y motion</h3>
                <p>
                    Recursos gráficos en movimiento que aportan energía
                    y claridad a tu mensaje.
                </p>
                <span class="service-arrow">↗</span>
            </article>

        </div>

    </section>


    <!-- =========================
         PORTAFOLIO
    ========================== -->

    <section class="portfolio section-wrap" id="portafolio">

        <div class="section-heading">

            <div>
                <div class="section-kicker">
                    03 — UNA MIRADA A NUESTRO TRABAJO
                </div>

                <h2>
                    Pequeñas muestras,<br>
                    <em>grandes historias.</em>
                </h2>
            </div>

            <p>
                Una selección visual recuperada de nuestro proyecto
                creativo anterior.
            </p>

        </div>

        <div class="portfolio-grid">

            <figure class="portfolio-item portfolio-large">
                <img
                    src="{{ asset('images/landing/medellin.jpg') }}"
                    alt="Vista urbana de Medellín"
                >
                <figcaption>
                    <span>01 / FOTOGRAFÍA</span>
                    <strong>Ciudad en movimiento</strong>
                </figcaption>
            </figure>

            <figure class="portfolio-item">
                <img
                    src="{{ asset('images/landing/flor.jpg') }}"
                    alt="Detalle fotográfico de una flor"
                >
                <figcaption>
                    <span>02 / DETALLE</span>
                    <strong>La belleza está cerca</strong>
                </figcaption>
            </figure>

            <figure class="portfolio-item">
                <img
                    src="{{ asset('images/landing/metro.jpg') }}"
                    alt="Metro de Medellín"
                >
                <figcaption>
                    <span>03 / CIUDAD</span>
                    <strong>Ritmo urbano</strong>
                </figcaption>
            </figure>

            <figure class="portfolio-item">
                <img
                    src="{{ asset('images/landing/dibujos.jpg') }}"
                    alt="Ilustraciones y dibujos"
                >
                <figcaption>
                    <span>04 / CREATIVIDAD</span>
                    <strong>Ideas en papel</strong>
                </figcaption>
            </figure>

            <figure class="portfolio-item">
                <img
                    src="{{ asset('images/landing/piroctenia.jpg') }}"
                    alt="Fuegos artificiales iluminando el cielo"
                >
                <figcaption>
                    <span>05 / EVENTOS</span>
                    <strong>Instantes que brillan</strong>
                </figcaption>
            </figure>

        </div>

        <p class="portfolio-note">
            Las imágenes son material de muestra; esta sección podrá
            actualizarse con proyectos y trabajos reales.
        </p>

    </section>


    <!-- =========================
         CLIENTES Y TESTIMONIOS
    ========================== -->

    <section class="clients section-wrap" id="clientes">

        <div class="section-kicker">04 — CONEXIONES</div>

        <div class="clients-content">

            <h2>
                Las historias se crean<br>
                <em>en equipo.</em>
            </h2>

            <div>

                <p class="lead">
                    Cada proyecto comienza con una conversación y crece
                    gracias a las personas que lo hacen posible.
                </p>

                <p>
                    Queremos construir relaciones creativas basadas en
                    la confianza, las buenas ideas y el trabajo colaborativo.
                </p>

            </div>

        </div>

        <div class="client-strip">
            <span>IDEAS</span>
            <b>✳</b>
            <span>PERSONAS</span>
            <b>✳</b>
            <span>HISTORIAS</span>
            <b>✳</b>
            <span>COLABORACIÓN</span>
        </div>

        <!-- Testimonios de ejemplo -->

        <div class="testimonial-heading">

            <span>VOCES CREATIVAS</span>

            <p>
                Los siguientes testimonios son ejemplos ilustrativos
                del formato de presentación. No corresponden a opiniones
                verificadas de clientes reales.
            </p>

        </div>

        <div class="testimonial-grid">

            <article class="testimonial-card">

                <span class="testimonial-quote">“</span>

                <p>
                    La creatividad y la atención a los detalles hacen
                    que cada idea se convierta en algo especial.
                    ¡Un proceso lleno de inspiración!
                </p>

                <div class="testimonial-author">

                    <span class="author-avatar">LM</span>

                    <div>
                        <strong>Laura M.</strong>
                        <small>Emprendimiento creativo</small>
                    </div>

                </div>

                <span class="testimonial-example">
                    TESTIMONIO DE EJEMPLO
                </span>

            </article>


            <article class="testimonial-card">

                <span class="testimonial-quote">“</span>

                <p>
                    Una buena historia merece una gran producción.
                    La combinación de ideas, planificación y cuidado
                    visual marca la diferencia.
                </p>

                <div class="testimonial-author">

                    <span class="author-avatar">AR</span>

                    <div>
                        <strong>Andrés R.</strong>
                        <small>Proyecto cultural</small>
                    </div>

                </div>

                <span class="testimonial-example">
                    TESTIMONIO DE EJEMPLO
                </span>

            </article>


            <article class="testimonial-card">

                <span class="testimonial-quote">“</span>

                <p>
                    Encontrar una manera auténtica de comunicar lo que
                    hacemos es fundamental. ¡Las buenas ideas siempre
                    merecen ser contadas!
                </p>

                <div class="testimonial-author">

                    <span class="author-avatar">CP</span>

                    <div>
                        <strong>Camila P.</strong>
                        <small>Marca independiente</small>
                    </div>

                </div>

                <span class="testimonial-example">
                    TESTIMONIO DE EJEMPLO
                </span>

            </article>

        </div>

    </section>


    <!-- =========================
         PLANES
    ========================== -->

    <section class="pricing section-wrap" id="planes">

        <div class="section-heading">

            <div>
                <div class="section-kicker">05 — FORMAS DE CREAR</div>

                <h2>
                    Un plan para cada <em>idea.</em>
                </h2>
            </div>

            <p>
                Paquetes de referencia que podemos ajustar según
                el alcance de cada producción.
            </p>

        </div>

        <div class="pricing-grid">

            <article class="price-card">

                <span class="price-label">PARA EMPEZAR</span>

                <h3>Esencial</h3>

                <p class="price-desc">
                    Una solución sencilla para darle forma a una idea puntual.
                </p>

                <ul>
                    <li>Una pieza audiovisual breve</li>
                    <li>Edición básica</li>
                    <li>Una ronda de ajustes</li>
                    <li>Entrega digital</li>
                </ul>

                <a href="#contacto" class="price-link">
                    Consultar este plan ↗
                </a>

            </article>


            <article class="price-card price-featured">

                <span class="featured-tag">MÁS COMPLETO</span>

                <span class="price-label">PARA CRECER</span>

                <h3>Profesional</h3>

                <p class="price-desc">
                    Más recursos y acompañamiento para contar
                    una historia completa.
                </p>

                <ul>
                    <li>Producción y grabación</li>
                    <li>Edición y corrección de color</li>
                    <li>Hasta tres rondas de ajustes</li>
                    <li>Adaptaciones para redes</li>
                </ul>

                <a href="#contacto" class="price-link">
                    Consultar este plan ↗
                </a>

            </article>


            <article class="price-card">

                <span class="price-label">PARA GRANDES IDEAS</span>

                <h3>Integral</h3>

                <p class="price-desc">
                    Una propuesta personalizada para proyectos
                    de mayor alcance.
                </p>

                <ul>
                    <li>Planificación creativa</li>
                    <li>Video y fotografía</li>
                    <li>Edición y animación</li>
                    <li>Acompañamiento personalizado</li>
                </ul>

                <a href="#contacto" class="price-link">
                    Consultar este plan ↗
                </a>

            </article>

        </div>

        <p class="portfolio-note">
            Los paquetes y sus características son referenciales.
            No se publican tarifas hasta definir precios reales.
        </p>

    </section>


    <!-- =========================
         CONTACTO
    ========================== -->

    <section class="contact section-wrap" id="contacto">

        <div class="contact-panel">

            <div class="section-kicker">
                06 — HAGAMOS ALGO INCREÍBLE
            </div>

            <h2>
                Tu próxima historia<br>
                empieza con una <em>idea.</em>
            </h2>

            <p>
                Cuéntanos qué tienes en mente. En MEDIAPRO estamos
                listos para explorar nuevas posibilidades contigo.
            </p>

            <div class="contact-actions">

                <a class="button" href="{{ route('register') }}">
                    Crear una cuenta <span>↗</span>
                </a>

                <a class="text-link" href="{{ route('login') }}">
                    Ya tengo una cuenta
                </a>

            </div>

        </div>

        <div class="contact-orb" aria-hidden="true"></div>

    </section>

</main>


<!-- =========================
     PIE DE PÁGINA
========================== -->

<footer class="site-footer">

    <a class="brand" href="#inicio">
        MEDIA<span>PRO</span>
        <small>IMAGENESCREATIVAS</small>
    </a>

    <p>Donde tus ideas cobran vida.</p>

    <div class="footer-links">
        <a href="#nosotros">Nosotros</a>
        <a href="#servicios">Servicios</a>
        <a href="#portafolio">Portafolio</a>
        <a href="#planes">Planes</a>
        <a href="#contacto">Contacto</a>
    </div>

    <div class="footer-bottom">
        <span>© {{ date('Y') }} ImagenesCreativas · MEDIAPRO</span>
        <a href="#inicio">Volver arriba ↑</a>
    </div>

</footer>

</body>
</html>
