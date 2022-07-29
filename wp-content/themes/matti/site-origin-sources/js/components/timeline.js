import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Scrollbar from "smooth-scrollbar";
gsap.registerPlugin(ScrollTrigger);

export default () => {
  let section = document.querySelector('.timeline');
  let inner = document.querySelector('.timeline__slides');
  let slides = document.querySelectorAll('.timeline__slide');
  let slidesLength = 0;

  let timelineTitle = document.querySelector('.timeline__title');
  let TITLE_VISIBLE = 'timeline__title--visible';
  
  if (section && inner) {
    slides.forEach(function(slide) {
      slidesLength+=slide.offsetWidth;
    });
    slidesLength -= window.innerWidth;

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top top", 
        end: () => "+=" + innerHeight*slides.length,
        pin: true,
        scrub: true,
        onUpdate: ({progress, direction, isActive}) => {
          if (progress>=0.015 && !timelineTitle.classList.contains(TITLE_VISIBLE)) {
            timelineTitle.classList.add(TITLE_VISIBLE)
          } else if (progress<0.015 && timelineTitle.classList.contains(TITLE_VISIBLE)) {
            timelineTitle.classList.remove(TITLE_VISIBLE)
          }
        }

        // markers: true
      }
    })

    tl.to(inner, {
      x: -slidesLength,
      ease: "none",
      duration: 100
    });

    let parallaxEls = document.querySelectorAll('.move-x');
    if (parallaxEls.length) {
      parallaxEls.forEach(function(px) {
        let xOffset = +px.dataset.move || 70;
        let slide = px.closest('.timeline__slide');
        let slideW = slide.getBoundingClientRect().width;
        let slideOffset = slide.getBoundingClientRect().left;

        tl.fromTo(px, {
          x: xOffset,
        },
        {
          x: -xOffset,
          duration: 100*(slideW/slidesLength)
        }, 100*((slideOffset - slideW)/slidesLength))
      });
    }
  }


  // skip timeline
  const skipBtns = document.querySelectorAll('.js-timeline-skip');
  const gotopBtn = document.querySelector('.js-go-top');

  const sb = Scrollbar.get(document.querySelector('.scroll-wrapper'));
  const SCROLL_TIME = 300;

  if (skipBtns.length && sb) {
    let timeline = document.querySelector('.timeline');
    let nextSection  = timeline.closest('.pin-spacer').nextElementSibling;

    skipBtns.forEach(function(btn) {
      btn.addEventListener('click', (e) => {
        e.preventDefault();

        let offset = nextSection.getBoundingClientRect().top + sb.scrollTop;
        timeline.classList.add('timeline--darken');

        setTimeout(function(){
          sb.scrollTo(0, offset, SCROLL_TIME);
        }, 500);

        setTimeout(function(){
          timeline.classList.remove('timeline--darken');
        }, SCROLL_TIME+500);
        
      });
    });

    if (gotopBtn) {
      gotopBtn.addEventListener('click', (e) => {
        e.preventDefault();

        timeline.classList.add('timeline--darken');

        setTimeout(function(){
          sb.scrollTo(0, 0, SCROLL_TIME*3);
        }, 500);

        setTimeout(function(){
          timeline.classList.remove('timeline--darken');
        }, SCROLL_TIME*3+500);
      });
    }
  }

  // skip first slide
  let exploreBtn = document.querySelector('.slide-about__btn');
  if (exploreBtn) {
    exploreBtn.addEventListener('click', (e) => {
      let sb = Scrollbar.get(document.querySelector('.scroll-wrapper'));
      let offset = section.getBoundingClientRect().top + sb.scrollTop + innerHeight*(slides[0].getBoundingClientRect().width/(slidesLength/slides.length));
      sb.scrollTo(0, offset, 700);
    });
  }
}