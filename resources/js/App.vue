<template>

<div>
  
  <Header />
  
  <!-- ora Posts non serve più -->
  <!-- <Posts /> -->

  <!-- qui si iniettano tutti i componenti dalle rotte -->
  <router-view></router-view>
  
  <Footer />

</div>
  
</template>

<script>

import Header from './components/partials/Header.vue';
import Footer from './components/partials/Footer.vue';
// import Posts from './components/Posts.vue';

export default {
  name: 'App',
  
  components: {
    Header,
    Footer,
    // Posts
  }
}
</script>

<style lang="scss">

</style>