<template>
    <div>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Add</li>
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
                        <h3 class="card-title">Category Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  @submit.prevent="addCategory">
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category name<span class="text-danger">*</span></label>
                            <input type="text" name="name" v-model="form.name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="description" v-model="form.description" id="" cols="30" rows="5" placeholder="Enter short description"></textarea>
                        </div>
                     
                        <div class="form-group">
                            <input type="checkbox" v-model="form.status" name="status">
                            <label class="label" for="">Active</label>
                        </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
   name : "AddCategory",
   data() {
       return {
           form: new Form({
           name:'',
           description:'',
           stauts:true           
       })
       }
      
   },
   
   computed:{
       getallCategory(){
           return this.$store.getters.getCategory;
       }
   },

   methods: {
       addCategory(){
           this.form.post('/api/category').then((response) =>{
               console.log(response);
               Toast.fire({
                icon: 'success',
                title: 'Category added successfully'
            })
           }).catch((error) =>{
                console.log(error)
                 Toast.fire({
                icon: 'error',
                title: 'Category added failed'
            })
           }
           )
       }

   }
}
</script>