export default () => {
  let blocks = document.querySelectorAll('.media__el-wrapper');

  if (blocks.length) {
    blocks.forEach(function(block) {
      let video = block.querySelector('video');

      block.addEventListener('mouseenter', (e) => {
        video.play();
        block.classList.add('media__el-wrapper--playing')
      });
      block.addEventListener('mouseleave', (e) => {
        video.pause();
        block.classList.remove('media__el-wrapper--playing')
      });
    });
  }
}
