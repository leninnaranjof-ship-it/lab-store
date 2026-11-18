// Activa las animaciones de AOS
AOS.init({ duration: 800, once: true });

// Activa el carrusel de Swiper
new Swiper('.swiper', {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 20,
  autoplay: { delay: 3000 },
  pagination: { el: '.swiper-pagination', clickable: true },
  breakpoints: {
    768: { slidesPerView: 2 },
    1100: { slidesPerView: 3 }
  }
});
