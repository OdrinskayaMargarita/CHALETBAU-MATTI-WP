import offset from '../helpers/offset';
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    let titleWrappers = document.querySelectorAll('.culture__text-container');
    let titles = document.querySelectorAll('.culture__text-upper');
    let images = document.querySelectorAll('.culture__image-container');
  
    if (titles.length && images.length) {

        titles.forEach(function(title, index) {
            let titleWrapper = titleWrappers[index];
            let image = images[index];
            
            let path = getIntersectPath(title, image);
            gsap.set(title, {
                'clip-path': `polygon(${path})`,
                opacity: 0,
                visibility: 'hidden',
            });
            gsap.set(image, {
                opacity: 0,
                visibility: 'hidden',
            });

            titleWrapper.addEventListener('mouseover', function(){
                gsap.set(title, {
                    'clip-path': `polygon(${getIntersectPath(title, image)})`,
                    opacity: 1,
                    visibility: 'visible',
                });
                gsap.set(image, {
                    opacity: 1,
                    visibility: 'visible',
                });
            });
            titleWrapper.addEventListener('mouseout', function(){
                gsap.set(title, {
                    opacity: 0,
                    visibility: 'hidden',
                });
                gsap.set(image, {
                    opacity: 0,
                    visibility: 'hidden',
                });
            });  
        });

        window.addEventListener('resize', function(){
            titles.forEach(function(title, index) {
                let image = images[index];
                
                gsap.set(title, {
                    'clip-path': `polygon(${getIntersectPath(title, image)})`,
                });
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

        if (title && image) {
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
}