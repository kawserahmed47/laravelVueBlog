<template>
    <div>
        <aside class="right-sidebar">
    <div class="widget">
      <form class="form-search">
        <input placeholder="Type something" type="text" class="input-medium search-query">
        <button type="submit" class="btn btn-square btn-theme">Search</button>
      </form>
    </div>
    <div class="widget">
      <h5 class="widgetheading">Categories</h5>
      <ul class="cat">

        <li v-for="category in getasideCategory" :key="category.id" ><i class="icon-angle-right"></i><a href="#">{{category.name}}</a></li>

      </ul>
    </div>
   
</aside>
    </div>
</template>


<script>
export default {
    name: "Aside",

     mounted(){
           this.$store.dispatch("getAllCategory");
    },

   computed:{
       getasideCategory(){
           return this.$store.getters.getCategory;
       }
   },

   
}
</script>