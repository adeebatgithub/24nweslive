@extends('front.layout.app')

@section('main_content')

@if($setting_data->news_ticker_status == "Show")

<div class="container-fluid px-0 latest-news">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 col-xl-9 mt-2 mt-md-0">
                <div class="d-flex align-items-center justify-content-start">
                    <h4 class="flex-shrink-0 py-2 px-2 px-md-3 mb-0 text-uppercase text-white"><span class="d-sm-none"><i class="fas fa-newspaper"></i></span><span class="d-none d-sm-block">Latest News</span></h4>
                    <div class="latest-news-slide ps-2 pe-2 pe-md-0">
                        <div class="owl-carousel owl-theme">
                            @php $i=0; @endphp
                            @foreach($post_data as $item)
                            @php
                            $i++;
                            $slug = (isset($item->slug)) ? $item->slug : $item->id;
                            @endphp
                            @if($i>$setting_data->news_ticker_total)
                            @break
                            @endif
                            @php
                            $slug = (isset($item->slug)) ? $item->slug : $item->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="item">
                                    <p class="text-truncate">{{ $item->post_title }}</p>
                                </div>
                            </a>
                            @endforeach
                            <!--item-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3 my-2 my-md-0">
                <form class="d-flex" action="{{ route('search_result') }}" method="post">
                    @csrf
                    <input type="text" name="text_item" class="form-control" placeholder="{{ TITLE_DESCRIPTION }}">
                    <button type="submit" class="shadow-none"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


