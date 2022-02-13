
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
import Posts from './components/pages/Posts';
import PostDetail from './components/pages/PostDetail';

// inizializzo la classe del Router che conterrà tutte le rotte
const router = new VueRouter({
  
  // con "mode" entra in relazione con la history del browser (per i tasti avanti e indietro del browser)
  mode: 'history',
  
  // gli dico alla classe ".router-link-exact-active" dei router-link di diventare la mia classe ".active"
  linkExactActiveClass: 'active',
  
  // con "routes:" (parola chiave) gli passo un array di oggetti con tutte le nostre rotte
  // ogni singola rotta avra... 
  // un path (indirizzo nella url)
  // un nome (name) per far funzionare i tag <router-link> (sostituiscono i tag <a href="#">) 
  // un componente (component) da usare
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
    },
    {
      path: '/blog',
      name: 'blog',
      component: Posts
    },
    {
      // passo lo slug (che è un dato dinamico) nel path tramite i duepunti ":"
      path: '/detail/:slug',
      name: 'detail',
      component: PostDetail
    }
  ]
})

// esporto la classe "router"
export default router;