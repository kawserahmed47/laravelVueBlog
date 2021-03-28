<template>
    <div>
        <Heading :title="item.title"></Heading>
        <section id="content">
    <div class="container">
      <div class="row">
        <div class="span8">
          <article>
            <div class="row">
              <div class="span8">
                <div class="post-image">
                  <div class="post-heading">
                    <h3><a href="#">{{item.title}}</a></h3>
                  </div>
                  <img :src="item.image" alt="" />
                </div>
                <p>
                 {{item.description}}
                </p>
       
                <div class="bottom-article">
                  <ul class="meta-post">
                    <li><i class="icon-calendar"></i><a href="#"> {{item.created_at | timeFormat}}</a></li>
                    <li><i class="icon-user"></i><a href="#"> {{item.created_by.name}}</a></li>
                    <li><i class="icon-folder-open"></i><a href="#"> {{item.category.name}}</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </article>
          <!-- author info -->
     
      
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
import Heading from './Heading'
import Aside from './Aside'
export default {

    components:{
        Heading, Aside
    },
      mounted(){
       axios.get(`http://localhost:8000/api/post/${this.$route.params.id}/edit`).then((response) =>{
           console.log(response.data);
            this.item=response.data;
            console.log(this.item);
       }),

        this.$store.dispatch("getAllCategory");

   },
   data() {
       return {
          item:{
              title: "",
              created_at:"",
              created_by:[],
              category:[],
              image:""

          }
       }
      
   },
}
</script>