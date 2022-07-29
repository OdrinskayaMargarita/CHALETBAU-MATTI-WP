import Swiper from 'swiper/bundle';
import classToggle from '../helpers/class-toggle';
import idx from '../helpers/idx';

export default () => {
  const sliderPrefix = 'contact__';
  let sliderEl = document.querySelector(`.${sliderPrefix}slider`);
  let tabsEl = document.querySelector(`.${sliderPrefix}tabs`);
  let buttons = document.querySelectorAll('.contact__btn');
  const SLIDE_SPEED = 500;
  const BTN_ACTIVE = 'contact__btn--active';

  if (sliderEl && tabsEl && buttons.length) {
    let slider = new Swiper(sliderEl, {
      wrapperClass: `${sliderPrefix}slider-wrapper`,
      slideClass: `${sliderPrefix}slide`,
      slideActiveClass: `${sliderPrefix}slide--active`,
      slidesPerView: 1,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      on: {
        slideChange: function (s) {
          classToggle(buttons, buttons[s.activeIndex], BTN_ACTIVE);
        },
      },

      speed: SLIDE_SPEED,
    });

    let tabsSlider = new Swiper(tabsEl, {
      wrapperClass: `${sliderPrefix}tabs-wrapper`,
      slideClass: `${sliderPrefix}tab`,
      slideActiveClass: `${sliderPrefix}tab--active`,
      slidesPerView: 1,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },

      speed: SLIDE_SPEED,
    });

    tabsSlider.controller.control = slider;
    slider.controller.control = tabsSlider;

    buttons.forEach(function(btn) {
      btn.addEventListener('click', (e) => {
        let index = idx(btn);
        classToggle(buttons, buttons[index], BTN_ACTIVE);

        slider.slideTo(index);
      });
    });
  }
}
