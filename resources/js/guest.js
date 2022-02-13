// per le chiamate Api richiamo axios nello stesso modo di Vue MA PRIMA DI LUI!
window.axios = require('axios');

window.Vue = require('vue');

import App from './App.vue';
// importo la classe "router" dal file routes.js
import router from './routes';

const app = new Vue({
    el: '#app',
    // la "inietto" dentro a Vue
    // "router:"" è una parola chiave / " router" è il nome della classe (scelto da noi)
    router: router,
    render: h => h(App)
});
