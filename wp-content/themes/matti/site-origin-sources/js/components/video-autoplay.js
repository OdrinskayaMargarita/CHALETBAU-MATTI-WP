import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
  let autoplayVideos = document.querySelectorAll('.image-quote__video, .bottom-quote__video, .cine__video');
  
  if (autoplayVideos.length) {
    autoplayVideos.forEach(function(video) {
      ScrollTrigger.create({
        trigger: video,
        onEnter: () => video.play(),
        onEnterBack: () => video.play(),
        onLeave: () => video.pause(),
        onLeaveBack: () => video.pause(),
      });
    });
  }
}