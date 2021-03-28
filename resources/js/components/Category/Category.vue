<template>
    <div>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category List</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
         <div class="row">
             <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>

                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                              <router-link to="/add-category" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add Category
                              </router-link>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>#SL</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category, index) in getallCategory" :key="category.index" >
                            <td>{{++index}}</td>
                            <td>{{category.name}}</td>
                            <td>{{category.created_at | timeFormat}}</td>
                            <td>
                                <span v-if="category.status==1" class="badge badge-success">Active</span>
                                <span v-else class="badge badge-danger">Inactive</span>

                            </td>
                            <td> <router-link :to="{path: '/edit-category/'+category.id}" class="btn btn-primary">Edit</router-link>| <button class="btn btn-danger" @click.prevent="deleteCategory(category.id)">Delete</button></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                            
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
            <div class="col-md-2"></div>

        </div>
    </div>
</template>

<script>
export default {
    name: "CategoryList",

    mounted(){
           this.$store.dispatch("getAllCategory");
    },

   computed:{
       getallCategory(){
           return this.$store.getters.getCategory;
       }
   },


    methods:{
        deleteCategory(id){
            console.log(id);
            axios.delete('/api/category/'+id).then((response)=>{
                this.$store.dispatch("getAllCategory");
                console.log(response.data);
                Toast.fire({
                    icon: 'success',
                    title: 'Category deleted successfully'
                })

            }).catch((error)=>{
                console.log(error)
                 Toast.fire({
                    icon: 'error',
                    title: 'Category delete failed'
                    });
                })
            }  
    }
}
</script>