<section class="pt-4 pb-4 pb-xl-2 banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pe-xl-4">


                <div id="carouselExampleControls" class="carousel slide banner-news position-relative mb-3 overflow-hidden" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="hover">
                    <div class="carousel-inner">

                        @foreach($post_data as $item)
                        @if($loop->iteration == 30)
                        @break
                        @endif
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            @php
                            $slug = (isset($item->slug)) ? $item->slug : $item->id;
                            @endphp
                            <div class="col-12 mb-4 top-news-1">
                                <div class="news-box">
                                    <a href="{{ route('news_detail',$slug) }}">
                                        <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt="...">
                                        <div class="banner-news-text position-absolute start-0 bottom-0 p-3 p-md-4">
                                            <h4 class="title text-white pb-0">{{ $item->post_title }}</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div id="Special" class="row">
                    <div class="col-sm-6 banner-left-box">
                        <h5>Special</h5>
                        @foreach($sub_category_data as $item)

                        @if(count($item->rPost)==0)
                        @continue
                        @endif
                        @if($item->sub_category_name == "Special")
                        @foreach($item->rPost as $single)
                        @if($loop->iteration == 10)
                        @break
                        @endif
                        <div class="col-12 mb-3 main-news-btm">
                            <div class="news-box pb-3 border-bottom">
                                @php
                                $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                @endphp

                                <a href="{{ route('news_detail',$slug) }}" class="d-flex align-items-start">
                                    <div class="news-img me-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                    </div>
                                    <p>{{ $single->post_title }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach

                        <a href="{{ route('category',$item->id) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a>
                        @endif
                        @endforeach
                    </div>
                    <div id="Trending" class="col-sm-6  banner-left-box">
                        <h5>Trending Now</h5>
                        @foreach($sub_category_data as $item)

                        @if(count($item->rPost)==0)
                        @continue
                        @endif
                        @if($item->sub_category_name == "Trending Now")
                        @foreach($item->rPost as $single)
                        @if($loop->iteration == 10)
                        @break
                        @endif
                        <div class="col-12 mb-3 main-news-btm">
                            <div class="news-box pb-3 border-bottom">
                                @php
                                $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                @endphp
                                <a href="{{ route('news_detail',$slug) }}" class="d-flex align-items-start">
                                    <div class="news-img me-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                    </div>
                                    <p>{{ $single->post_title }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach

                        <a href="{{ route('category',$item->id) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a>

                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="row">
                    <div id="Live" class="col-lg-4 px-xl-4 news-video">
                        <h5>Live</h5>
                        <div class="row">


                            @foreach($live_channel_data as $item)

                            @if($loop->iteration == 9)
                            @break
                            @endif

                            <div class="col-6 col-lg-12 mb-4">
                                <div class="news-box">
                                    <a href="https://www.youtube.com/watch?v={{ $item->video_id }}" class="video-button">
                                        <div class="news-img mb-3"> <img src="https://img.youtube.com/vi/{{ $item->video_id }}/0.jpg" class="w-100" alt="">
                                            <div class="news-time"><i class="fas fa-play-circle me-2"></i>04:00
                                            </div>
                                        </div>
                                        <p>{{ $item->heading }}</p>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                            <!--item-->
                            <h5><a href="{{ route('live_channel') }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h5>

                        </div>
                    </div>

                    <div id="Kerala" class="col-lg-8 ps-xl-4 mb-4 mb-lg-0">
                        <h4 class="title border-bottom mb-3"><span>KERALA</span> <a href="{{ route('category',3) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
                        <div class="row breaking-news">
                            @foreach($sub_category_data as $item)

                            @if(count($item->rPost)==0)
                            @continue
                            @endif
                            @if($item->sub_category_name == "Kerala")
                            @foreach($item->rPost as $single)
                            @if($loop->iteration == 5)
                            @break
                            @endif
                            <div class="col-6 mb-4">
                                <div class="news-box">
                                    @php

                                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                    @endphp
                                    <a href="{{ route('news_detail',$slug) }}">
                                        <div class="news-img mb-2"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                                        <p>{{ $single->post_title }}</p>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                            @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <div id="India" class="col-12 mb-4 top-right-news">
                                <article class="p-4">
                                    <h4 class="title border-bottom mb-3"><span>INDIA</span></h4>
                                    @foreach($sub_category_data as $item)

                                    @if(count($item->rPost)==0)
                                    @continue
                                    @endif
                                    @if($item->sub_category_name == "India")
                                    @foreach($item->rPost as $single)
                                    @if($loop->iteration == 5)
                                    @break
                                    @endif

                                    <div class="col-12 px-0 mb-3">
                                        <div class="news-box">
                                            @php
                                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                            @endphp
                                            <a href="{{ route('news_detail',$slug) }}" class="d-flex align-items-start">
                                                <div class="news-img me-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                                                <p>{{ $single->post_title }}</p>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="col-12 px-0 d-flex justify-content-end"> <a href="{{ route('category',$item->id) }}" class="viewall-btn fw-bold">View All <i
                                                class="fas fa-arrow-right ms-2"></i></a> </div>
                                    @endif
                                    @endforeach
                                </article>
                            </div>
                            <div id="Crime" class="col-12 mb-4 live-news top-right-news top-right-slider">
                                <h4 class="title border-bottom mb-3"><span>CRIME</span> <a href="{{ route('category',52) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
                                <div class="owl-carousel owl-theme">
                                    <!-- @php $t = count($post_crime_data) @endphp
                                            {{ $t }} -->
                                    @foreach($post_crime_data->chunk(4) as $item)



                                    @if ($loop->first)
                                    <div class="item">
                                        @foreach($item as $single)


                                        <div class="col-12 px-0 mb-3">
                                            <div class="news-box">
                                                @php
                                                $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                                @endphp
                                                <a href="{{ route('news_detail',$slug) }}" class="d-flex align-items-start">
                                                    <div class="news-img me-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                                                    <p>{{ $single->post_title }}</p>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <!--item-->
                                    @else
                                    <div class="item">


                                        @foreach($item as $single)


                                        <div class="col-12 px-0 mb-3">
                                            <div class="news-box">
                                                @php
                                                $slug = (isset($item->slug)) ? $single->slug : $single->id;
                                                @endphp
                                                <a href="{{ route('news_detail',$slug) }}" class="d-flex align-items-start">
                                                    <div class="news-img me-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                                                    <p>{{ $single->post_title }}</p>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach



                                    </div>
                                    <!--item-->

                                    @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
</section>
<section class="pb-4">
    <div class="container">
        <div class="row mb-4">
            <div id="Editor" class="col-lg-9 pe-xl-0 mb-4 mb-lg-0">
                <article class="p-4   editorial ">
                    <h4 class="title border-bottom mb-4"><span>Editor Pics</span></h4>
                    <div class="owl-carousel owl-theme">
                        @foreach($post_editor_data->chunk(5) as $data)

                        @if($loop->first)
                        @foreach($data as $item)
                        @php
                        $slug = (isset($item->slug)) ? $item->slug : $item->id;
                        @endphp
                        <a href="{{ route('news_detail',$slug) }}">
                            <div class="item"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="img-fluid" alt="">
                                @if($item->author_id==0)
                                @php

                                $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                @endphp
                                @else
                                @php
                                $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                @endphp
                                @endif
                                @php
                                $ts = strtotime($item->updated_at);
                                $updated_date = date('d F, Y',$ts);
                                @endphp
                                <h5 class="news-title">{{ $user_data->name }}<small class="d-block">{{ $updated_date }}</small></h5>
                                <p>{{ $item->post_title }}</p>
                            </div>
                        </a>
                        @endforeach
                        <!--item-->
                        @else
                        @foreach($data as $item)
                        @php
                        $slug = (isset($item->slug)) ? $item->slug : $item->id;
                        @endphp
                        <a href="{{ route('news_detail',$slug) }}">
                            <div class="item"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="img-fluid" alt="">
                                @if($item->author_id==0)
                                @php
                                $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                @endphp
                                @else
                                @php
                                $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                @endphp
                                @endif
                                @php
                                $ts = strtotime($item->updated_at);
                                $updated_date = date('d F, Y',$ts);
                                @endphp
                                <h5 class="news-title">{{ $user_data->name }}<small class="d-block">{{ $updated_date }}</small></h5>
                                <p>{{ $item->post_title }}</p>
                            </div>
                        </a>
                        @endforeach
                        <!--item-->
                        @endif
                        @endforeach
                    </div>
                </article>
            </div>
            <div class="col-lg-3 ps-xl-4  greetings live-news">
                <h4 class="title border-bottom mb-3"><span>Greetings</span></h4>
                <div class="owl-carousel owl-theme">
                    @foreach($post_greeting_data->chunk(2) as $item)
                    @if($loop->first)
                    <div class="item">
                        @foreach($item as $single)
                        <div class="col-12 px-0 mb-3">
                            <p><i class="fas fa-quote-left"></i></p>
                            <p>{{ $single->post_title }}</p>
                            <div class="d-flex mt-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="img-fluid me-3" alt="">
                                @if($single->author_id==0)
                                @php
                                $user_data = \App\Models\Admin::where('id',$single->admin_id)->first();
                                @endphp
                                @else
                                @php
                                $user_data = \App\Models\Author::where('id',$single->author_id)->first();
                                @endphp
                                @endif
                                @php
                                $ts = strtotime($single->updated_at);
                                $updated_date = date('d F, Y',$ts);
                                @endphp
                                <h6>{{ $user_data->name }}<small class="d-block">{{ $updated_date }}</small></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--item-->
                    @else
                    <div class="item">
                        @foreach($item as $single)
                        <div class="col-12 px-0 mb-3">
                            <p><i class="fas fa-quote-left"></i></p>
                            <p>{{ $single->post_title }}</p>
                            <div class="d-flex mt-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="img-fluid me-3" alt="">
                                @if($single->author_id==0)
                                @php
                                $user_data = \App\Models\Admin::where('id',$single->admin_id)->first();
                                @endphp
                                @else
                                @php
                                $user_data = \App\Models\Author::where('id',$single->author_id)->first();
                                @endphp
                                @endif
                                @php
                                $ts = strtotime($single->updated_at);
                                $updated_date = date('d F, Y',$ts);
                                @endphp
                                <h6>{{ $user_data->name }}<small class="d-block">{{ $updated_date }}</small></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--item-->
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <h4 class="title border-bottom mb-4"><span>RELIGION</span> <a href="{{ route('category',55) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
        <div id="Religion" class="row top-four">
            @foreach($sub_category_data as $item)
            @if(count($item->rPost)==0)
            @continue
            @endif
            @if($item->sub_category_name == "Religion")
            @foreach($item->rPost as $single)
            @if($loop->iteration == 5)
            @break
            @endif
            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                <div class="news-box">
                    @php
                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                    @endphp
                    <a href="{{ route('news_detail',$slug) }}">
                        <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                        <h5 class="news-title">{{ $single->post_title }}</h5>
                        <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                    </a>
                </div>
            </div>
            @endforeach



            @endif
            @endforeach
            @if($global_top_ad_data->top_ad2 == 'Show')
            <div class="col-12 mt-4">
                <a href="#"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad2) }}" class="w-100" alt=""></a>
            </div>
            @endif
        </div>
    </div>
