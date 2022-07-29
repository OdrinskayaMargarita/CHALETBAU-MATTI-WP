export default () => {
  let checkbox = document.querySelector('.js-form-agree');
  let btn = document.querySelector('.js-btn-submit');

  const CHECK_ACTIVE = 'check--active';
  const BTN_DISABLED = 'btn-simple--disabled';
  
  if (checkbox && btn) {
    const config = {
      attributes: true,
      childList: false,
      subtree: false
    };

    const callback = function(mutationsList, observer) {
      for (let mutation of mutationsList) {
        // console.log(mutation.type);
        if (mutation.type === 'attributes') {
          if (checkbox.classList.contains(CHECK_ACTIVE)) {
            btn.classList.remove(BTN_DISABLED);
          } else {
            btn.classList.add(BTN_DISABLED);
          }
        }
      }
    };

    const observer = new MutationObserver(callback);
    observer.observe(checkbox, config);
  }
}
