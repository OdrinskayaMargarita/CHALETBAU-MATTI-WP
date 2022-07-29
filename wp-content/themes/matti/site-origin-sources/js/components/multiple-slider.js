import Swiper from 'swiper/bundle';

export default () => {
    let multipleSliderContainer = document.querySelectorAll('.multiple__slider');
    let multipleSliderTab = document.querySelectorAll('.multiple__slider-tab');
    const ACTIVE_TAB = 'multiple__slider-tab--active';
    const ACTIVE_SLIDER = 'multiple__slider--active';

    multipleSliderContainer.forEach((item) =>{
        let multipleSlider = new Swiper(item, {
            speed: 800,
            parallax: true,
            navigation: {
                nextEl: item.querySelector('.swiper-button-next'),
                prevEl: item.querySelector('.swiper-button-prev'),
            },
        });
    });

    multipleSliderTab.forEach((tab) => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            multipleSliderTab.forEach((tab) => {
                tab.classList.remove(ACTIVE_TAB);
            });
            tab.classList.add(ACTIVE_TAB);
            multipleSliderContainer.forEach((item) => {
                item.classList.remove(ACTIVE_SLIDER);
                if(tab.getAttribute('data-slider-tab') == item.getAttribute('data-slider-tab')){
                    item.classList.add(ACTIVE_SLIDER);
                }
            });  
        });
    });	
};
