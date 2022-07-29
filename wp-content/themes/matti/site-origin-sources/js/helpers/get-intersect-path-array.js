import offset from './offset';
import valueToPercent from './value-to-percent';


export default (title, ar) => {
  let titleOff = offset(title);

  let box = {
    leftStart:0,
    leftEnd: 0,
    topStart:0,
    topEnd: 0
  }

  let intercounts = 0;
  let interEls = [];

  ar.forEach(function(el) {
    let imgOff = offset(el);
    let int = intersects(titleOff, imgOff);
    if (int) {
      intercounts++;
      interEls.push(el)
    }
  });

  if (intercounts) {
    box = {
      leftStart: 1000,
      leftEnd: -1000,
      topStart:1000,
      topEnd: -1000
    }
    // console.log(interEls);
    interEls.forEach(function(image) {
      let imgOff = offset(image);
      box.leftStart = Math.min(box.leftStart, (imgOff.left - titleOff.left)/titleOff.width);
      box.leftEnd =  Math.max(box.leftEnd, ((imgOff.left + imgOff.width) - titleOff.left)/titleOff.width);
      box.topStart = Math.min(box.topStart, (imgOff.top - titleOff.top)/titleOff.height);
      box.topEnd = Math.max(box.topEnd, ((imgOff.top + imgOff.height) - titleOff.top)/titleOff.height);
    });
  }

  const intersect = {
    topLeft: valueToPercent(box.leftStart) + ' ' + valueToPercent(box.topStart),
    topRight: valueToPercent(box.leftEnd) + ' ' + valueToPercent(box.topStart),
    bottomRight: valueToPercent(box.leftEnd) + ' ' + valueToPercent(box.topEnd),
    bottomLeft: valueToPercent(box.leftStart) + ' ' + valueToPercent(box.topEnd),
  }

  let path = `${intersect.topLeft}, ${intersect.topRight}, ${intersect.bottomRight}, ${intersect.bottomLeft}`;

  return path;
}

function intersects(a, b) {
  return (a.left < b.left + b.width &&
   a.left + a.width > b.left &&
   a.top < b.top + b.height &&
   a.top + a.height > b.top);
}