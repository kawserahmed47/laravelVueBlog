<template>
    <div>

    <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                        <li class="breadcrumb-item active">Post List</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
      </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post List</h3>
                <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                              <router-link to="/add-post" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add Post
                              </router-link>
                        </div>
                        </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#SL</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th style="width: 40px">Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(post, index) in getallPost" :key="post.index">
                      <td>{{++index}}</td>
                      <td>{{post.title}}</td>
                      <td>{{post.category.name}}</td>
                      <td>{{post.description}}</td>
                      <td><img :src="post.image" height="200" width="200" alt="Preview"></td>
                      <td>
                        <span v-if="post.status==1" class="badge badge-success">Published</span>
                        <span v-else class="badge badge-danger">Unpublished</span>
                      </td>
                      <td><router-link :to="{path: '/edit-post/'+post.id}" class="btn btn-primary">Edit</router-link> | <button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
            </div>

        </div>

            

    </div>
</template>

<script>

export default {
    name: "PostList",

    mounted(){
           this.$store.dispatch("getallPost");
    },

   computed:{
       getallPost(){
           return this.$store.getters.getPost;
       }
   },


    methods:{
        deletePost(id){
            console.log(id);
            axios.delete('/api/post/'+id).then((response)=>{
                this.$store.dispatch("getallPost");
                console.log(response.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Post deleted successfully'
                })

            }).catch((error)=>{
                console.log(error)
                 Toast.fire({
                    icon: 'error',
                    title: 'Post delete failed'
                    });
                })
            }  
    }
}

</script>