</section>
<section class="pb-4">
    <div class="container">
        <div class="row">
            <div id="TopNews" class="col-lg-9 stories-left">
                <h4 class="title border-bottom mb-4"><span>Health </span> <a href="{{ route('category',61) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Health News")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 5)
                    @break
                    @endif
                    <div class="col-6 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}</h5>
                                <!-- <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p> -->
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
            <div id="LiveNews" class="col-lg-3 live-news">
                <h4 class="title border-bottom mb-4"><span>LIVE NEWS</span> NOW</h4>
                <div class="owl-carousel owl-theme">
                    @foreach($live_channel_data->chunk(5) as $item)
                    @if($loop->first)
                    <div class="item">
                        <ul class="m-0 p-0">
                            @foreach($item as $single)
                            <li>
                                <a href="https://www.youtube.com/watch?v={{ $single->video_id }}" class="video-button"> <img src="https://img.youtube.com/vi/{{ $single->video_id }}/0.jpg" class="img-fluid pe-4" alt="">
                                    <p><strong>{{ $single->heading }}</strong></p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--item-->
                    @else
                    <div class="item">
                        <ul class="m-0 p-0">
                            @foreach($item as $single)
                            <li>
                                <a href="https://www.youtube.com/watch?v={{ $single->video_id }}" class="video-button"> <img src="https://img.youtube.com/vi/{{ $single->video_id }}/0.jpg" class="img-fluid pe-4" alt="">
                                    <p><strong>{{ $single->heading }}</strong></p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--item-->
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <amp-ad width="100vw" height="320"
                type="adsense"
                data-ad-client="ca-pub-2222812009487618"
                data-ad-slot="1811935843"
                data-auto-format="mcrspv"
                data-full-width="">
                <div overflow=""></div>
            </amp-ad>
            @if($home_ad_data->above_search_ad == 'Show')
            <div class="col-md-6 mb-4 mb-md-0">
                <a href="#"><img src="{{ asset('uploads/'.$home_ad_data->above_search_ad) }}" class="w-100" alt=""></a>
            </div>
            @endif
            @if($home_ad_data->above_footer_ad == 'Show')
            <div class="col-md-6">
                <a href="#"><img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad) }}" class="w-100" alt=""></a>
            </div>
            @endif
        </div>
    </div>
