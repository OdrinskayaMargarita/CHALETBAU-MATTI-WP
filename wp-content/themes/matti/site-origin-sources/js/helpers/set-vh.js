export default ()=>{
  setValue();

  window.addEventListener('resize', setValue);

  function setValue() {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  }
}