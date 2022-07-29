import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
import Splitting from 'splitting'
import clipText from '../helpers/clip-text';

export default () => {
  let homeContent = document.querySelector('.home__content');
  let fixedHolder = document.querySelector('.fixed-holder');

  if (homeContent) {
    let hClone = homeContent.cloneNode(true);
    
    fixedHolder.appendChild(hClone);
    homeContent.remove();
    homeContent = hClone;
  }

  let title = document.querySelector('.home__title');
  let heroTitle = document.querySelector('.greeting__title');
  let heroTitleOver = document.querySelector('.greeting__title-over');
  let heroImage = document.querySelector('.greeting__pic');
  let loader = document.querySelector('.loader');
  let results;
  let currentLine = 0;

  if (loader) {
    let loaderLogo = loader.querySelector('.loader__logo');
    let headerLogo = document.querySelector('.header__logo');
    let line = loader.querySelector('.loader__line');
    let btnWrapper = document.querySelector('.home__btn-wrapper');
    let links = document.querySelector('.home__links');
    let header = document.querySelector('.header');

    if (title) {
      results = Splitting({ target: title, by: 'chars' });

      let currentLinePos = -Infinity;
      results[0].words.forEach(function(word) {
        if (word.offsetTop > currentLinePos) {
          currentLinePos = word.offsetTop;
          currentLine++;
        }
        word.classList.add(`line--${currentLine}`);
      });

      homeContent.classList.add('home__content--visible');
    }
    
    let bgl = document.querySelector('.loader__bg--l');
    let bgr = document.querySelector('.loader__bg--r');


    ScrollTrigger.matchMedia({
      
      "(min-width: 768px)": function() {
        homeAnimation(false);
      },

      "(max-width: 767px)": function() {
        homeAnimation(true);
      },
    });
    



    function homeAnimation(isMobile) {
      let moveL, moveR;
        if (isMobile) {
          moveL = {
            xPercent: -101,
            yPercent: 0
          }
          moveR = {
            xPercent: 101,
            yPercent: 0
          }
        } else {
          moveL = {
            xPercent: 0,
            yPercent: -101
          }
          moveR = {
            xPercent: 0,
            yPercent: 101
          }
        }
        

        let tl = new gsap.timeline();

        tl.to(loaderLogo, {
          opacity: 0,
          duration: 0.6
        }, 0.7);

        tl.to(line, {
          x: 0,
          y: 0,
          duration: 3.5
        }, 0.8);

        if (title) {
          for (let i = 1; i <= currentLine; i++) {
            let chars = document.querySelectorAll(`.line--${i} .char`);
            tl.to(chars, {
              y: 0,
              yPercent: 0,
              duration: 0.5,
              // onComplete: ()=> {
              //   // tl.pause();
              // }
            }, i == 1 ? '-=1.1' : '-=0');
          }
        }
        



        tl.to(bgl, {
          yPercent: moveL.yPercent,
          xPercent: moveL.xPercent,
          duration: 0.7
        }, '+=0.5');

        tl.to(bgr, {
          yPercent: moveR.yPercent,
          xPercent: moveR.xPercent,
          duration: 0.7
        }, '-=0.7');

        tl.to('.header__logo', {
          opacity: 1,
          duration: 0.3
        }, '-=0.3');

        tl.to(loader, {
          opacity: 0,
          duration: 0.2,
          onComplete: ()=> {
            loader.remove();

            let hc = document.querySelector('.home__content');
            if (hc) {
              hc.style.zIndex = 1;
            }
            
          }
        });
        if (btnWrapper && links) {
          tl.to(btnWrapper, {
            opacity: 1,
            duration: 0.6
          });

          tl.fromTo(links, {
            opacity: 0
          },{
            opacity: 1,
            duration: 0.6
          }, '-=0.6');

          tl.fromTo(header, {
            opacity: 0
          },{
            opacity: 1,
            duration: 0.6
          }, '-=0.6');
        }
        if (heroTitle) {
          tl.fromTo(heroTitle, {
            y: '100%'
          },{
            y: '0%',
            duration: 0.8,
            ease: 'power3.out',
            onUpdate: () => {
              clipText(heroTitleOver, heroImage);
            }
          }, '-=0.3');
        }
      }
    }
}