</section>
<section class="pb-4">
    <div class="container">
        <div class="row ">
            <div class="col-lg-3 mb-4 add-width-1 text-center">
                <amp-ad width="100vw" height="320"
                    type="adsense"
                    data-ad-client="ca-pub-2222812009487618"
                    data-ad-slot="8127166403"
                    data-auto-format="mcrspv"
                    data-full-width="">
                    <div overflow=""></div>
                </amp-ad>

                <!-- <a href="#">
                    @if (isset($global_sidebar_ad1->sidebar_ad))
                    <img src="{{ asset('uploads/'.$global_sidebar_ad1->sidebar_ad) }}" class="w-100" alt="">
                    @endif


                </a> -->
            </div>
            <div class="col-lg-9 editor-pick">
                <h4 class="title border-bottom mb-4"><span>ADVISORY BOARD</span> <a href="{{ route('category',56) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "ADVISORY BOARD")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 4)
                    @break
                    @endif
                    <div class="col-12 col-md-4 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}
                                    <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                                </h5>
                            </a>
                        </div>
                    </div>
                    @endforeach



                    @endif
                    @endforeach

                </div>
                <h4 class="title border-bottom mb-4"><span>English </span>news <a href="{{ route('category',41) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
                <div id="English" class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "English News")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 4)
                    @break
                    @endif
                    <div class="col-12 col-md-4 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}
                                </h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach



                    @endif
                    @endforeach

                </div>
            </div>
        </div>
        <div class="row">
            <div id="Catholic" class="col-lg-12 catholic-talk">
                <h4 class="title border-bottom mb-4"><span>Catholic </span>Talk <a href="{{ route('category',$item->id) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Catholic Talk")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 5)
                    @break
                    @endif
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}
                                </h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach



                    @endif
                    @endforeach
                </div>
            </div>
            <!--<div class="col-lg-6">
            <h4 class="title border-bottom mb-4"><span>Health </span>now</h4>
            <div class="row">
              <div class="col-sm-6 mb-4">
                <div class="news-box"> <a href="#">
                  <div class="news-img mb-3"> <img src="images/news-18.jpg" class="w-100" alt=""> </div>
                  <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                  </a> </div>
              </div>
              <div class="col-sm-6 mb-4">
                <div class="news-box"> <a href="#">
                  <div class="news-img mb-3"> <img src="images/news-19.jpg" class="w-100" alt=""> </div>
                  <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                  </a> </div>
              </div>
            </div>
          </div>-->
        </div>
        <div class="row">
            <div id="Knanaya" class="col-lg-12 catholic-talk">
                <h4 class="title border-bottom mb-4"><span>Knanaya</span> news<a href="{{ route('category',41) }}" class="btn btn-primary btn-sm"> {{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Knanaya News")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 5)
                    @break
                    @endif
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}
                                </h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach



                    @endif
                    @endforeach
                </div>
            </div>
            <!--<div class="col-lg-6">
            <h4 class="title border-bottom mb-4"><span>Health </span>now</h4>
            <div class="row">
              <div class="col-sm-6 mb-4">
                <div class="news-box"> <a href="#">
                  <div class="news-img mb-3"> <img src="images/news-18.jpg" class="w-100" alt=""> </div>
                  <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                  </a> </div>
              </div>
              <div class="col-sm-6 mb-4">
                <div class="news-box"> <a href="#">
                  <div class="news-img mb-3"> <img src="images/news-19.jpg" class="w-100" alt=""> </div>
                  <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                  </a> </div>
              </div>
            </div>
          </div>-->
        </div>
        <div class="row">
            <amp-ad width="100vw" height="320"
                type="adsense"
                data-ad-client="ca-pub-2222812009487618"
                data-ad-slot="4759569363"
                data-auto-format="mcrspv"
                data-full-width="">
                <div overflow=""></div>
            </amp-ad>
            @if($home_ad_data->above_search_ad1 == 'Show')
            <div class="col-md-6 mb-4 mb-md-0">
                <a href="#"><img src="{{ asset('uploads/'.$home_ad_data->above_search_ad1) }}" class="w-100" alt=""></a>
            </div>
            @endif
            @if($home_ad_data->above_footer_ad1 == 'Show')
            <div class="col-md-6">
                <a href="#"><img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad1) }}" class="w-100" alt=""></a>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="pb-2">
    <div id="13" class="container">
        <h4 class="title border-bottom mb-4"><span>13 DAYS BIBLE READING</span></h4>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">



                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="..." class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>



                </div>
            </div>
            <div class="col-lg-6 top-new-list">
                @php $i=0; @endphp
                @foreach($post_13days_data as $item)
                @php $i++; @endphp
                @if($i==1)
                @continue
                @endif
                @if($i>12)
                @break
                @endif
                <div class="col-12 px-0 pb-4">
                    <div class="news-box">
                        @php
                        $slug = (isset($item->slug)) ? $item->slug : $item->id;
                        @endphp
                        <a href="{{ route('news_detail',$slug) }}" class="d-flex align-items-center">
                            <div class="news-img me-3"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt=""> </div>

                            <p class="fw-bold">{{ $item->post_title }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('category', 49) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a>
            </div>
        </div>
    </div>
</section>
<section class="pb-4">
    <div class="container">
        <div class="row">
            <div id="14" class="col-xl-9">
                <h4 class="title border-bottom mb-4"><span>Auto</span> <a href="{{ route('category',60) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-xl-0 best-christian-1">
                        @foreach($sub_category_data as $item)
                        @if(count($item->rPost)==0)
                        @continue
                        @endif
                        @if($item->sub_category_name == "Auto")
                        @foreach($item->rPost as $single)
                        @if($loop->iteration == 2)
                        @break
                        @endif
                        <div class="page-news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}
                                </h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 200,'...')) !!}</p>
                            </a>
                        </div>
                        <!-- <div class="col-lg-3 mb-4 add-width-1 text-center">
                            <a href="#">
                                @if (isset($global_sidebar_ad3->sidebar_ad))
                                <img src="{{ asset('uploads/'.$global_sidebar_ad3->sidebar_ad) }}" class="w-100" alt="">
                                @endif
                                
                            </a>
                            </div>  -->
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6  best-christian-2">
                        @foreach($sub_category_data as $item)
                        @if(count($item->rPost)==0)
                        @continue
                        @endif
                        @if($item->sub_category_name == "Auto")
                        @foreach($item->rPost as $single)
                        @if($loop->iteration == 7)
                        @break
                        @endif
                        <div class="col-12 px-0 pb-4">
                            <div class="news-box">
                                @php
                                $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                @endphp
                                <a href="{{ route('news_detail',$slug) }}" class="d-flex align-items-center">
                                    <div class="news-img me-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                    </div>
                                    <p class="fw-bold">{{ $single->post_title }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="Prayers" class="col-xl-3 live-news prayers-news mt-4 mt-xl-0  best-christian-3">
                <div class="prayers p-4 pb-5">
                    <h4 class="title text-white mb-2"><span>Prayers</span></h4>
                    <div class="owl-carousel owl-theme">

                        @foreach($post_prayers_data->chunk(5) as $item)
                        @if($loop->first)
                        <div class="item">
                            <ul class="m-0 p-0">
                                @foreach($item as $single)
                                <li>
                                    @php
                                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                    @endphp
                                    <a href="{{ route('news_detail',$slug) }}"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="img-fluid pe-2" alt="">
                                        <p class="text-white">{{ $single->post_title }}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--item-->
                        @else
                        <div class="item">
                            <ul class="m-0 p-0">
                                @foreach($item as $single)
                                <li>
                                    @php
                                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                                    @endphp
                                    <a href="{{ route('news_detail',$slug) }}"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="img-fluid pe-2" alt="">
                                        <p class="text-white">{{ $single->post_title }}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--item-->
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 add-width-1 text-center mb-4 mb-xl-0">
                <amp-ad width="100vw" height="320"
                    type="adsense"
                    data-ad-client="ca-pub-2222812009487618"
                    data-ad-slot="5040734410"
                    data-auto-format="rspv"
                    data-full-width="">
                    <div overflow=""></div>
                </amp-ad>
                <!-- <a href="#">
                    @if (isset($global_sidebar_ad2->sidebar_ad))
                    <img src="{{ asset('uploads/'.$global_sidebar_ad2->sidebar_ad) }}" class="w-100" alt="">
                    @endif


                </a> -->
            </div>
            <div class="col-lg-9 us-canada">
                <h4 class="title border-bottom mb-4"><span>Movie</span> <a href="{{ route('category',45) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Movie")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 4)
                    @break
                    @endif
                    <div class="col-12 col-md-4 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}
                                </h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-4 ">
    <div id="Obituary" class="container">
        <h4 class="title border-bottom mb-4"><span>OBITUARY</span> <a href="{{ route('category',46) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
        <div class="row obituary">
            @foreach($sub_category_data as $item)
            @if(count($item->rPost)==0)
            @continue
            @endif
            @if($item->sub_category_name == "Obituary")
            @foreach($item->rPost as $single)
            @if($loop->iteration == 6)
            @break
            @endif
            <div class="col-2-5 mb-4">
                <div class="news-box">
                    @php
                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                    @endphp
                    <a href="{{ route('news_detail',$slug) }}">
                        <div class="news-img mb-2"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                        <p><strong>{{ $single->post_title }}</strong></p>
                        <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                    </a>

                </div>
            </div>
            @endforeach
            @endif
            @endforeach
        </div>
        <div class="row live-talk">
            <div id="LiveTalk" class="col-lg-9">
                <h4 class="title border-bottom mb-4"><span>GULF </span>News <a href="{{ route('category',62) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "GULF News")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 4)
                    @break
                    @endif
                    <div class="col-12 col-md-4 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                            </a>
                            <h5 class="news-title">{{ $single->post_title }}
                            </h5>
                            <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 mb-4 add-width-1 text-center">
                <amp-ad width="100vw" height="320"
                    type="adsense"
                    data-ad-client="ca-pub-2222812009487618"
                    data-ad-slot="4849162728"
                    data-auto-format="rspv"
                    data-full-width="">
                    <div overflow=""></div>
                </amp-ad>
                <!-- <a href="#">
                    @if (isset($global_sidebar_ad3->sidebar_ad))
                    <img src="{{ asset('uploads/'.$global_sidebar_ad3->sidebar_ad) }}" class="w-100" alt="">
                    @endif

                </a> -->
            </div>
        </div>
        <div class="row">
            <amp-ad width="100vw" height="320"
                type="adsense"
                data-ad-client="ca-pub-2222812009487618"
                data-ad-slot="8020157523"
                data-auto-format="rspv"
                data-full-width="">
                <div overflow=""></div>
            </amp-ad>
            <!-- <div class="col-md-6 mb-4 mb-md-0">
                <a href="#"><img src="images/add-13.jpg" class="w-100" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="#"><img src="images/add-14.jpg" class="w-100" alt=""></a>
            </div> -->
        </div>
    </div>
