import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {

  let section = document.querySelector('.services');
  if (section){
    gsap.set(".services__item-text", { y: '100%', zIndex: (i, target, targets) => targets.length - i });

    let texts = gsap.utils.toArray('.services__item-text');
    texts.forEach((text, i) => {
    
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: ".services",
          start: () => "top -" + (window.innerHeight*0.75*i),
          end: () => "+=" + window.innerHeight*0.75,
          scrub: true,
        }
      });

      if (i != 0) {
        tl.to(text, { duration: 0.33, opacity: 1, zIndex: (i, target, targets) => targets.length - i , y:"0%" }) ; 
      } else {
        gsap.set(text, {
          opacity: 1,
          y: 0
        });
      }
      
      if(i != texts.length - 1) {
        tl.to(text, { duration: 0.33, opacity: 0, y:"-100%" }, 0.66);
      }
    });

    gsap.set(".services__image", { opacity: 0});

    let images = gsap.utils.toArray('.services__image');

    gsap.set(images[0], {
      opacity: 1,
      y: 0
    });

    images.forEach((image, i) => {
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: ".services",
          start: () => "top -" + (window.innerHeight*0.75*(i+0.1)),
          end: () => "+=" + window.innerHeight*0.75,
          scrub: true,
          toggleActions: "play none reverse none",
          invalidateOnRefresh: true,
        }
      });
      
      if (i != 0) {
        tl.to(image, { duration: 0.3, opacity: 1 });
      }

      if(i != images.length - 1){
        tl.to(image, { duration: 0.2, opacity: 0 }, 0.5);
      }
    
    });

    let tl = gsap.timeline({
    scrollTrigger: {
      trigger: section,
      start: "top top",
      end: () => "+=" + (images.length * window.innerHeight*0.75),
      pin: true,
      scrub: true,
    }
    });
  }
}