import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import clipText from '../helpers/clip-text';

export default () => {
  let section = document.querySelector('.greeting');
  let titles = document.querySelectorAll('.greeting__title-over');
  let images = document.querySelectorAll('.greeting__pic');
  const movePercent = 30;

  if (titles.length && images.length) {

    titles.forEach(function(title, index) {
      let image = images[index];
      
      clipText(title, image);

      setTimeout(function(){
        clipText(title, image);
      }, 100);

      let direction = index%2;

      ScrollTrigger.create({
        trigger: section,
        start: "top top",
        end: "bottom top",
        scrub: true,
        onUpdate: (self) => {
          let imageShift = movePercent*self.progress;
          if (index == 2) {
            imageShift = -1*movePercent*self.progress
          }
          gsap.set(image, {
            yPercent: imageShift
          });

          clipText(title, image);
        }
      });
      
    });
  }

}
