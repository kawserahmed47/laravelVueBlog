<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Super Blog</title>


  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{asset('frontend')}}/css/bootstrap.css" rel="stylesheet" />
  <link href="{{asset('frontend')}}/css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="{{asset('frontend')}}/css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="{{asset('frontend')}}/css/jcarousel.css" rel="stylesheet" />
  {{-- <link href="{{asset('frontend')}}/css/flexslider.css" rel="stylesheet" /> --}}
  <link href="{{asset('frontend')}}/css/cslider.css" rel="stylesheet" />
  <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet" />
  <!-- Theme skin -->
  <link id="t-colors" href="{{asset('frontend')}}/skins/default.css" rel="stylesheet" />
  <!-- boxed bg -->
  {{-- <link id="bodybg" href="{{asset('frontend')}}/bodybg/bg1.css" rel="stylesheet" type="text/css" /> --}}
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="{{asset('frontend')}}/ico/favicon.png" />

  
  <!-- Styles -->
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body>
<div id="app">

    <div id="wrapper">
        {{-- @include('layouts/header') --}}
        <!-- end header -->
        <home-template></home-template>
        {{-- @yield('content')--}}
        {{-- @include('layouts/footer') --}}
    </div>
    
</div>
<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
<!-- javascript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{-- Script --}}
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{asset('frontend')}}/js/jquery.js"></script>
{{-- <script src="{{asset('frontend')}}/js/jquery.easing.1.3.js"></script> --}}
<script src="{{asset('frontend')}}/js/bootstrap.js"></script>
<script src="{{asset('frontend')}}/js/jcarousel/jquery.jcarousel.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.fancybox.pack.js"></script>
<script src="{{asset('frontend')}}/js/jquery.fancybox-media.js"></script>
<script src="{{asset('frontend')}}/js/google-code-prettify/prettify.js"></script>
<script src="{{asset('frontend')}}/js/portfolio/jquery.quicksand.js"></script>
<script src="{{asset('frontend')}}/js/portfolio/setting.js"></script>
<script src="{{asset('frontend')}}/js/jquery.flexslider.js"></script>
<script src="{{asset('frontend')}}/js/jquery.nivo.slider.js"></script>
<script src="{{asset('frontend')}}/js/modernizr.custom.js"></script>
<script src="{{asset('frontend')}}/js/jquery.ba-cond.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.slitslider.js"></script>
{{-- <script src="{{asset('frontend')}}/js/modernizr.custom.28468.js"></script> --}}
<script src="{{asset('frontend')}}/js/jquery.cslider.js"></script>
<script src="{{asset('frontend')}}/js/animate.js"></script>

<!-- Template Custom JavaScript File -->
<script src="{{asset('frontend')}}/js/custom.js"></script>

</body>

</html>
