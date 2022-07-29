import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
// gsap.registerPlugin(ScrollTrigger);

export default () => {
  let blocks = document.querySelectorAll('.img-scroll');

  if (blocks.length) {
    blocks.forEach(function(block) {
      let image = block.querySelector('.img-scroll__el');

      gsap.to(image, {
        y: 0,
        scrollTrigger: {
          trigger: block,
          start: "top 70%",
          end: "bottom 20%",
          scrub: true,
        }
      });
    });
  }
}
