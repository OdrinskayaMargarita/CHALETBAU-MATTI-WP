import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export default () => {
  let blocks = document.querySelectorAll('.js-floating');

  if (blocks.length) {
    blocks.forEach(function(block) {
      let offset = +block.dataset.offset;

      ScrollTrigger.matchMedia({
        "(min-width: 1025px)": function() {
          moveY(block, offset || 110);
        },
        "(max-width: 1024px)": function() {
          moveY(block, 20);
        },
      })
      
    });
  }

  function moveY(block, offset) {
    gsap.fromTo(block, {
      y: offset,
    }, {
      y: -offset,
      scrollTrigger: {
        trigger: block,
        start: 'top bottom',
        end: 'bottom top',
        scrub: true,
      }
    });
  }
}
