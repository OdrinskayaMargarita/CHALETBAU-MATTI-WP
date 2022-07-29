export default () => {
  let checkItems = document.querySelectorAll('.check');
  let varInput = document.querySelector('.js-contact-field');


  if (checkItems.length) {
    checkItems.forEach(function (check, index) {
      let realInput = check.querySelectorAll('.check__input, .check__input_cf7 input');
      if (realInput) {
        if (check.classList.contains('check--active')) {
          realInput.forEach(function (item){
            item.checked = true;
          });
        }

        let checkInput = check.querySelector('input[type=checkbox]');
        if (checkInput) {
          checkInput.addEventListener('focus', (e) => {
            check.classList.add('check--focus');
          });
          checkInput.addEventListener('blur', (e) => {
            check.classList.remove('check--focus');
          });
        }

        check.addEventListener('click', (e) => {
          if (check.classList.contains('check--active') && index<2) {
            return;
          }
          let isActive = check.classList.toggle('check--active');
          if (isActive) {
            checkItems.forEach(function(checkItem, i) {
              if (i !== index && index<2 && i<2) {
                checkItem.classList.toggle('check--active');
                let realInput = check.querySelectorAll('.check__input, .check__input_cf7 input');

                realInput.forEach(function (item){
                  if (item.checked === true){
                    item.checked = false;
                  } else {
                    item.checked = true;
                  }
                });
              }
            });

            if (index<2) {
              varInput.type = check.dataset.type;
              varInput.placeholder = check.dataset.placeholder;
              varInput.value = '';
              let label = varInput.closest('.form__box--half').querySelector('.form__label');
              label.innerText = varInput.type = check.dataset.label;
            }
          }

          realInput.forEach(function (item){
            if (item.checked === true){
              item.checked = false;
            } else {
              item.checked = true;
            }
          });
        });
      }
    });
  }
}