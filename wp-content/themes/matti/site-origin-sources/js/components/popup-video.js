import Plyr from 'plyr';

export default () => {
  let videos = document.querySelectorAll('.popup-video__element');
  let fixedHolder = document.querySelector('.fixed-holder');

  let fixedPopups = [];

  const VISIBLE_CLASS = 'popup-video--visible'

  if (videos.length) {
    videos.forEach(function(video) {
      let popup = video.closest('.popup-video');
      let id = +popup.dataset.video;
      
      let videoClone = popup.cloneNode(true);
      fixedPopups[id] = videoClone;
      fixedHolder.appendChild(videoClone);
      popup.remove();
    });

    fixedPopups.forEach(function(popup) {
      let video = popup.querySelector('video');

      const player = new Plyr(video, {
        controls: [
          'play',
          'progress',
        ],
        hideControls: false,
        fullscreen: {
          enabled: false
        },
        tooltips: {
          controls: false,
          seek: false
        }
      });
    });

    if (location.hash.includes('movie-')) {
      let id = +location.hash.split('-')[1];
      fixedPopups[id].classList.add(VISIBLE_CLASS);
      let movieVideo = fixedPopups[id].querySelector('video');

      movieVideo.play();
      movieVideo.addEventListener("canplay", function(){
        movieVideo.play();
      });
      
      location.hash = ''; 
    }


    let openBtns = document.querySelectorAll('[data-popup]');
    let closeBtns = document.querySelectorAll('.popup-video__btn-close, .popup-video__lang-item');

    if (openBtns.length) {
      openBtns.forEach(function(btn) {
        let targetId = btn.dataset.popup;
        let target = document.querySelector(`[data-video="${targetId}"]`);


        if (target) {
          let video = target.querySelector('.popup-video__element');

          btn.addEventListener('click', (e) => {

            let currentVisible = document.querySelector(VISIBLE_CLASS);
            if (currentVisible) {
              currentVisible.classList.remove(currentVisible);
              let video = currentVisible.querySelector('video');
              video.pause();
            }

            target.classList.add(VISIBLE_CLASS);
            video.play();
            console.log(video);
          });
        }
      });
    }

    if (closeBtns.length) {
      closeBtns.forEach(function(closeBtn) {
        let popup = closeBtn.closest('.popup-video');

        if (popup) {
          let video = popup.querySelector('.popup-video__element');

          closeBtn.addEventListener('click', (e) => {
            e.preventDefault();

            popup.classList.remove(VISIBLE_CLASS);
            if (video) {
              video.pause();
            }
          });
        }
      });
    }
  }
}