export default () => {
    let siteUrl = window.location.protocol + '//' + window.location.hostname + window.location.pathname;
    if ('localhost' === window.location.hostname) {
        siteUrl = '//' + window.location.hostname + ':3000' + window.location.pathname;
    }
    let navigationItems = document.querySelectorAll('.menu__nav-item');
    if (navigationItems.length > 0) {
        navigationItems.forEach(function (item) {
            let getLink = item.querySelector('a');
            let getHref = getLink.getAttribute('href');
            item.classList.remove('menu__nav-item--active');
            if (siteUrl === getHref) {
                item.classList.add('menu__nav-item--active');
            }
        });
    }
}