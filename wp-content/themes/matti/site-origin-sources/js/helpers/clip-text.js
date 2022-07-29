import gsap from "gsap";
import getIntersectPath from './get-intersect-path';

export default (title, image) => {
  let path = getIntersectPath(title, image);

  gsap.set(title, {
    '-webkit-clip-path': `polygon(${path})`,
    'clip-path': `polygon(${path})`,
  });
}