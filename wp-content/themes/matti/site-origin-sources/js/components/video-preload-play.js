export default () => {
    let blocks = document.querySelectorAll('.video__hover');
  
    if (blocks.length) {
      blocks.forEach(function(block) {
        let video = block.querySelector('video');
  
        block.addEventListener('mouseenter', (e) => {
          video.play();
          block.classList.add('video__hover--play')
        });
        block.addEventListener('mouseleave', (e) => {
          video.pause();
          block.classList.remove('video__hover--play')
        });
      });
    }
  }
  