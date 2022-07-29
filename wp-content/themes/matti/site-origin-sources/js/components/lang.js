export default () => {
  const elName = 'lang';
  const cActive = '--opened';

  let langEls = document.querySelectorAll(`.${elName}`);

  if (langEls.length) {

    langEls.forEach(function(lang) {
      let popup = lang.querySelector(`.${elName}__popup`);
      let btn = lang.querySelector(`.${elName}__btn`);

      if (popup && btn) {
        btn.addEventListener('click', (e) => {
          lang.classList.toggle(`${elName+cActive}`)
        });
        btn.addEventListener('mouseenter', (e) => {
          if (!lang.classList.contains(`${elName+cActive}`)) {
            lang.classList.add(`${elName+cActive}`)
          }
        });
        

        document.addEventListener('click', (e) => {
          if (!e.target.closest(`.${elName}`)) {
            lang.classList.remove(`${elName+cActive}`)
          }
        });
      }
    });
  }
}
