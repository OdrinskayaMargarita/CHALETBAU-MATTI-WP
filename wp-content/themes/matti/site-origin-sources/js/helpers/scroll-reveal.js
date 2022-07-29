import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";

export default () => {
  gsap.registerPlugin(ScrollTrigger);

  reveal();

  function reveal() {
    let containers = document.querySelectorAll('[data-ac]');
    if (containers.length) {
      containers.forEach(function(cont) {
        let elements = cont.querySelectorAll('[data-ae]');

        let y=60;
        if (cont.dataset.acFade != undefined) {
            y=0;
        }
        if (elements.length) {

          gsap.fromTo(elements,
              {
                y: y,
                opacity: 0,
              },
              {
                scrollTrigger: {
                  trigger: cont,
                  start: 'top 70%',
                },
                stagger: {
                  each: 0.3,
                  onComplete: function(){
                    this._targets[0].classList.add('animation-finished');
                  },
                },
                y: 0,
                opacity: 1,
                duration: 1.5,
                ease: 'power3.out',
              }
          );
        }
      });
    }

    let selfTriggers = document.querySelectorAll('[data-st]');
    if (selfTriggers.length) {
      selfTriggers.forEach(function(st) {
        let delay = 0;
        if (st.dataset.delay != undefined) {
          delay = +st.dataset.delay;
        }

        if (st.dataset.fade != undefined) {
            gsap.fromTo(st,
                {
                  y: 0,
                  opacity: 0,
                },
                {
                  scrollTrigger: {
                    trigger: st,
                    start: 'top 85%',
                  },
                  stagger: 0.5,
                  y: 0,
                  opacity: 1,
                  duration: 1.7,
                  delay: delay,
                  ease: 'power3.out'
                }
            );
        } else {
          gsap.fromTo(st,
              {
                y: 60,
                opacity: 0,
              },
              {
                scrollTrigger: {
                  trigger: st,
                  start: 'top 85%',
                },
                stagger: 0.3,
                y: 0,
                opacity: 1,
                duration: 1.5,
                delay: delay,
                ease: 'power3.out'
              }
          );
        }
      });
    }
  }
}