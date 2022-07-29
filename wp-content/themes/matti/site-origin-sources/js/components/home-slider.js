import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
import barba from '@barba/core';

export default () => {
  let slides = document.querySelectorAll('.home__slide');

  if (slides.length) {

    if (window.innerWidth >= 1024) {
      let slideVideos = document.querySelectorAll('.home__slide-video')
      if (slideVideos.length) {
        slideVideos.forEach((video)=>{
          video.preload = 'auto';
        })
      }
    }

    slides.forEach(function(slide) {
      let link = slide.querySelector('.home__slide-link');
      let video = slide.querySelector('video');
      slide.addEventListener('mouseenter', (e) => {
        slide.classList.add('home__slide--top');
      });
      slide.addEventListener('mouseleave', (e) => {
        setTimeout(function(){
          slide.classList.remove('home__slide--top');
        }, 800);
      });

      if (link && video) {
        link.addEventListener('mouseenter', (e) => {
          slide.classList.add('home__slide--wide');
          video.play();
        });
        link.addEventListener('mouseleave', (e) => {
          slide.classList.remove('home__slide--wide');
          video.pause();
        });
      }
    });
  }



  // navigate to bottom link on scroll
  let home = document.querySelector('.home');
  let bottomLink = document.querySelector('.home__link--b');
  let isNavigated = false;

  if (home && bottomLink) {
    ScrollTrigger.matchMedia({
      "(min-width: 768px)": function() {
        let tl = gsap.timeline({
          scrollTrigger: {
            trigger: home,
            start: "top top",
            end: "+=500",
            pin: true,
            scrub: true,
            onUpdate: (self) => {
              if (self.progress>=0.5 && !isNavigated) {
                isNavigated = true;
                barba.go(bottomLink.getAttribute('href'))
              }
            }
          }
        });
        tl.to(home, {
          opacity: 0.7,
          duration: 1
        }, "+=0.5")
      },
    });
  }
}
