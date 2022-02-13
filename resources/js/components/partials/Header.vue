<template>
  
  <header>
    <nav>
      <ul>
        <li>
          <!-- sostituisco i link con il tag <router-link> -->
          <!-- per far funzionare i link aggiungo :to che prenderà un oggetto{} -->
          <!-- questo oggetto avrà un parametro "name" che sarà quello settato nelle routes.js -->
          <!-- funziona anche con: <router-link to="/">Home</router-link> (quindi senza binding e name) -->
          <router-link :to="{name: 'home'}">Home</router-link>
        </li>
        <li>
          <router-link :to="{name: 'blog'}">Blog</router-link>
        </li>
        <li>
          <router-link :to="{name: 'about'}">Chi siamo</router-link>
        </li>
        <li>
          <router-link :to="{name: 'contacts'}">Contatti</router-link>
        </li>        
      </ul>
    </nav>
  </header>

</template>

<script>
export default {
  name: 'Header'
}
</script>

<style lang="scss" scoped>

header{
  background-color: rgb(18, 48, 114);
  text-align: center;
  padding: 30px 0;

  ul{
    list-style: none;

    li{
      display: inline-block;
      margin: 0 20px;

      a{
        text-decoration: none;
        color: #fff;
      }

      &:hover{
        text-decoration: underline;
      }
      .active{
        color: rgb(255, 251, 0);
      }
    }
  }
}


</style>