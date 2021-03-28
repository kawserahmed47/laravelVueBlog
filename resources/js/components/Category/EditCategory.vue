<template>
    <div>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
         <div class="row">
             <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Category Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="updateCategory">
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category name<span class="text-danger">*</span></label>
                            <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea v-model="form.description" class="form-control" name="" id="" cols="30" rows="5" placeholder="Enter short description"></textarea>
                        </div>
                     
                        <div class="form-check">
                            <input id="checkbox" type="checkbox" v-model="form.status" class="form-check-input">
                            <label class="form-check-label" for="exampleCheck1">Active</label>
                        </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card -->

                </div>
            <div class="col-md-2"></div>

        </div>
    </div>
</template>

<script>
export default {
   name : "EditCategory",
   mounted(){
       axios.get(`http://localhost:8000/api/category/${this.$route.params.id}/edit`).then((response) =>{
           console.log(response.data);
            this.form.fill(response.data);
       })
   },
   data() {
       return {
           form: new Form({
           name:'',
           description:'',
           stauts:''           
       })
       }
      
   },

   
   computed:{
       getallCategory(){
           return this.$store.getters.getCategory;
       }
   },

   methods: {
       updateCategory(){
           this.form.put(`/api/category/${this.$route.params.id}`).then((response) =>{
               console.log(response);
               Toast.fire({
                icon: 'success',
                title: 'Category updated successfully'
            })
           }).catch((error) =>{
                console.log(error)
                 Toast.fire({
                icon: 'error',
                title: 'Category updated failed'
            })
           }
           )
       }

   }
}
</script>