@if(!session()->get('session_short_name'))
    @php
    $current_short_name = $global_short_name;
    @endphp
@else
    @php
    $current_short_name = session()->get('session_short_name');
    @endphp
@endif

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title','24 News Live')</title>
    <meta name="keywords" content="@yield('meta_keywords','24, 24x7, 24newslive, Malayalam News, Breaking News')">
    <meta name="description" content="@yield('meta_description','24 News Live Portal')">
    <meta property="og:image" content="@yield('og:image')" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('uploads/'.$global_setting_data->favicon) }}">
    <meta name="theme-color" content="#9e0104" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @include('front.layout.styles')
    @include('front.layout.scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>
</head>
<body class="copy-content-lock">
    <header class="w-100 home">
        <div class="container-fluid px-0 py-1 top-banner">
            <div class="container d-flex align-items-center justify-content-center justify-content-sm-between">
                <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}">Home</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Special">Special</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Trending">Trending</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Live">Live Channels</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Kerala">Kerala</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#India">India</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Editor">Editor Pick</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Religion">Religion</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#TopNews">Top News</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#English">English News</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Catholic">Catholic</a> </li>
                            <!-- <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}#Knanaya">Knanaya</a> </li> -->
                            <li class="nav-item"> <a class="nav-link" href="{{ route('testimonials') }}">Testimonials</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('volunteer') }}">Volunteers</a> </li>
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">More<i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('home') }}#13">13 DAYS BIBLE READING</a></li>
                                    <li><a class="dropdown-item" href="{{ route('home') }}#14">BEST CHRISTIAN TALK</a></li>
                                    <li><a class="dropdown-item" href="{{ route('home') }}#Obituary">OBITUARY</a></li>
                                    <li><a class="dropdown-item" href="{{ route('home') }}#LiveTalk">Live Talk</a></li>
                                    <li><a class="dropdown-item" href="{{ route('home') }}#US">US News</a></li>
                                    <li><a class="dropdown-item" href="{{ route('home') }}#Canada">CANADA News</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="social d-none d-sm-block d-lg-none">
                    <ul class="d-flex m-0 p-0 align-items-center">
                                @foreach($global_social_item_data as $item)
                                <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>
                                @endforeach
                    </ul>
                </div>
                <p>{{ TODAY }}: {{ date('F d, Y') }}</p>
            </div>
        </div>
        <div class="container pt-2 pt-sm-3 pb-3 logo-banner">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('uploads/'.$global_setting_data->logo) }}" class="img-fluid" alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-10 header-add mt-3 mt-md-0">
                    <div class="row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <a href="#"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad) }}" class="w-100" alt=""></a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad1) }}" class="w-100" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('front.layout.nav')
        @yield('main_content')


    </header>
    <!--header-->


    <footer class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-sm-4 col-lg-2 mb-4">
                            <h4>{{ FOOTER_COL_2_HEADING }}</h4>
                            <ul>
                            @php
                            $current_lang_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;

                            $page_data = \App\Models\Page::where('language_id',$current_lang_id)->first();
                            @endphp


                            <li><a href="{{ route('home') }}">{{ HOME }}</a></li>
                            @if($page_data->faq_status == 'Show')
                            <li class="menu"><a href="{{ route('faq') }}">{{ $page_data->faq_title }}</a></li>
                            @endif

                            @if($page_data->about_status == 'Show')
                            <li class="menu"><a href="{{ route('about') }}">{{ $page_data->about_title }}</a></li>
                            @endif

                            @if($page_data->contact_status == 'Show')
                            <li class="menu"><a href="{{ route('contact') }}">{{ $page_data->contact_title }}</a></li>
                            @endif

                            @if($page_data->login_status == 'Show')
                            <li class="menu"><a href="{{ route('login') }}">{{ $page_data->login_title }}</a></li>
                            @endif

                            @if($page_data->terms_status == 'Show')
                            <li><a href="{{ route('terms') }}">{{ $page_data->terms_title }}</a></li>
                            @endif

                            @if($page_data->privacy_status == 'Show')
                            <li><a href="{{ route('privacy') }}">{{ $page_data->privacy_title }}</a></li>
                            @endif

                            @if($page_data->disclaimer_status == 'Show')
                            <li><a href="{{ route('disclaimer') }}">{{ $page_data->disclaimer_title }}</a></li>
                            @endif


                            <li><a href="{{ route('volunteer') }}">Volunteers</a></li>
                            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>

                            </ul>
                        </div>
                        <div class="col-sm-8 col-lg-4 mb-4">
                            <h4>Editor Picks</h4>
                            <a href="#"> <img src="{{ asset('uploads/24news_St_Mary.jpg') }}" class="img-fluid pe-3" alt="" class="w-100" ></a>
                            <!-- <ul>
                                <li class="mb-3">
                                    <a href="#" class="d-flex align-items-center"> <img src="images/news-41.jpg" class="img-fluid pe-3" alt="">
                                        <p>Ukraine rebels mobilize troops amid Russia invasion fears</p>
                                    </a>
                                </li>
                                <li class="mb-3">
                                    <a href="#" class="d-flex align-items-center"> <img src="images/news-42.jpg" class="img-fluid pe-3" alt="">
                                        <p>Ukraine rebels mobilize troops amid Russia invasion fears</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex align-items-center"> <img src="images/news-43.jpg" class="img-fluid pe-3" alt="">
                                        <p>Ukraine rebels mobilize troops amid Russia invasion fears</p>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                        <div class="col-sm-8 col-lg-4 mb-4">
                            <h4>{{ FOOTER_COL_4_HEADING }}</h4>

                            <p class="mb-3">
                                {{ NEWSLETTER_TEXT }}
                            </p>

                            <form action="{{ route('subscribe') }}" method="post" class="form_subscribe_ajax">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="{{ EMAIL_ADDRESS }}">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="{{ SUBSCRIBE_NOW }}">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4 col-lg-2 mb-4">
                            <h4>Browse</h4>
                            <ul>
                                <li><a href="{{ route('home') }}" class="d-flex align-items-center">Home<span
                                            class="ps-2 ms-auto">0</span></a></li>
                                <li><a href="{{ route('home') }}#Kerala" class="d-flex align-items-center">Kerala<span
                                            class="ps-2 ms-auto">1</span></a></li>
                                <li><a href="{{ route('home') }}#Religion" class="d-flex align-items-center">Religion<span
                                            class="ps-2 ms-auto">2</span></a></li>
                                <li><a href="{{ route('home') }}#Special" class="d-flex align-items-center">Special<span
                                            class="ps-2 ms-auto">3</span></a></li>
                                <li><a href="{{ route('home') }}#Trending" class="d-flex align-items-center">Trending<span
                                            class="ps-2 ms-auto">4</span></a></li>
                                <li><a href="{{ route('home') }}#US" class="d-flex align-items-center">US<span
                                            class="ps-2 ms-auto">5</span></a></li>
                                <li><a href="{{ route('home') }}#India" class="d-flex align-items-center">India<span
                                            class="ps-2 ms-auto">6</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 fbox ps-lg-5">
                    <h4>{{ FOOTER_COL_3_HEADING }}</h4>
                    <a href="#"> <img src="{{ asset('uploads/24news_St_Mary.jpg') }}" class="img-fluid pe-3" alt="" class="w-100" ></a>
                    <p></p>
                            <!-- <a href="tel:+14168397744" class="flink mb-3"><i
                            class="fas fa-phone-square-alt me-2"></i> {{ FOOTER_PHONE }}</a>
                            <a href="tel:+14168397744" class="flink mb-3"><i
                            class="fas fa-map-marker-alt"></i> {{ FOOTER_ADDRESS }}</a> -->
                            <a href="mailto:info@24newslive.com" class="flink flink2 mb-4"><i
                            class="fas fa-paper-plane me-2"></i>{{ FOOTER_EMAIL }}</a>
                    <h4>Follow Us</h4>
                    <div class="social">
                        <ul class="d-flex m-0 p-0 align-items-center">
                        @foreach($global_social_item_data as $item)
                        <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-3 mt-4 fcopy">
            <p class="text-center text-white">{{ COPYRIGHT_TEXT }}</p>
        </div>
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
    </footer>
    <div class="fixed-add left-add text-center">
        <a href="#" class="d-inline-block"><img src="{{ asset('uploads/'.$global_sidebar_StickyAd1->sidebar_ad) }}" class="w-100" alt=""></a>
    </div>
    <div class="fixed-add right-add text-center">
        <a href="#" class="d-inline-block"><img src="{{ asset('uploads/'.$global_sidebar_StickyAd2->sidebar_ad) }}" class="w-100" alt=""></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2222812009487618"
    crossorigin="anonymous"></script>
    @include('front.layout.scripts_footer')
    <script>

