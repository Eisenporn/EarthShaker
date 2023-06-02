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

const burger_menu = () => {
  const burger = document.querySelector('.burger_menu');
  if (!parent) return false;
  const button_burger = document.querySelector('.burger_buttom');
  const burger_window = document.querySelector('.burger_window');
  const burger_buttom_close = document.querySelector('.burger_buttom_close');


  const burger_show = () => {
    burger.classList.add('active');
    burger_window.classList.add('active');
  };
  const burger_close = () => {
    burger.classList.remove('active');
    burger_window.classList.remove('active');
  };


  burger_buttom_close.addEventListener('click', () => {
    burger_close();

  });
  button_burger.addEventListener('click', () => {
    burger_show();
  });
  document.addEventListener('keydown', (event) => {
    if (event.keyCode === 27) {
      burger_close();
    }
  });
  burger.addEventListener('click', (event) => {
    if (event.target === burger) {
      burger_close();
    }
  });
};

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

  burger_menu();
});



