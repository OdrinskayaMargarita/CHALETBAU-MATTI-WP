import offset from '../helpers/offset';
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import getIntersectPath from '../helpers/get-intersect-path';

export default () => {
  let title = document.querySelector('.nature__title-over');
  let image = document.querySelector('.nature__fig--l .img-scroll');

  if (title && image) {
    cutText();

    window.addEventListener('resize', (e) => {
      cutText();
    });
  }

  function cutText() {
    let path = getIntersectPath(title, image);
    gsap.set(title, {
      'clip-path': `polygon(${path})`,
    });
  }
  
}
