<template>
    <div>
        <Slider></Slider>
       <section id="content">
    <div class="container">
      <div class="row">
        <div class="span8">
          <article v-for="post in getallPost" :key="post.id">
            <div class="row">
              <div class="span8">
                <div class="post-image">
                  <div class="post-heading">
                    <h3><router-link :to="{path: '/blog-details/'+post.id}">{{post.title}}</router-link></h3>
                  </div>
                  <div v-if="post.image">
                        <img :src="post.image" alt="" />
                  </div>
                </div>
                <p>
                  {{post.description}}
                </p>
                <div class="bottom-article">
                  <ul class="meta-post">
                    <li><i class="icon-calendar"></i><a href="#"> {{post.created_at | timeFormat}}</a></li>
                    <li><i class="icon-user"></i><a href="#"> {{post.created_by.name}}</a></li>
                    <li><i class="icon-folder-open"></i><a href="#"> {{post.category.name}}</a></li>
                  </ul>
                  <router-link :to="{path: '/blog-details/'+post.id}" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                </div>
              </div>
            </div>
          </article>
        



          <!-- <div id="pagination">
            <span class="all">Page 1 of 3</span>
            <span class="current">1</span>
            <a href="#" class="inactive">2</a>
            <a href="#" class="inactive">3</a>
          </div> -->
        </div>
        <div class="span4">
            <Aside></Aside>
        </div>
      </div>
    </div>
</section>

    </div>
</template>

<script>
import Slider from './Slider'
import Aside from './Aside'
export default {
    name:"Blog",
    components:{
        Slider, Aside
    },
    mounted(){
           this.$store.dispatch("getallPost");
    },

   computed:{
       getallPost(){
           return this.$store.getters.getPost;
       }
   },

}
</script>