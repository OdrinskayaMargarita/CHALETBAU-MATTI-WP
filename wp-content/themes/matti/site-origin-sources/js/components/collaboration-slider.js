import Swiper from 'swiper/bundle';

export default () => {
  let imgSlider = new Swiper('.collaboration__slider', {
    speed:800, 
    parallax: true,
    navigation: {
      nextEl: '.collaboration__slider .swiper-button-next',
      prevEl: '.collaboration__slider .swiper-button-prev',
    },
  });
};
