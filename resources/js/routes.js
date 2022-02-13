
// importo Vue
import Vue from "vue";
// importo VueRouter
import VueRouter from "vue-router";

// gli dico a Vue di utilizzare VueRouter
Vue.use(VueRouter);

// importo i componenti delle pagine
import Home from './components/pages/Home';
import About from './components/pages/About';
import Contacts from './components/pages/Contacts';

// inizializzo la classe del Router che conterrà tutte le rotte
const router = new VueRouter({
  // con "mode" entra in relazione con la history del browser (per i tasti avanti e indietro del browser)
  mode: 'history',
  // con "routes:" (parola chiave) gli passo un array di oggetti con tutte le nostre rotte
  // ogni singola rotta avraà un path(indirizzo), un name e un componente da usare
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/chi-siamo',
      name: 'about',
      component: About
    },
    {
      path: '/contatti',
      name: 'contacts',
      component: Contacts
    }
  ]
})

// esporto la classe "router"
export default router;