</section>
<section class="pb-4 ">
    <div id="US" class="container">
        <h4 class="title border-bottom mb-4"><span>US News</span> <a href="{{ route('category',53) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
        <div class="row obituary">
            @foreach($sub_category_data as $item)
            @if(count($item->rPost)==0)
            @continue
            @endif
            @if($item->sub_category_name == "US News")
            @foreach($item->rPost as $single)
            @if($loop->iteration == 6)
            @break
            @endif
            <div class="col-2-5 mb-4">
                <div class="news-box">
                    @php
                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                    @endphp
                    <a href="{{ route('news_detail',$slug) }}">
                        <div class="news-img mb-2"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                        <p><strong>{{ $single->post_title }}</strong></p>
                        <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
            @endforeach
        </div>
        <div class="row live-talk">
            <div id="Canada" class="col-lg-12">
                <h4 class="title border-bottom mb-4"><span>CANADA </span>News <a href="{{ route('category',54) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Canada News")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 4)
                    @break
                    @endif
                    <div class="col-12 col-md-4 mb-4">
                        <div class="news-box">
                            @php
                            $slug = (isset($single->slug)) ? $single->slug : $single->id;
                            @endphp
                            <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                                </div>
                                <h5 class="news-title">{{ $single->post_title }}
                                </h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
            <!-- <div class="col-lg-3 mb-4 add-width-1 text-center">
                        <a href="#">
                            @if (isset($global_sidebar_ad4->sidebar_ad))
                            <img src="{{ asset('uploads/'.$global_sidebar_ad4->sidebar_ad) }}" class="w-100" alt="">
                            @endif
                            
                        </a>
                    </div> -->
        </div>
        <div class="row">
            @if($home_ad_data->above_search_ad2 == 'Show')
            <div class="col-md-6 mb-4 mb-md-0">
                <a href="#"><img src="{{ asset('uploads/'.$home_ad_data->above_search_ad2) }}" class="w-100" alt=""></a>
            </div>
            @endif
            @if($home_ad_data->above_footer_ad2 == 'Show')
            <div class="col-md-6">
                <a href="#"><img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad2) }}" class="w-100" alt=""></a>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- <section class="world-news">
            <div class="container">

                <div class="row">
                	@foreach($sub_category_data as $item)
                        @if(count($item->rPost)==0)
                            @continue
                        @endif
                    @foreach($item->rPost as $single)
                        @if($loop->iteration == 2)
                            @break
                        @endif
                    <div class="col-2-5 mb-4">
                        <h5>{{ $item->sub_category_name }}</h5>
                        <div class="news-box">
                           @php
