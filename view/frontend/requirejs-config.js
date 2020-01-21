//We need to use a shim because the script exports a global
var config = {
    paths:{
        CookieConsent: 'https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min',
    },
    shim: {
        CookieConsent:{
            exports: 'cookieconsent'
        }
    }
};
