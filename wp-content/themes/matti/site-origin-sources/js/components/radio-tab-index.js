export default () => {
  const formWrapper = document.querySelector('.form__grid.grid');
  const radioGroupClass = 'form__radio-tabindex'

  if (formWrapper) {
    const checkboxes = formWrapper.querySelectorAll('.check');
    const div = document.createElement("div");
    div.classList.add(radioGroupClass);
    const radio = `
      <input type="radio" name="contact-type" value="email"  checked>
      <input type="radio" name="contact-type" value="phone" >
    `
    div.innerHTML = radio;
    formWrapper.prepend(div);

    let radioButtons = document.querySelectorAll(`.${radioGroupClass} input`);
    if (radioButtons.length) {
      radioButtons.forEach(function(input, index) {
        input.addEventListener('change', (e) => {
          if (input.checked) {
            checkboxes[index].click();
          }
        });

        input.addEventListener('focus', (e) => {
          checkboxes[index].classList.add('check--focus');
        });
        input.addEventListener('blur', (e) => {
          checkboxes[index].classList.remove('check--focus');
        });
      });
    }
  }
}