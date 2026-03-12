// =====================================================
// Script PCCURICO.CL - Scroll to Top y Carruseles
// Compatible con Elementor Pro y WooCommerce
// =====================================================

// ===== Scroll to Top =====
window.onscroll = function() {
  const scrollTopBtn = document.querySelector('.scroll-top-box');
  if (scrollTopBtn) {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      scrollTopBtn.style.display = "block";
    } else {
      scrollTopBtn.style.display = "none";
    }
  }
};

const scrollTopLink = document.querySelector('.scroll-top-box a');
if (scrollTopLink) {
  scrollTopLink.onclick = function(event) {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
}

// ===== Carrusel Cursos =====
jQuery(document).ready(function($){
  $('.courses-sec .owl-carousel').owlCarousel({
    margin: 20,
    nav: false,
    dots: false,
    loop: true,
    autoplay: false,
    lazyLoad: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    mouseDrag: true,
    responsive: {
      0: { items: 1 },
      600: { items: 2 },
      1024: { items: 3 },
      1200: { items: 3 }
    }
  });
});

// ===== Carrusel Contadores =====
jQuery(document).ready(function($){
  $('.counter-sec .owl-carousel').owlCarousel({
    margin: 20,
    nav: false,
    dots: false,
    loop: true,
    autoplay: false,
    lazyLoad: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    mouseDrag: true,
    responsive: {
      0: { items: 1 },
      600: { items: 3 },
      1024: { items: 3 },
      1200: { items: 5 }
    }
  });
});

// ===== Últimos Posts Blog =====
jQuery(document).ready(function($){
  $('.blog-section .owl-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    rtl: false,
    autoplay: false,
    responsive: {
      0: { items: 1 },
      600: { items: 2 },
      1024: { items: 3 },
      1200: { items: 3 }
    }
  });
});