export default (items, item, className) => {
  items.forEach(function(el) {
    el.classList.remove(className);
  });
  item.classList.add(className);
}