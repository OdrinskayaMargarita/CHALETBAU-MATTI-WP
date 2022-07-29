import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { CustomEase } from "gsap/CustomEase";
gsap.registerPlugin(ScrollTrigger, CustomEase);
// gsap.registerPlugin(ScrollTrigger);

export default () => {
  let section = document.querySelector('.mountain');
    
  if (section) {
    let image = document.querySelector('.mountain__graph-item--over');
    let label = document.querySelector('.mountain__counter-value');

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top 50%",
        end: "center center",
        scrub: true,
        onUpdate: (self) => {
          let progress = self.progress;
        },
      }
    });

    tl.fromTo(image, {
      'clip-path': 'polygon(0 0, 0 100%, 70% 100%, 0 100%)',
      '-webkit-clip-path': 'polygon(0 0, 0 100%, 70% 100%, 0 100%)',
    }, {
      // opacity: 0
      'clip-path': 'polygon(0 0, 100% 0%, 100% 100%, 0% 100%)',
      '-webkit-clip-path': 'polygon(0 0, 100% 0%, 100% 100%, 0% 100%)',
    });



    let tlCounter = gsap.timeline({
      paused: true,
      scrollTrigger: {
        trigger: label,
        start: "top bottom",
        end: "bottom 20%",
        once: true,
        scrub: false,
        onUpdate: (self) => {
          let progress = self.progress;
        },
      }
    })
    let mount  = {val: 0};

    tlCounter.fromTo(mount, {
      val: '0'
    }, {
      val: '1050',
      ease: CustomEase.create("custom", "M0,0,C0.063,0.123,0.453,0.863,0.808,0.982,0.862,1,0.92,0.99,1,1"),
      duration: 2.5,
      onUpdate: () => {
        let val = Math.round(mount.val);
        let text;

        if (val<1000) {
          text = val;
        } else {
          val +='';
          text = `${val.slice(0, 1)}'${val.slice(1, val.length)}`;
        }
        label.innerText = text;
      },
    }, 0);
  }
}
