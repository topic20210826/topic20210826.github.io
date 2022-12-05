<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/img/coucha.ico">

    <title>幸茶 - 聯絡我們</title>

    <link href="//fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;800&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/css/style-starter.css">
    <link rel="stylesheet" href="/css/addin.css">
  </head>
  <body>
<!--header-->
<header id="site-header" class="fixed-top">
  <div class="container">
      <nav class="navbar navbar-expand-lg stroke px-0">
          <h1> <a class="navbar-brand" href="/">
          <img src="/img/coucha.png" alt="幸茶" style="height:65px;" />
              </a></h1>

          <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
              data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
              <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item @@home__active">
                      <a class="nav-link" href="/">主頁 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="/about">關於</a>
                  </li>
                  <li class="nav-item @@menu__active">
                      <a class="nav-link" href="/menu">菜單</a>
                  </li>
                  <li class="nav-item @@vote__active">
                      <a class="nav-link" href="/vote">飲料排名</a>
                  </li>
                  @if(session()->has('user_id'))
                  <li class="nav-item @@sign-out__active">
                      <a class="nav-link" href="/user/auth/sign-out">登出</a>
                  </li>
                  @else
                  <li class="nav-item @@sign-up__active">
                      <a class="nav-link" href="/user/auth/sign-up">註冊</a>
                  </li>
                  <li class="nav-item @@sign-in__active">
                      <a class="nav-link" href="/user/auth/sign-in">登入</a>
                  </li>
                  @endif
              </ul>
          </div>
      </nav>
  </div>

</header>
<!--/header-->
<section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-about py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">填寫表單</h2>
        </div>
    </div>
</section>
<div class="contact-form">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe7qVBuQ0rKN0AkHORsBkitE5d5CMSdrkPrjdNFeO_8nRMOKQ/viewform?embedded=true" 
  frameborder="0" marginheight="0" marginwidth="0">載入中…</iframe>
</div>
  <!-- footer -->
<footer class="py-5">
    <div class="container py-xl-4">
      <div class="row footer-top">
  
        <div class="col-lg-12 footer-grid_section_1its mt-lg-0">
            <h2>
              <a class="logo text-wh" href="/">
              <img src="/img/coucha.png" alt="幸茶" style="height:65px;" />
              </a>
            </h2>
          <div class="footer-text mt-4">
            <p><strong>地址 :</strong> 433台中市沙鹿區台灣大道七段XXX號</p>
            <p class="my-2"><strong>連絡電話 :</strong> <a href="tel:+04 2632XXXX">042632XXXX</a></p>
            <p><strong>信箱 :</strong> <a href="mailto:topic20210826@gmail.com">topic20210826@gmail.com</a></p>
            <p class="my-2">COPYRIGHT © 2021 KOU CHA 幸茶 All Rights Reserved | Design by <a href="http://w3layouts.com"> W3layouts.</a> </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- //footer -->
  
  
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };
  
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }
  
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- /move top -->

<script src="/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->

<script src="/js/theme-change.js"></script><!-- theme switch js (light and dark)-->

<script src="/js/owl.carousel.js"></script><!-- owl carousel -->

<!-- script for tesimonials carousel slider -->
<script>
  $(document).ready(function () {
    $("#owl-demo1").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        1000: {
          items: 1,
          nav: false,
          loop: false
        }
      }
    })
  })
</script>
<!-- //script for tesimonials carousel slider -->

<script src="/js/jquery.magnific-popup.min.js"></script>
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

    $('.popup-with-move-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom'
    });
  });
</script>

<script src="/js/counter.js"></script>

<!-- gallery popup js -->
<script src="/js/smartphoto.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sm = new SmartPhoto(".js-img-viwer", {
      showAnimation: false
    });
    // sm.destroy();
  });
</script>
<!-- //gallery popup js -->

<!--/MENU-JS-->
<script>
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>
<!--//MENU-JS-->

<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- //disable body scroll which navbar is in active -->

<!--bootstrap-->
<script src="/js/bootstrap.min.js"></script>
<!-- //bootstrap-->

</body>

</html>