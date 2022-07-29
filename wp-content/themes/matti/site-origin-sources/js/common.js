import barba from '@barba/core';
import gsap from "gsap";

// import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

import loader from './components/loader';
import sb from './components/scrollbar';
import header from './components/header';
import greetingAnimation from './components/greeting-animation';
import scrollReveal from './helpers/scroll-reveal';
import servicesScroll from './components/services-scroll';
import popupVideo from './components/popup-video';
import imgSlider from './components/img-slider';
import multipleSliderInit from './components/multiple-slider';
import collaborationSlider from './components/collaboration-slider';
import pageNav from './components/page-nav';
import mountain from './components/mountain';
import timeline from './components/timeline';
import dual from './components/dual';
import teaser from './components/teaser';
import imgScroll from './components/img-scroll';
import poster from './components/poster';
import floating from './components/floating';
import media from './components/media';
import homeSlider from './components/home-slider';
import carousel from './components/carousel';
import lang from './components/lang';
import contact from './components/contact';
import cultureHover from './components/culture-hover';
import quoteAnimation from './components/quote-animation';
import quoteAlt from './components/quote-alt';
import videoPreloadPlay from './components/video-preload-play';
import videoAutoplay from './components/video-autoplay';
import logoColor from './components/logo-color';
import team from './components/team';
import nature from './components/nature';
import clipText from './helpers/clip-text';
import navigationActive from './components/navigationActive';
import setVh from './helpers/set-vh';
import contactFormBarba from './helpers/contactFormBarba';


export default () => {
  init();

  function init() {
    barbaInit();
    loader();
    sb();
    setVh();
    header();
    pageNav();
    homeSlider();
    popupVideo();
    greetingAnimation();
    servicesScroll();
    media();
    carousel();
    lang();
    contact();
    imgSlider();
    multipleSliderInit();
    collaborationSlider();
    cultureHover();
    quoteAnimation();
    quoteAlt();
    videoPreloadPlay();
    nature();
    preventBarba();
    setTimeout(function(){
      mountain();
      timeline();
      dual();
      poster();
      teaser();
      floating();
      logoColor();
      scrollReveal();
      imgScroll();
      videoAutoplay();
      team();
      ScrollTrigger.sort();
    }, 1500);
    navigationActive();
  }

  function pageChange() {
    sb();
    header();
    pageNav();
    homeSlider();
    popupVideo();
    greetingAnimation();
    servicesScroll();
    media();
    carousel();
    lang();
    contact();
    imgSlider();
    multipleSliderInit();
    collaborationSlider();
    cultureHover();
    quoteAnimation();
    quoteAlt();
    videoPreloadPlay();
    nature();
    preventBarba();
    setTimeout(function(){
      mountain();
      timeline();
      dual();
      poster();
      teaser();
      floating();
      logoColor();
      scrollReveal();
      imgScroll();
      videoAutoplay();
      team();
      ScrollTrigger.sort();
    }, 1000);

    navigationActive();
  }

  function preventBarba() {
    let links = document.querySelectorAll('.menu__nav-link, .menu__logo-link, .menu__fnav-link, .menu__link,.header__logo-link');
    if (links.length) {
      links.forEach(function(link) {
        link.addEventListener('click', (e) => {
          if(link.dataset.barbaPrevent != '') {
            e.preventDefault();
          }
        });
      });
    }
  }

  function barbaInit() {
    const TIMING_TRANSITION = 1;

    barba.init({
      // debug: true,
      timeout: 10000,
      cacheIgnore: true,
      prevent: ({ el }) => el.closest('#wpadminbar'),
      transitions: [{

        leave(data) {
          const done = this.async();

          let videos = document.querySelectorAll('video');
          videos.forEach(function(video) {
            video.pause();
            video.src='';
          });

          const logo = document.querySelector('.header__logo-link');
          const disabledClass = 'header__logo-link--disabled';
          logo.classList.remove(disabledClass);


          gsap.to(
            data.current.container,
            {
              opacity: 0,
              duration: TIMING_TRANSITION
            }).eventCallback('onComplete', function(){
              document.body.classList.remove('is-menu-opened');

              done();
            }
          );
        },

        beforeEnter(data) {
          data.current.container.remove();
          let fixedEls = document.querySelectorAll('.fixed-holder *');

          if (fixedEls.length) {
            fixedEls.forEach(function(el) {
              el.remove();
            });
          }
          pageChange();

          let namespace = data.next.namespace;

          if (namespace === 'contactPage') {
            contactFormBarba();
          }
          document.body.dataset.pageName = namespace;

          if (namespace === 'homePage') {
            let homeBtn = document.querySelector('.home__btn-wrapper');
            let homeContent = document.querySelector('.home__content');
            if (homeBtn && homeContent) {
              homeContent.classList.add('home__content--visible');
              gsap.to(homeBtn, {
                opacity: 1,
                duration: 0.5,
                delay: 0.5
              })
            }

          } else {

          }

          let headerLogoLink = document.querySelector('.header__logo-link');
          if (headerLogoLink){
            let getBarbaWrapper = document.querySelector('.page-wrapper');
            let getHomeUrl = getBarbaWrapper.getAttribute('data-home-url');
            headerLogoLink.setAttribute('href', getHomeUrl);
          }

        },

        enter(data) {
          const done = this.async();

          gsap.fromTo(data.next.container,
            {
              opacity: 0
            },
            {
              opacity: 1,
              duration: TIMING_TRANSITION
            })
            .eventCallback('onComplete', function(){
              done();

              let heroTitle = document.querySelector('.greeting__title');
              let heroTitleOver = document.querySelector('.greeting__title-over');
              let heroImage = document.querySelector('.greeting__pic');

              if (heroTitle) {
                let tl = gsap.timeline();

                tl.fromTo(heroTitle, {
                  y: '100%'
                },{
                  y: '0%',
                  duration: 0.8,
                  ease: 'power3.out',
                  onUpdate: () => {
                    clipText(heroTitleOver, heroImage);
                  }
                });
              }
            });
        },
      }],
    });

  }
}
