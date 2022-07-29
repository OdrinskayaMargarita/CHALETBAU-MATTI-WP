export default (val) => {
  if (val<0) {
    val = 0
  } else if (val > 1) {
    val = 1
  }
  return val*100+'%';
}