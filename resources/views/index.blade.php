<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/img/coucha.ico">

    <title>幸茶</title>

    <link href="//fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- Template CSS -->
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
        <!-- 右下角 -->
        <button id="shopping_btn" onclick="location.href='/buy_check'">
            <img src="/img/shopping.png" alt="購物車" style="height:100px;" aria-hidden="true" />
        </button>
    </header>
    <!--/header-->
    <!-- banner section -->
    <section id="home" class="w3l-banner py-5">
        <div class="container py-lg-5 py-md-4 mt-lg-0 mt-md-5 mt-4">
            <div class="row align-items-center py-lg-5 py-4 mt-4">
                <div class="col-lg-6 col-sm-12">
                    <h3 class="">給人幸福的味道 </h3>
                    <h2 class="mb-4">COU CHA</h2>
                    <p>為了你們的健康，我們堅持採用無農藥的茶葉，並定期送往檢驗所把關品質，將最好的茶飲送到顧客的手中。</p>
                    <div class="mt-md-5 mt-4">
                        <a class="btn btn-primary btn-style mr-2" href="/buy_check"> 確認購買 </a>
                        <a class="btn btn-outline-primary btn-style" href="/merchandise"> 線上購買 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner section -->
    <section class="w3l-index3" id="work">
        <div class="midd-w3 py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <div class="col-lg-6 left-wthree-img text-righ">
                        <div class="position-relative">
                            <img src="/img/about_pic.jpg" alt="" class="img-fluid radius-image-full">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4 about-right-faq align-self">
                        <h5 class="title-small mb-1">我們的故事</h5>
                        <h3 class="title-big">關於幸茶</h3>
                        <p class="mt-sm-4 mt-3">
                            我們提供多樣選擇性，並且提供您客製化的功能及服務，讓您可以選擇自己所喜好的甜度以及冰度。如果您是喜好吃配料的客戶，我們也有提供新鮮豐富的配料來搭配你們所點選的飲料。</p>
                        <a class="btn btn-primary btn-style mt-md-5 mt-4 mr-2" href="/about"> 了解更多 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- /mobile section --->
    <section class="w3l-reasons py-5" id="how">
        <div class="main-w3 py-lg-5 py-md-4">
            <div class="container">
                <div class="title-content text-center">
                    <h6 class="title-small">三大保證</h6>
                    <h3 class="title-big">品牌堅持</h3>
                </div>
                <div class="row1 main-cont-wthree-fea mt-5 pt-lg-4 text-center">
                    <div class="col-lg-3 col-sm-6 grids-feature">
                        <a class="icon"><span class="fa fa-envira"></span></a>
                        <h4><a href="#feature" class="title-head">新鮮</a></h4>
                        <p>我們的茶葉都是當天由原產地運送過來的，我們的飲料都是現點現做，所以絕對新鮮。</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 grids-feature mt-sm-0 mt-5">
                        <a class="icon"><span class="fa fa-heartbeat"></span></a>
                        <h4><a href="#feature" class="title-head">健康</a></h4>
                        <p>為了你們的健康，我們的茶葉都有經過層層把關，我們的用心絕對讓你們喝的安心。</p>
                    </div>

                    <div class="col-lg-3 col-sm-6 grids-feature mt-lg-0 mt-sm-5 mt-5">
                        <a class="icon"><span class="fa fa-heart"></span></a>
                        <h4><a href="#feature" class="title-head">幸福</a></h4>
                        <p>我們用最禮貌的態度、最真誠的笑容、最有活力的精神來對待每個顧客。為了只是要讓你們有最幸福的感覺。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //mobile section --->
    <!-- middle -->
    <div class="middle py-5" id="call">
        <div class="container py-lg-3">
            <div class="welcome-left text-center py-md-5 py-3">
                <h3>關於飲料如果有任何意見，歡迎各位撥打以下電話或是填寫表單聯絡我們~</h3>
                <h3 class="mt-4">聯絡電話: <a href="tel:+04 2632XXXX">04 2632XXXX</a> </h3>
                <a href="/contact" class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2">填寫表單</a>
            </div>
        </div>
    </div>
    <!-- //middle -->
    <!--  Work gallery section -->
    <div class="w3l-gallery2" id="gallery">
        <div class="burger galleryks py-5">
            <div class="container py-lg-4 py-md-3">
                <h6 class="title-small text-center">照片鑑賞</h6>
                <h3 class="title-big mb-lg-5 mb-4 text-center">我們的飲料</h3>
                <div class="row no-gutters masonry">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/index1.jpg" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="lion">
                            <img src="/img/index1.jpg" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/vote_tea1.png" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="camel">
                            <img src="/img/vote_tea1.png" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/vote_tea2.png" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="hippopotamus">
                            <img src="/img/vote_tea2.png" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/vote_tea3.png" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="koala">
                            <img src="/img/vote_tea3.png" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/index4.png" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="bear">
                            <img src="/img/index4.png" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/about2.png" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="rhinoceros">
                            <img src="/img/about2.png" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/index2.jpg" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="hippopotamus">
                            <img src="/img/index2.jpg" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="/img/index3.png" class="js-img-viwer d-block"
                            data-caption="照片鑑賞" data-id="koala">
                            <img src="/img/index3.png" class="img-fluid radius-image-full" alt="burger gallery" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                <h4>觀看圖片</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  //Work gallery section -->

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
                        <p><strong>信箱 :</strong> <a href="mailto:topic20210826@gmail.com">topic20210826@gmail.com</a>
                        </p>
                        <p class="my-2">COPYRIGHT © 2021 KOU CHA 幸茶 All Rights Reserved | Design by <a
                                href="http://w3layouts.com"> W3layouts.</a> </p>
                        <a class="nav-link" href="/user/auth/store-sign-up">管理註冊</a>
                        <a class="nav-link" href="/store-index">管理主頁</a>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <script src="/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->

    <script src="/js/theme-change.js"></script><!-- theme switch js (light and dark)-->

    <script src="/js/owl.carousel.js"></script><!-- owl carousel -->

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
