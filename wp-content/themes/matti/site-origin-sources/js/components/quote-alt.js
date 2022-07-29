import Splitting from 'splitting'
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
  let quotes = document.querySelectorAll('.q, .review__content, .center-quote__container');

  if (quotes.length) {
    quotes.forEach(function(q) {
      let text = q.querySelector('.q__quote');
      let decoL = q.querySelector('.q__quote-deco--l');
      let decoR = q.querySelector('.q__quote-deco--r');
      let author = q.querySelector('.q__author');

      let currentLine = 0;
      let currentLinePos = -Infinity;

      let results = Splitting({ target: text, by: 'chars' });

      setTimeout(function(){
        results[0].words.forEach(function(word) {

          if (word.offsetTop > currentLinePos) {
            currentLinePos = word.offsetTop;
            currentLine++;
          }
          word.classList.add(`line--${currentLine}`);
        });

        let duration = 0.6;

        if (currentLine>3) {
          duration = 0.3;
        }


        let tl = new gsap.timeline({
          scrollTrigger: {
            trigger: q,
            start: "top 80%",
            end: "bottom 20%",
            once: true
          }

        });

        for (let i = 1; i <= currentLine; i++) {
          let chars = document.querySelectorAll(`.line--${i} .char`);
          tl.to(chars, {
            y: 0,
            yPercent: 0,
            duration: duration,
            ease: 'power2.out',
          }, i === 0 ? '-=0' : '-=0.1');
        }
        tl.to([decoL, decoR], {
          opacity: 1,
          x: 0,
          duration: 0.5
        });

        if (author) {
          tl.fromTo(author, {
            opacity: 0,
            yPercent: 50,
          },
          {
            opacity: 1,
            yPercent: 0,
            duration: 0.5
          }, '-=0.5');
        }
      }, 200);
    });
  }
}
