<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>lab. | X-Lab materials of creation</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Swiper (carrusel) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <!-- AOS (animaciones al hacer scroll) -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <!-- Font Awesome (iconos) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Mi CSS -->
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<!-- 1. HEADER con el menu -->
<header class="container py-4">
  <nav class="d-flex justify-content-between align-items-center">
    <b class="mas">+1</b>
    <ul class="menu d-none d-md-flex list-unstyled gap-4 mb-0">
      <li><a href="#inicio">Projects</a></li>
      <li><a href="#galeria">Galería</a></li>
      <li><a href="#productos">Shop</a></li>
      <li><a href="#colecciones">Colecciones</a></li>
      <li><a href="#contacto">Contacto</a></li>
    </ul>
    <a href="admin.php" class="admin-link"><i class="fa-solid fa-bars"></i></a>
  </nav>
</header>

<!-- 2. HERO -->
<section id="inicio" class="container py-5">
  <div class="row align-items-center">
    <div class="col-md-5 mb-4" data-aos="fade-right">
      <h1 class="logo">lab.</h1>
      <p class="vertical-texto">X-LAB MATERIALS OF CREATION</p>
      <p class="numero">001</p>
    </div>
    <div class="col-md-7" data-aos="fade-left">
      <div class="bloque-naranja">
        <img src="img/chaqueta.jpg" class="img-fluid" alt="Chaqueta X-Lab">
        <a href="#productos" class="flecha"><i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- 3. GALERIA con carrusel Swiper -->
<section id="galeria" class="container py-5">
  <h2 class="titulo" data-aos="fade-up">Galería</h2>
  <div class="swiper">
    <div class="swiper-wrapper">
      <!-- dos imagenes con ruta relativa -->
      <div class="swiper-slide"><img src="img/guante.jpg" alt="Guante"></div>
      <div class="swiper-slide"><img src="img/gorro.jpg" alt="Gorro"></div>
      <!-- dos imagenes con ruta absoluta -->
      <div class="swiper-slide"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-46-WBvxw88UsIPwuAfCukRlTeTJEU2_jc6vM54NEmg&s=10" alt="Foto 1"></div>
      <div class="swiper-slide"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeO9PvhGk5kdvdEaLEzdIsaiCf4dX5yAIl9wHQQrWe7w&s=10" alt="Foto 2"></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<!-- 4. PRODUCTOS (vienen de la base de datos) -->
<section id="productos" class="container py-5">
  <h2 class="titulo" data-aos="fade-up">Shop</h2>

  <!-- Formulario con GET: busca productos -->
  <form method="get" action="index.php#productos" class="row g-2 mb-4">
    <div class="col-8 col-md-4">
      <input type="text" name="buscar" class="form-control" placeholder="Buscar producto"
             value="<?= htmlspecialchars($buscar) ?>">
    </div>
    <div class="col-4 col-md-2">
      <button class="btn btn-dark w-100">Buscar</button>
    </div>
  </form>

  <div class="row">
    <?php foreach ($productos as $p): ?>
    <article class="col-md-4 mb-4" data-aos="fade-up">
      <div class="tarjeta">
        <img src="<?= htmlspecialchars($p['imagen']) ?>" class="img-fluid" alt="<?= htmlspecialchars($p['nombre']) ?>">
        <h5 class="mt-3"><?= htmlspecialchars($p['nombre']) ?></h5>
        <p class="precio">$<?= number_format($p['precio'], 0, ',', '.') ?></p>
      </div>
    </article>
    <?php endforeach; ?>

    <?php if (count($productos) === 0): ?>
      <p>No encontramos productos con esa palabra.</p>
    <?php endif; ?>
  </div>
</section>

<!-- 5. COLECCIONES (vienen de la base de datos) -->
<section id="colecciones" class="container py-5">
  <h2 class="titulo" data-aos="fade-up">Colecciones</h2>
  <div class="row">
    <div class="col-md-8">
      <?php foreach ($colecciones as $c): ?>
      <article class="coleccion" data-aos="fade-right">
        <h4><?= htmlspecialchars($c['titulo']) ?></h4>
        <p><?= htmlspecialchars($c['descripcion']) ?></p>
      </article>
      <?php endforeach; ?>
    </div>
    <!-- 6. ASIDE con el guante -->
    <aside class="col-md-4 text-center" data-aos="zoom-in">
      <img src="img/guante.jpg" class="img-fluid guante" alt="Guante negro">
      <p class="mt-2">Survivalist crafted elements</p>
    </aside>
  </div>
</section>

<!-- 7. CONTACTO con formulario POST -->
<section id="contacto" class="container py-5">
  <h2 class="titulo" data-aos="fade-up">Contacto</h2>
  <form method="post" class="row" data-aos="fade-up">
    <div class="col-md-6 mb-3">
      <input name="nombre" class="form-control" placeholder="Nombre" required>
    </div>
    <div class="col-md-6 mb-3">
      <input name="correo" type="email" class="form-control" placeholder="Correo" required>
    </div>
    <div class="col-12 mb-3">
      <textarea name="mensaje" rows="4" class="form-control" placeholder="Mensaje" required></textarea>
    </div>
    <div class="col-12">
      <button class="btn btn-dark">Enviar mensaje</button>
    </div>
  </form>
</section>

<!-- 8. FOOTER -->
<footer class="container py-4 text-center">
  <p class="mb-0">lab. © 2026 · X-Lab materials of creation</p>
</footer>

<!-- Boton flotante de WhatsApp -->
<a href="https://wa.me/573233697003" class="whatsapp" target="_blank">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/main.js"></script>
</body>
</html>
