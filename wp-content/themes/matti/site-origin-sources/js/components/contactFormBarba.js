export default () => {
    let captchaScript = document.createElement("script");
    captchaScript.setAttribute('src', 'https://www.google.com/recaptcha/api.js');
    document.body.appendChild(captchaScript);


    //Fixed for contact form 7 with barba js
    let siteUrl = window.location.protocol + '//' + window.location.hostname;
    if ('localhost' === window.location.hostname) {
        siteUrl = '//' + window.location.hostname + ':3000';
    }
    let cf7Script = document.createElement("script");
    cf7Script.setAttribute('src', siteUrl + '/wp-content/plugins/contact-form-7/includes/js/scripts.js');
    document.body.appendChild(cf7Script)
}