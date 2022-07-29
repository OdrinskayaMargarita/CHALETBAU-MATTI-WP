import offset from '../helpers/offset';
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import clipText from '../helpers/clip-text';

export default () => {
  let section = document.querySelector('.teaser');
  let titleWrapper = document.querySelector('.teaser__title');
  let titles = document.querySelectorAll('.teaser__title-over');
  let images = document.querySelectorAll('.teaser__bg');
  const movePercent = 70;

  if (titles.length && images.length) {

    titles.forEach(function(title, index) {
      let image = images[index];
      
      let path = getIntersectPath(title, image);
      gsap.set(title, {
        'clip-path': `polygon(${path})`,
      });

      ScrollTrigger.create({
        trigger: section,
        start: "top 90%",
        end: "bottom bottom",
        scrub: true,
        onUpdate: (self) => {
          let titleShift = movePercent*self.progress;
          gsap.set(titleWrapper, {
            yPercent: titleShift
          });

          clipText(title, image);
        }
      });
    });
  }


  function valueToPercecnt(val) {
    if (val<0) {
      val = 0
    } else if (val > 1) {
      val = 1
    }
    return val*100+'%';
  }

  function getIntersectPath(title, image) {
    let titleOff = offset(title);
    let imgOff = offset(image);

    let leftStart = (imgOff.left - titleOff.left)/titleOff.width;
    let leftEnd = ((imgOff.left + imgOff.width) - titleOff.left)/titleOff.width;

    let topStart = (imgOff.top - titleOff.top)/titleOff.height;
    let topEnd = ((imgOff.top + imgOff.height) - titleOff.top)/titleOff.height;
    

    let intersect = {
      topLeft: valueToPercecnt(leftStart) + ' ' + valueToPercecnt(topStart),
      topRight: valueToPercecnt(leftEnd) + ' ' + valueToPercecnt(topStart),
      bottomRight: valueToPercecnt(leftEnd) + ' ' + valueToPercecnt(topEnd),
      bottomLeft: valueToPercecnt(leftStart) + ' ' + valueToPercecnt(topEnd),
    }
    let path = `${intersect.topLeft}, ${intersect.topRight}, ${intersect.bottomRight}, ${intersect.bottomLeft}`;

    return path;
  }
}
