import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
  let section = document.querySelector('.dual');
  let images = document.querySelectorAll('.dual__figure');
  let grid = document.querySelector('.dual__grid');


  ScrollTrigger.matchMedia({
    "(min-width: 1025px)": function() {
      if (section && images.length) {
        let tl = gsap.timeline({
          scrollTrigger: {
            trigger: section,
            start: "top top",
            end: () => "+=" + innerHeight/2,
            pin: true,
            scrub: true,
          }
        });

        tl.fromTo(images[1], {
          scale: 1
        },
        {
          scale: 2.57,
          ease: "none",
          scrollTrigger: {
            trigger: section,
            start: "top top", 
            end: () => "+=" + innerHeight/2,
            pin: true,
            scrub: true,
          }
        });

        tl.to(images[0],
          {
            scale: 0.38,
            ease: "none",
          }
        );

        gsap.fromTo(images[1], {
          y: 0
        },
        {
          yPercent: 138,
          ease: "none",
          scrollTrigger: {
            trigger: section,
            start: 'top 80%',
            end: 'top top',
            scrub: true,
          }
        });
      }
    },
    "(max-width: 1024px)": function() {
      let percentMove;
      window.innerWidth >= 768 ? percentMove = 142 : percentMove = 147;
      if (section && images.length) {

        let tl = gsap.timeline({
          scrollTrigger: {
            trigger: section,
            start: "top 80%",
            end: "top top",
            scrub: true,
          }
        });

        tl.fromTo(images[1], {
          yPercent: 0
        },
        {
          yPercent: percentMove,
          ease: "none",
          duration: 1,
        });

        tl.fromTo(images[1], {
          scale: 1
        },
        {
          scale: 2.57,
          ease: "none",
          duration: 1,
        }, 1);

        tl.to(images[0],
        {
          scale: 0.38,
          ease: "none",
          duration: 1,
        }, 1);
        
      }
    },
  })
}