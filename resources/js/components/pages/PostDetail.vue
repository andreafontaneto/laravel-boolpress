<template>
  
  <main class="container">
    
    <h1 class="title">{{ post.title }}</h1>
    
    <h3 v-if="post.category" class="category">{{ post.category.name }}</h3>
    
    <div v-if="post.tags" class="tags">
      <span v-for="(tag, index) in post.tags" :key="`tag${index}`" class="tag">{{ tag.name }}</span>
    </div>
    
    <p class="content">{{ post.content }}</p>
  
  </main>

</template>

<script>
export default {
  name: 'PostDetail',

  data(){
    return{

      apiUrl: 'http://127.0.0.1:8000/api/posts/',
      post:{
        'title': '',
        'content': '',
        'category': '',
        'tags': []

      }

    }
  },

  methods: {

    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
          .then(res => {
            this.post = res.data;
            console.log(this.post);
          })
    }

  },

  mounted(){

    console.log(this.$route.params.slug);
    this.getApi();

  }
}
</script>

<style lang="scss" scoped>

.container{
  margin-top: 50px;

  .title, .category{
    margin-bottom: 20px;
  }

  .category{
    font-weight: bold;
    font-style: italic;
    background-color: rgb(0, 140, 255);
    display: inline-block;
    padding: 5px 15px;
    color: white;
  }

  .tags{
    margin-bottom: 20px;

    .tag{
      font-size: 12px;
      margin-right: 10px; 
      background-color: aqua;
      padding: 5px 15px;
    }
  }
}

</style>