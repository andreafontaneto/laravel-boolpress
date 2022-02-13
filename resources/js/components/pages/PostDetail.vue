<template>
  
  <main class="container">
    <h1 class="title">{{ post.title }}</h1>
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

  .title{
    margin-bottom: 30px;
  }
}

</style>