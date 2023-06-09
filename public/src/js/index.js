const swiper_main = new Swiper('.swiper.main', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  autoplay: {
    delay: 5000,
  },

  pagination: {
    el: '.swiper-pagination',
  },
  loop: 'true',
  effect: 'fade',
});

const swiper_catalog = new Swiper('.swiper.catalog', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  autoplay: {
    delay: 3000,
  },
  // effect: 'fade',
});

// Рассчет высоты карточек секции о лейбле
let calc_square = (elements, ratio = 1) => {
  elements.forEach(element => {
    element.style.height = Math.round(element.offsetWidth) / ratio + 'px';
  });
}



document.addEventListener('DOMContentLoaded', () => {
  window.addEventListener('resize', () => {
    calc_square(document.querySelectorAll('.cover'));
    calc_square(document.querySelectorAll('.cart_back'));
    calc_square(document.querySelectorAll('.cart_other_music>div>div'), 1.8);
  })

  calc_square(document.querySelectorAll('.cover'));
  calc_square(document.querySelectorAll('.cart_back'));
  calc_square(document.querySelectorAll('.cart_other_music>div>div'), 1.8);
});