$slug = (isset($single->slug)) ? $single->slug : $single->id;
                                @endphp
                                <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-2"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                                <p>{{ $single->post_title }}</p>
                            </a>
                            <a href="{{ route('category',$item->id) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>

            </div>
        </section> -->
<section class="pb-4 top-four">
    <div class="container">

        <h4 class="title border-bottom mb-4"><span>Technology</span> <a href="{{ route('category',12) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
        <div class="row">

            @foreach($sub_category_data as $item)
            @if(count($item->rPost)==0)
            @continue
            @endif
            @if($item->sub_category_name == "Computer")
            @foreach($item->rPost as $single)
            @if($loop->iteration == 5)
            @break
            @endif
            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                <div class="news-box">
                    @php
                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                    @endphp
                    <a href="{{ route('news_detail',$slug) }}">
                        <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>

                        <h5 class="news-title">{{ $single->post_title }}</h5>
                        <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- <section class="pb-4 top-four">
            <div class="container">

                <h4 class="title border-bottom mb-4"><span>Sports</span>  <a href="{{ route('category',1) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    
                @foreach($sub_category_data as $item)
                                                @if(count($item->rPost)==0)
                                                @continue
                                                @endif
                                                @if($item->sub_category_name == "Football")
                                                @foreach($item->rPost as $single)
                                                @if($loop->iteration == 5)
                                                @break
                                                @endif
                    <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="news-box">
                           @php
