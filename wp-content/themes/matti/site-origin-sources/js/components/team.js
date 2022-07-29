import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

export default () => {
  const pageText = document.querySelector('.team__main .hero__content');
  const logo = document.querySelector('.header__logo-link');
  const disabledClass = 'header__logo-link--disabled';

  if (pageText) {
    ScrollTrigger.create({
      trigger: pageText,
      onEnterBack: () => {
        logo.classList.remove(disabledClass);
      },
      onLeave: () => {
        logo.classList.add(disabledClass);
      }
    });
  }
}
