<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/img/coucha.ico">

    <title>幸茶- 管理者主頁</title>

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
                <h1> <a class="navbar-brand" href="/store-index">
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
                            <a class="nav-link" href="/store-index">主頁 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="/merchandise/manage">管理商品資訊</a>
                        </li>
                        <li class="nav-item @@menu__active">
                            <a class="nav-link" href="/merchandise/create">新增商品資訊</a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="/order">顧客訂單</a>
                        </li>
                        @if (session()->has('user_id'))
                            <li class="nav-item @@sign-out__active">
                                <a class="nav-link" href="/user/auth/sign-out">登出</a>
                            </li>
                        @else
                            <li class="nav-item @@sign-up__active">
                                <a class="nav-link" href="/user/auth/store-sign-up">註冊</a>
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

    <section id="home" class="w3l-banner py-5">
        <div class="container py-lg-5 py-md-4 mt-lg-0 mt-md-5 mt-4">
            <div class="row align-items-center py-lg-5 py-4 mt-4">
                <div class="col-lg-6 col-sm-12">
                    <h3 class="">給人幸福的味道 </h3>
                    <h2 class="mb-4">COU CHA</h2>
                    <p>歡迎來到幸茶的大家庭，現在你可以開始管理商品及訂單了。</p>
                </div>
                <div class="col-lg-5">
                </div>
            </div>
        </div>
    </section>
    <!-- //footer -->
    <script src="/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
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
