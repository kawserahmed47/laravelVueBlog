<template>
    <div>
        <section id="inner-headline">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="inner-heading">
            <h2>{{title}}</h2>
          </div>
        </div>
        <div class="span8">
          <ul class="breadcrumb">
            <li><router-link to="/"><i class="icon-home"></i> Home</router-link ><i class="icon-angle-right"></i></li>
            <li class="active">Single Post</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
    </div>
</template>

<script>
export default {
    props: ['title'],
}
</script>