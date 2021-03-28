<template>
    <div>
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post Edit</li>
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
                        <h3 class="card-title">Post Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="updatePost" enctype="multipart/form-data">
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post titile<span class="text-danger">*</span></label>
                            <input type="text" v-model="form.title" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                        </div>

                        <div class="form-group">
                        <label>Category<span class="text-danger">*</span></label>
                        <select class="form-control select2" v-model="form.category" style="width: 100%;">
                            <option value="">Select</option>
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
                                <img class="" :src="form.image" alt="ImagePreview">
                            </div>
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
   name : "EditPost",
   mounted(){
       axios.get(`http://localhost:8000/api/post/${this.$route.params.id}/edit`).then((response) =>{
           console.log(response.data);
            this.form.fill(response.data);
       }),

        this.$store.dispatch("getAllCategory");

   },
   data() {
       return {
           form: new Form({
           title:'',
           category:'',
           description:'',
           stauts:'',
           image:''           
       })
       }
      
   },

   
   computed:{
       getallPost(){
           return this.$store.getters.getPost;
       },
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
                this.form.image = event.target.result

            };
            reader.readAsDataURL(file);
       },

       updatePost(){
           this.form.put(`/api/post/${this.$route.params.id}`).then((response) =>{
               console.log(response);
               Toast.fire({
                icon: 'success',
                title: 'Post updated successfully'
            })
           }).catch((error) =>{
                console.log(error)
                 Toast.fire({
                icon: 'error',
                title: 'Post updated failed'
            })
           }
           )
       }

   }
}
</script>