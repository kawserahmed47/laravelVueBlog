<template>
    <div>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post Add</li>
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
                        <h3 class="card-title">Post Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="addPost" enctype="multipart/form-data">
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post titile<span class="text-danger">*</span></label>
                            <input :class="{ 'is-invalid': form.errors.has('title') }" type="text"  v-model="form.title" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                            <has-error :form="form" field="title"></has-error>

                        </div>

                        <div class="form-group">
                        <label>Category<span class="text-danger">*</span></label>
                        <select class="form-control select2" v-model="form.category" style="width: 100%;">
                            <option value="">Category</option>
                            <option v-for="category  in getallCategory" :key="category.id" :value="category.id" >
                                {{ category.name}}
                            </option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" v-model="form.description" id="" cols="30" rows="5"></textarea>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="customFile">Upload Image</label><br>
                                        <input type="file"  name="photo"   @change="changeImage($event)" >
                                    </div>
                                
                                    <div class="form-check">
                                        <input type="checkbox" v-model="form.status" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Published</label>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <img class="" :src="form.photo" height="200" width="300" alt="ImagePreview">
                            </div>
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
   name : "AddPost",
   data() {
       return {
           form: new Form({
           title:'',
           photo:'',
           category:'', 
           description:'',
           stauts:''          
            })
       }
      
   },

    mounted(){
        this.$store.dispatch("getAllCategory");

   },
   
   computed:{
       getallCategory(){
           return this.$store.getters.getCategory;
       }
   },

   methods: {

       changeImage(event){
           let file = event.target.files[0];
           let reader = new FileReader();
            reader.onload = event => {
                console.log(event.target.result);
                this.form.photo = event.target.result

            };
            reader.readAsDataURL(file);
       },

       


       addPost(){
           

           this.form.post('/api/post').then((response) =>{
               console.log(response);
               Toast.fire({
                icon: 'success',
                title: 'Post added successfully'
            })
           }).catch((error) =>{
                console.log(error)
                 Toast.fire({
                icon: 'error',
                title: 'Post added failed'
            })
           }
           )
       }

   }
}

</script>