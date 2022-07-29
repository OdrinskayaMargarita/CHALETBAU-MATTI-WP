import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

export default () => {
  let posters = document.querySelectorAll('.poster, .inserted-images');

  if (posters.length) {
    posters.forEach(function(poster) {
      let image = poster.querySelector('.poster__img, .inserted-images__image-large');

      gsap.fromTo(image,
        {
          yPercent: "8.32"
        },
        {
        yPercent: "-8.32",
        scrollTrigger: {
          trigger: poster,
          start: "top bottom",
          end: "bottom top",
          scrub: true,
        }
      });
    });
  }
}
