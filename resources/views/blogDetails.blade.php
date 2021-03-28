@extends('master')

@section('content')
<section id="content">
    <div class="container">
      <div class="row">
        <div class="span8">
          <article>
            <div class="row">
              <div class="span8">
                <div class="post-image">
                  <div class="post-heading">
                    <h3><a href="#">Example single post title here</a></h3>
                  </div>
                  <img src="{{asset('frontend')}}/img/dummies/blog/img1.jpg" alt="" />
                </div>
                <p>
                  Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                  ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed. Dicam appetere ne qui, no has scripta appellantur. Mazim alienum appellantur eu cum, cu ullum officiis pro, pri at eius erat accusamus. Eos id
                  hinc fierent indoctum, ad accusam consetetur voluptatibus sit. His at quod impedit. Eu zril quando perfecto mel, sed eu eros debet.
                </p>
                <blockquote>
                  <i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, ei quod constituto qui. Summo labores expetendis ad quo, lorem luptatum et vis. No qui vidisse signiferumque...
                </blockquote>
                <p>
                  Fierent adipisci iracundia est ei, usu timeam persius ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed. Dicam appetere ne qui, no has scripta appellantur. Mazim alienum appellantur eu cum, cu ullum officiis pro, pri
                  at eius erat accusamus.
                </p>
                <div class="bottom-article">
                  <ul class="meta-post">
                    <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                    <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                    <li><i class="icon-tags"></i><a href="#">Web design</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </article>
          <!-- author info -->
          <div class="about-author">
            <a href="#" class="thumbnail align-left"><img src="{{asset('frontend')}}/img/avatar.png" alt="" /></a>
            <h5><strong><a href="#">John doe</a></strong></h5>
            <p>
              Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper ad qui, est rebum nulla argumentum ei.
            </p>
          </div>
      
        </div>
        <div class="span4">
            @include('layouts.aside')
        </div>
      </div>
    </div>
</section>
@endsection