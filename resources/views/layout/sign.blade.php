<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/coucha.ico">
    <title>幸茶 - @yield('title')</title>
    <link href="//fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style-starter.css">
    <link rel="stylesheet" href="/css/addin.css">
</head>

<body>
    <div class="form-content">
        <div class="form-right">
            <div class="overlay">
                <div class="grid-info-form">
                    <h3>幸茶是什麼？</h3>
                    <br></br>
                    <p>幸茶取至於幸福的茶飲，幸福(koufuku)中幸(kou)這個音與紅茶(koucha)中的紅(kou)相同，所以以此命名。</p>
                    <br></br>
                    <p>如果想要更深入瞭解本店，歡迎點選下方按鍵。</p>
                    <a href="/about" class="read-more btn">關於幸茶</a>
                </div>
            </div>
        </div>
        <div class="form-left">
            @yield('content')
        </div>
    </div>

    <script src="/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
    <script src="/js/theme-change.js"></script><!-- theme switch js (light and dark)-->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/other.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/counter.js"></script>
    <script src="/js/smartphoto.js"></script>

</body>

</html>
