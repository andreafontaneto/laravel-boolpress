<template>

  <main>
    <div v-if="posts">

      <div class="container">
      
        <h1>I miei Posts</h1>

        <PostItem 
          v-for="post in posts"
          :key="`post${post.id}`"
          :post="post"
        />

        <div class="pagination">
          <button 
          @click="getPosts(pagination.current - 1)"
          :disabled="pagination.current === 1"> << </button>

          <button
            v-for="i in pagination.last"
            :key="`page${i}`"
            @click="getPosts(i)"
            :disabled="pagination.current === i">
            {{ i }}
          </button>

          <button 
          @click="getPosts(pagination.current + 1)"
          :disabled="pagination.current === pagination.last"> >> </button>
        </div>

      </div>

    </div>

    <div v-else class="container">
      <h5>LOADING...</h5>
    </div>
    
  </main>

</template>

<script>
// dopo lo spostamento di Posts dentro alla cartella "pages", correggere il from del componente!!
import PostItem from '../partials/PostItem.vue';

export default {
  name: 'Posts',

  components: {
    PostItem
  },

  data(){
    return{

      // apiUrl: 'http://127.0.0.1:8000/api/posts',

      // la nuova apiUrl per visualizzare le pagine diventa ".../posts?page=" più il numero della pagina
      apiUrl: 'http://127.0.0.1:8000/api/posts?page=',
      posts: null, // si potrebbe fare un oggetto, ma così si gestisce il loading
      pagination: {} // per recuperare i bottoni della paginazione faccio un oggetto "pagination" (per comodità) vuoto

    }
  },

  mounted(){
    this.getPosts();
  },

  methods: {

    getPosts(page = 1){
      // richiamo il data "posts" per gestire il loading
      // mettendo posts = null ogni volta resetta i post e visualizza il loading per fare un caricamento ad ogni click
      // altrimenti rimane tutto fermo e vengono sostituiti i post quando vengono caricati (quando arriva il dato)
      this.posts = null;
      // console.log(axios);
      axios.get(this.apiUrl + page)
        .then(res => {

          // SE in Api > PostController abbiamo passato $post SENZA compact()
          // allora "res" è direttamente l'array (data) che contiene tutti i post
          
          // SE in Api > PostController abbiamo passato $post TRAMITE compact()
          // allora "res" è un oggetto che contiene un array (data) con tutti i post
          // per vedere l'array pulito (senza oggetto come genitore) dobbiamo passare "res.data.posts"
          
          // console.log(res);
          // console.log(res.data);

          // this.posts = res.data;
          
          // avendo aggiungo il paginate() nel PostController, nel JSON si avranno altre informazioni e non solo l'array con tutti i post
          // quindi da res.data si aggiugnerà ancora .data (res.data.data) per prendere SOLO l'array con tutti i post
          this.posts = res.data.data;

          // adesso dico all'oggetto vuoto "pagination" salvato in data() di recuperare i bottoni per la paginazione come proprietà
          this.pagination = {
            current: res.data.current_page, // chiamando pagination.current saprò a che pagina sono
            last: res.data.last_page // chiamando pagination.last_page saprò qual'è l'ultima pagina
          }

          console.log(this.posts);
          console.log(this.pagination);
        })
    }

  }
}
</script>

<style lang="scss" scoped>

main{
  margin: 30px 0;

  h1{
    margin-bottom: 20px;
  }

  .pagination{
    padding-bottom: 50px;
    
    button{
      padding: 10px;
    }
  }
}

</style>