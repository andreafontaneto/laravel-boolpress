// per le chiamate Api richiamo axios nello stesso modo di Vue MA PRIMA DI LUI!
window.axios = require('axios');

window.Vue = require('vue');

import App from './App.vue';

const app = new Vue({
    el: '#app',
    render: h => h(App)
});
