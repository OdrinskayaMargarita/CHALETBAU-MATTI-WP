import Scrollbar from "smooth-scrollbar";

export default () => {
  let nav = document.querySelector('.page-nav');
  const EXPANDED_CLASS = 'page-nav--expanded';

  if (nav) {
    // open/close handle
    let btn = nav.querySelector('.page-nav__btn');
    btn.addEventListener('click', (e) => {
      nav.classList.toggle(EXPANDED_CLASS);
    });
    btn.addEventListener('mouseenter', (e) => {
      if (!nav.classList.contains(EXPANDED_CLASS)) {
        nav.classList.add(EXPANDED_CLASS);
      }
    });
  }

  // links anchor scroll
  const SCROLL_TIME = 1500;
  let sb = Scrollbar.get(document.querySelector('.scroll-wrapper'));
  let links = document.querySelectorAll('.page-nav__link, .js-anchor');
  if (links.length) {
    links.forEach(function(link) {
      let target = document.querySelector(link.getAttribute('href'));
      if (target) {
        link.addEventListener('click', (e) => {
          e.preventDefault();

          if (nav) {
            nav.classList.remove(EXPANDED_CLASS);
          }

          let offset = target.getBoundingClientRect().top + sb.scrollTop;
          sb.scrollTo(0, offset, SCROLL_TIME);
        });
      }
    });
  }
}
