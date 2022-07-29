import Swiper from 'swiper/bundle';

export default () => {
  let imgSlider = new Swiper('.full-image-slider__container', {
    // effect: "fade",
    speed: 1000,
    parallax: true,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
      stopOnLastSlide: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: '.full-image-slider__container .swiper-button-next',
      prevEl: '.full-image-slider__container .swiper-button-prev',
    },
  });
};
