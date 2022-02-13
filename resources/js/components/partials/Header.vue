<template>
  
  <header>
    <nav>
      <ul>
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a class="active" href="#">Blog</a>
        </li>
        <li>
          <a href="#">Chi siamo</a>
        </li>
        <li>
          <a href="#">Contatti</a>
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