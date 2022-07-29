import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import getIntersectPathBulk from '../helpers/get-intersect-path-array';

export default () => {
  let logo = document.querySelector('.js-logo-over');
  let burger = document.querySelector('.burger--alt');
  let sections = document.querySelectorAll('.js-color-alter');
  let pageWrapper = document.querySelector('.scroll-content');

  let pathBurger = getIntersectPathBulk(burger, sections);
   gsap.set(burger, {
    '-webkit-clip-path': `polygon(${pathBurger})`,
    'clip-path': `polygon(${pathBurger})`,
  });

  if (logo && burger && sections.length) {

    let st = ScrollTrigger.create({
      trigger: pageWrapper,
      start: 'top top',
      end: 'bottom top',
      scrub: true,
      onUpdate: (self) => {
        let path = getIntersectPathBulk(logo, sections);
        
        gsap.set(logo, {
          '-webkit-clip-path': `polygon(${path})`,
          'clip-path': `polygon(${path})`,
        });

        let pathBurger = getIntersectPathBulk(burger, sections);
         gsap.set(burger, {
          '-webkit-clip-path': `polygon(${pathBurger})`,
          'clip-path': `polygon(${pathBurger})`,
        });
      },
    });
  }
}