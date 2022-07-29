import Swiper from 'swiper/bundle';

export default () => {
  const sliderPrefix = 'carousel__';
  let sliderEl = document.querySelector(`.${sliderPrefix}slider`);

  if (sliderEl) {
    let slidesCount = document.querySelectorAll(`.${sliderPrefix}slide`).length;
    // let bar = document.querySelector('.carousel__progress-bar');
    // let barWidth = 100/slidesCount;
    // bar.style.width = barWidth+'%';

    let slider = new Swiper(sliderEl, {
      wrapperClass: `${sliderPrefix}slider-wrapper`,
      slideClass: `${sliderPrefix}slide`,
      slideActiveClass: `${sliderPrefix}slide--active`,
      loop: false,
      slidesPerView: 2,
      speed: 500,
      spaceBetween: 40,
      grabCursor: true,
      // on: {
      //   slideChange: function () {
      //     bar.style.left = `${barWidth*this.realIndex}%`
      //   },
      // },
      scrollbar: {
        el: `.${sliderPrefix}progress`,
        draggable: true,
        hide: false,
      },
      breakpoints: {
        0: {
          slidesPerView: 1.6,
          spaceBetween: 5
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        }
      }
    });
  }
}
