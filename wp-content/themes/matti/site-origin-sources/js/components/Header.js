import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import getIntersectPath from '../helpers/get-intersect-path';
import siblings from '../helpers/siblings';
import { setScrollLock } from './scrollbar';

export default () => {

  let burgers = document.querySelectorAll('.burger');
  let menu = document.querySelector('.menu');
  let body = document.body;
  let links = menu.querySelectorAll('a');

  const ACTIVE_CLASS = 'is-menu-opened';

  burgers.forEach(function(burger) {
    if (!burger.classList.contains('js-burger-init')) {
      burger.classList.add('js-burger-init');
      burger.addEventListener('click', (e) => {
        setMenuState(-1);
      });
    }
  });

  links.forEach(function(link) {
    link.addEventListener('click', (e) => {
      setMenuState(false);
    });
  });
  
  function setMenuState(state) {
    let mainLinks = document.querySelectorAll('.menu__nav-link');
    let tl = gsap.timeline({paused: true});
    tl.fromTo(mainLinks, {
        opacity: 0,
        yPercent: 20
      },
      {
        opacity: 1,
        yPercent: 0,
        duration: 0.6,
        stagger: 0.15,
        delay: 0.3
      }
    )
    if (state === true) {
      body.classList.add(ACTIVE_CLASS);
      setScrollLock(true);
      tl.seek(0)
      tl.play();
    } else if (state === false) {
      body.classList.remove(ACTIVE_CLASS);
      setScrollLock(false);
      tl.reverse();
    }
    else if (state === -1) {
      let isActive = body.classList.toggle(ACTIVE_CLASS);
      setScrollLock(isActive);
      if (isActive) {
        tl.seek(0)
        tl.play();
      } else {
        tl.reverse();
      }
    }
  }
}