$slug = (isset($single->slug)) ? $single->slug : $single->id;
                                @endphp
                                <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                               
                                <h5 class="news-title">{{ $single->post_title }}</h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
        </section> -->

<!-- <section class="pb-4 top-four">
            <div class="container">

                <h4 class="title border-bottom mb-4"><span>World News</span>  <a href="{{ route('category',64) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
                <div class="row">
                    
                @foreach($sub_category_data as $item)
                                                @if(count($item->rPost)==0)
                                                @continue
                                                @endif
                                                @if($item->sub_category_name == "World News")
                                                @foreach($item->rPost as $single)
                                                @if($loop->iteration == 5)
                                                @break
                                                @endif
                    <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="news-box">
                           @php
$slug = (isset($single->slug)) ? $single->slug : $single->id;
                                @endphp
                                <a href="{{ route('news_detail',$slug) }}">
                                <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>
                               
                                <h5 class="news-title">{{ $single->post_title }}</h5>
                                <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
        </section> -->

<section class="pb-4 top-four">
    <div class="container">

        <h4 class="title border-bottom mb-4"><span>Prophetic</span> Voice <a href="{{ route('category',63) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a></h4>
        <div class="row">

            @foreach($sub_category_data as $item)
            @if(count($item->rPost)==0)
            @continue
            @endif
            @if($item->sub_category_name == "Prophetic Voice")
            @foreach($item->rPost as $single)
            @if($loop->iteration == 5)
            @break
            @endif
            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                <div class="news-box">
                    @php
                    $slug = (isset($single->slug)) ? $single->slug : $single->id;
                    @endphp
                    <a href="{{ route('news_detail',$slug) }}">
                        <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt=""> </div>

                        <h5 class="news-title">{{ $single->post_title }}</h5>
                        <p>{!! strip_tags(\Illuminate\Support\Str::words($single->post_detail, 10,'...')) !!}</p>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
            @endforeach
        </div>
    </div>
</section>

<amp-ad width="100vw" height="320"
     type="adsense"
     data-ad-client="ca-pub-2222812009487618"
     data-ad-slot="9248676380"
     data-auto-format="rspv"
     data-full-width="">
  <div overflow=""></div>
</amp-ad>

<!-- @if($setting_data->video_status == 'Show')
<div class="video-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-heading">
                    <h2>{{ VIDEOS }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="video-carousel owl-carousel">
                    @foreach($video_data as $item)

                    @if($loop->iteration > $setting_data->video_total)
                        @break
                    @endif

                    <div class="item">
                        <div class="video-thumb">
                            <img src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="http://www.youtube.com/watch?v={{ $item->video_id }}" class="video-button"><i class='fas fa-play-circle' style='font-size:48px;color:red'></i></a>
                            </div>
                        </div>
                        <div class="video-caption">
                            <a href="javascript:void;">{{ $item->caption }}</a>
                        </div>
                        <div class="video-date">
                            @php
                            $ts = strtotime($item->created_at);
                            $created_date = date('d F, Y',$ts);
                            @endphp
                            <i class="fas fa-calendar-alt"></i> {{ $created_date }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif -->
@endsection