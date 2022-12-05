<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/coucha.ico">
    <title>幸茶 - @yield('title')</title>
    <link href="//fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="/css/style-starter.css">
    <link rel="stylesheet" href="/css/addin.css">
</head>

<body>
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1> <a class="navbar-brand" href="/">
                        <img src="/img/coucha.png" alt="幸茶" style="height:65px;" />
                    </a>
                </h1>

                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">主頁 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="/about">關於</a>
                        </li>
                        <li class="nav-item @@menu__active">
                            <a class="nav-link" href="/menu">菜單</a>
                        </li>
                        <li class="nav-item @@vote__active">
                            <a class="nav-link" href="/merchandise/vote">飲料排名</a>
                        </li>
                        <li class="nav-item @@vote__active">
                            <a class="nav-link" href="/create_join/join">團購</a>
                        </li>
                        @if (session()->has('user_id'))
                            <li class="nav-item @@welcome__active">
                                <a class="nav-link" href="/user/auth/userdata">個人資料</a>
                            </li>
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

    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container py-lg-5 py-md-3">
                <h2 class="title">@yield('title')</h2>
            </div>
        </div>
    </section>
    <div>
        <div class="w3l-aboutblock1" id="userdata">
            <div class="userdata-padding">
                <div class="row">
                    <div class="userdata-left">
                        <div class="welcome-top">
                            <h6>歡迎, {{ $User->nickname }}</h6>
                        </div>
                        <div class="welcome-buttom">
                            <a class="nav-link" href="/user/auth/userdata">修改使用者資料</a>
                            <a class="nav-link" href="/transaction">交易紀錄</a>
                            <a class="nav-link" href="/ticket">我的優惠券</a>
                            <a class="nav-link" href="/create_join/joinrecord">團購紀錄</a>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
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
                        <p class="my-2"><strong>連絡電話 :</strong> <a href="tel:+04 2632XXXX">042632XXXX</a>
                        </p>
                        <p><strong>信箱 :</strong> <a href="mailto:topic20210826@gmail.com">topic20210826@gmail.com</a>
                        </p>
                        <p class="my-2">COPYRIGHT © 2021 KOU CHA 幸茶 All Rights Reserved | Design by <a
                                href="http://w3layouts.com"> W3layouts.</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/theme-change.js"></script><!-- theme switch js (light and dark)-->

    <script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js" type="application/javascript"></script>
    <script>
        $(function() {
            // This button will increment the value
            $('.qtyplus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name=' + fieldName + ']').val(currentVal + 1);
                } else {
                    // Otherwise put a 1 there
                    $('input[name=' + fieldName + ']').val(1);
                }
            });
            // This button will decrement the value till 1
            $('.qtyminus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If it isn't undefined or its greater than 1
                if (!isNaN(currentVal) && currentVal > 1) {
                    // Decrement one
                    $('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    // Otherwise put a 1 there
                    $('input[name=' + fieldName + ']').val(1);
                }
            });
        });
    </script>
    <script>
        $('[data-countdown]').each(function() {
            var $this = $(this);
            var finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('剩%D天%H小時%M分鐘%S秒'));
            });
        });
    </script>

    <script src="/js/owl.carousel.js"></script><!-- owl carousel -->

    <script>
        function listBtn() {
            var listBtn = document.getElementById('listBtn');
            var textlistn = document.getElementById('textlistn');
            if (textlistn.style.display === 'none') {
                textlistn.style.display = 'block';
            } else {
                textlistn.style.display = 'none';
            }
        }
    </script>
    <script>
        function listBtn2() {
            var listBtn = document.getElementById('listBtn2');
            var textlistn = document.getElementById('textlistn2');
            if (textlistn.style.display === 'none') {
                textlistn.style.display = 'block';
            } else {
                textlistn.style.display = 'none';
            }
        }
    </script>
    <script>
        function listBtn3() {
            var listBtn = document.getElementById('listBtn3');
            var textlistn = document.getElementById('textlistn3');
            if (textlistn.style.display === 'none') {
                textlistn.style.display = 'block';
            } else {
                textlistn.style.display = 'none';
            }
        }
    </script>
    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function() {
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
        $(document).ready(function() {
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
        document.addEventListener('DOMContentLoaded', function() {
            const sm = new SmartPhoto(".js-img-viwer", {
                showAnimation: false
            });
            // sm.destroy();
        });
    </script>
    <!-- //gallery popup js -->
    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });
        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->
    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
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
