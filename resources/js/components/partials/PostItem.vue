<template>

  <article>
    <!-- <h3><a href="#">{{ post.title }}</a></h3> -->

    <!-- sostituisco il link con un router-link -->
    <!-- oltre al "name", gli passo "params" che è un oggetto a sua volta -->
    <!-- gli passo come parametro il mio dato dinamico "slug" e come valore "post.slug" -->
    <router-link :to="{name: 'detail', params: {slug: post.slug}}">{{ post.title }}</router-link>
    <p class="date">{{ formatDate }}</p>
    <p v-if="post.category" class="category">{{ post.category.name }}</p>
    <div v-if="post.tags">
      <span v-for="tag in post.tags" :key="`tag${tag.id}`" class="tags">{{ tag.name }}</span>
    </div>
    <p class="post-content">{{ truncateText }}</p>
  </article>
  
</template>

<script>
export default {
  name:'PostItem',

  props: {
    'post': Object
  },

  computed: {
    truncateText(){
      return this.post.content.substr(0, 100) + '...';
    },

    formatDate(){
      
      // inizializzo una nuova classe "Date" che prende come parametro la data che gli passo
      // se non passo nessun parametro ( es. new Date() ) prende la data di oggi
      const d = new Date(this.post.created_at);
      let day = d.getDate();
      // aggiungo +1 perchè parte da 0 e va fino a 11
      // quindi gennaio sarebbe 0, febbraio 1, marzo 2, ecc.
      let month = d.getMonth() + 1;
      const year = d.getFullYear();

      if(day < 10 || month < 10){
        day = '0' + day;
        month = '0' + month;
      }

      return `${day}/${month}/${year}`;
    }
  }
}
</script>

<style lang="scss" scoped>

article{
  margin-bottom: 30px;

  h3{
    margin-bottom: 5px;

    a{
      text-decoration: none;
      color: black;

      &:hover{
        color: rgb(49, 49, 255);
        text-decoration: underline;
      }
    }
  }

  .date{
    font-size: 12px;
    font-style: italic;
    margin-bottom: 5px;
  }

  .category{
    margin: 10px 0;
    font-weight: bold;
    font-style: italic;
    background-color: rgb(0, 140, 255);
    display: inline-block;
    padding: 5px 15px;
    color: white;
  }

  .tags{
    font-size: 12px;
    margin-right: 10px; 
    background-color: aqua;
    padding: 5px 15px;
  }

  .post-content{
    font-size: 14px;
    margin-top: 10px;
  }
}

</style>