var elements = document.getElementsByClassName('copy-content-lock');

    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('copy', function (event) {
            var url = window.location.href;
            var selectedText = window.getSelection().toString();

            // Limit the copied content to 50 words
            var words = selectedText.split(/\s+/);
            var limitedText = words.slice(0, 50).join(" ");

            // Create a temporary div to hold HTML content
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = "Copied from: " + url + "<br><br>" + limitedText + " [Show More at <a href='" + url + "'>" + url + "</a>]";

            // Modify the clipboard data
            event.clipboardData.setData('text/plain',url);
            event.clipboardData.setData('text/html', tempDiv.outerHTML); // Use outerHTML to include the anchor tag

            event.preventDefault(); // Prevent the default copy behavior

        });
    }

        $('.slimmenu').slimmenu({
            resizeWidth: '992',
            collapserTitle: 'Main Menu',
            animSpeed: 'medium',
            indentChildren: true,
            childrenIndenter: '&raquo;'
        });
        $('.collapse-button').click(function() {
            $(this).toggleClass("crotate");
        });
        // $(document).scroll(function() {
        //     var y = $(this).scrollTop();
        //     if (y > 50) {
        //         $("header").addClass("fixheader");
        //         $(".fixed-add").addClass("sticky-add");
        //     } else {
        //         $("header").removeClass("fixheader");
        //         $(".fixed-add").removeClass("sticky-add");
        //     }
        // });
    </script>
    <script>
        $('.latest-news .owl-carousel').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
            }
        });
        $('.news-video .owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
            }
        });
        $('.live-news .owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
            }
        });
        $('.editorial .owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            margin: 15,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                },
            }
        });
    </script>
    <!-- @if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif -->

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

</body>
</html>
