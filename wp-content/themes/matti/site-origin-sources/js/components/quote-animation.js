import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
gsap.registerPlugin(ScrollTrigger);
import Splitting from 'splitting';

export default () => {
    let quotes = document.querySelectorAll('.quote__animation');
    let results;

    if (quotes) {
        
        setTimeout(function(){
            quotes.forEach(quote => {
                let currentLine = 0;
                results = Splitting({ target: quote, by: 'chars' });

                let currentLinePos = -Infinity;
                results[0].words.forEach(function(word) {
                    let wordBound = word.getBoundingClientRect();
                    let wordTop = wordBound.top;

                    if (wordTop > currentLinePos) {
                        currentLinePos = wordTop;
                        currentLine++;
                    }
                    word.classList.add(`line--${currentLine}`);
                });  

                let tl = gsap.timeline({scrollTrigger:{
                    trigger: quote,
                    onEnter: function(){
                        for (let i = 1; i <= currentLine; i++) {
                            let chars = quote.querySelectorAll(`.line--${i} .char`);
                            gsap.to(chars, {
                                y: 0,
                                yPercent: 0,
                                duration: 0.3,
                                delay: i * 0.15
                            });
                        }
                    },
                    start: "top 90%",
                }});

            });
        }, 500);

    }

}