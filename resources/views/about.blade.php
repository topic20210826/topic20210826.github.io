@extends('layout.main')

@section('title', $title)

@section('content')
    <section class="w3l-aboutblock1" id="about">
        <div class="midd-w3 py-6">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <div class="col-lg-6 left-wthree-img text-righ">
                        <div class="position-relative">
                            <img src="/img/about2.png" alt="" class="img-fluid radius-image-full">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4 about-right-faq align-self">
                        <h3 class="title-big">關於幸茶</h3>
                        <p class="mt-4">靜岡茶、鹿兒島茶、三重茶通通都有，就是沒有屬於岐阜的茶。
                            既然這樣，今後只好自己研發。
                            這個品牌是源自於擁有茶葉之手的少女—古手鹿妻。
                            從小立志為全村驕傲的雛見沢村民，研發出專屬於雛見沢的特色茶品。
                            在全世界締造的偉大史詩。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w3l-aboutblock2" id="about">
        <div class="midd-w3 py-6">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4 about-right-faq align-self">
                        <h3 class="title-big">幸茶是什麼？</h3>
                        <p class="mt-4">幸茶取至於幸福的茶飲，幸福(koufuku)中幸(kou)這個音與紅茶(koucha)中的紅(kou)相同，所以以此命名。
                            <br>
                            幸茶的理念就是當你身心疲倦時，他可以治癒我的心靈，讓我感到很舒服；
                            當你想念故鄉時，他會扮演媽媽的角色，提供各國的茶飲解除你的鄉愁；
                            當你缺少幸福的時候，他會從茶中提供滿滿的愛，讓你感到暖心。
                        </p>
                    </div>
                    <div class="col-lg-6 left-wthree-img text-righ">
                        <div class="position-relative">
                            <img src="/img/about1.jpg" alt="" class="img-fluid radius-image-full">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
    <section class="w3l-clients-1" id="testimonials">
        <div class="cusrtomer-layout py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="heading align-self text-center">
                    <h6 class="title-small">品牌故事</h6>
                    <h3 class="title-big mb-md-5 mb-4">歷史沿革</h3>
                </div>
                <div class="testimonial-row py-md-4">
                    <div id="owl-demo1" class="owl-two owl-carousel owl-theme mb-md-3 mb-sm-5 mb-4">
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>幸茶創立於1983年是源自於日本雛見沢，當時古手鹿妻在村內販售並且在村內有不錯的口碑。</q>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>1994年古手鹿妻為了要精研烘焙工藝，所以離開家鄉去京都向有名的大師學習茶藝。</q>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>2000年回到家鄉改良茶葉，並且運用在大學學習到的商業知識，到日本各地推廣茶葉。</q>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>2021年由於台灣的手搖飲店流行，決定於台灣開設第一間飲料店。</q>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w3l-forms-9 py-5" id="">
        <div class="main-w3 py-lg-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="main-midd col-lg-8">
                        <h3 class="title-big">如有任何問題與建議，歡迎您寄信或者是填寫表單聯絡我們！</h3>
                    </div>
                    <div class="main-midd-2 col-lg-4 mt-lg-0 mt-4 text-lg-right">
                        <a class="btn btn-white btn-style" href="/contact"> 填寫表單 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
