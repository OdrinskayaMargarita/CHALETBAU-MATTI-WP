import offset from './offset';
import valueToPercent from './value-to-percent';


export default (title, image) => {
  let titleOff = offset(title);
  let imgOff = offset(image);

  let leftStart = (imgOff.left - titleOff.left)/titleOff.width;
  let leftEnd = ((imgOff.left + imgOff.width) - titleOff.left)/titleOff.width;

  let topStart = (imgOff.top - titleOff.top)/titleOff.height;
  let topEnd = ((imgOff.top + imgOff.height) - titleOff.top)/titleOff.height;
  

  let intersect = {
    topLeft: valueToPercent(leftStart) + ' ' + valueToPercent(topStart),
    topRight: valueToPercent(leftEnd) + ' ' + valueToPercent(topStart),
    bottomRight: valueToPercent(leftEnd) + ' ' + valueToPercent(topEnd),
    bottomLeft: valueToPercent(leftStart) + ' ' + valueToPercent(topEnd),
  }
  let path = `${intersect.topLeft}, ${intersect.topRight}, ${intersect.bottomRight}, ${intersect.bottomLeft}`;

  return path;
}