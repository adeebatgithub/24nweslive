@extends('front.layout.app')

<style>
.inner-news-text a {

    color: blue !important;
}

.video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio (divide 9 by 16 = 0.5625 or 56.25%) */
    padding-top: 30px;
    height: 0;
    overflow: hidden;
}

.video-container iframe,
.video-container object,
.video-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

</style>

@section('title', $post_detail->post_title)

@section('meta_keywords', $tag_data->pluck('tag_name')->implode(', '))

@section('meta_description', strip_tags(\Illuminate\Support\Str::words($post_detail->post_detail, 25,'...')))

@section('og:image', asset('uploads/'.$post_detail->post_photo))

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
                                        @php $i++; @endphp                                
                                        @if($i>$setting_data->news_ticker_total)
                                            @break
                                        @endif
                                        <a href="{{ route('news_detail',$item->id) }}">
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

<section class="py-4">
<div class="container">
    <div class="col-12 mb-4">
        <a href="#"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad2) }}" class="w-100" alt=""></a>
    </div>
    <div class="news-box inner-news-top border-bottom mb-4 pb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-2"></i>{{ HOME }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category',$post_detail->sub_category_id) }}">{{ $post_detail->rSubCategory->sub_category_name }}</a>
                {{-- </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post_detail->post_title }}</li>  --}}
            </ol>
        </nav>
        <h5 class="news-title inner-title">{{ $post_detail->post_title }}</h5>
    </div>
    <div class="row">
        <div class="col-xl-9">
            <div class="row">
                <div class="col-12">
                    <div class="news-box">
                        <div class="d-flex flex-column flex-sm-row justify-content-between  news-date">
                            @php
                    $ts = strtotime($post_detail->updated_at);
                        $updated_date = date('d F, Y',$ts);
                        @endphp
                            <p>{{ $updated_date }}</p>
                            {{-- <b><i class="fas fa-eye"></i>{{ $post_detail->visitors }} views</b>
                             --}}
                            <ul class="m-0 p-0">
                            @foreach($global_social_item_data as $item)
                                <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="news-img my-3 inner-news-img"> <img src="{{ asset('uploads/'.$post_detail->post_photo) }}" class="w-100" alt=""> </div>
                        <div class="col-12 mt-2 mb-3">
                            
                            {{-- embaded video  --}}
                            @if ($post_detail->video_link != null)
                            {!! $post_detail->video_link  !!}
                            @endif
                        </div>
                       
                        <div class="inner-news-text">
                            <p>{!! $post_detail->post_detail !!}</p>  
                        </div>

                    </div>
                </div>
                @if($post_detail->is_comment == 1)
                <div class="col-12 pt-4 comment-section">
                    <h4 class="title border-bottom mb-4">{{ COMMENT }}</h4>
                    <div id="disqus_thread"></div>
                    {!! $global_setting_data->disqus_code !!}
                </div>
            @endif
            </div>
        </div>
        
        @include('front.layout.sidebar')


        <div class="col-lg-3 col-6 mt-4  catholic-talk">
            <h4 class="title border-bottom mb-4"><span>Related </span>News</h4>
            <div class="row">
                @foreach($related_post_array as $item)
                        
                        @if($loop->iteration == 5)
                        @break
                        @endif
                
                <div class="col-12 mb-4">
                    <div class="news-box">
                        <a href="{{ route('news_detail',$item->id) }}">
                            <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt="">
                                <div class="date-user">
                                <div class="user">
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
                                    <a href="javascript:void;">{{ $user_data->name }}</a>  |  <a href="javascript:void;">{{ $updated_date }}</a>
                                </div>
                            </div>
                            
                            <h5 class="news-title">{{ $item->post_title }}
                            </h5>
                        </a>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
    <div class="col-lg-3 col-6 mt-4  catholic-talk">
            <h4 class="title border-bottom mb-4"><span>Live </span>Videos</h4>
            <div class="row">
                @if(!session()->get('session_short_name'))
                @php
                $current_short_name = $global_short_name;
                @endphp
                @else
                @php
                $current_short_name = session()->get('session_short_name');
                @endphp
                @endif
                @php
                $current_language_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;
                @endphp
                @php
                $live_channel_data = \App\Models\LiveChannel::where('language_id',$current_language_id)->get();
                @endphp
                @foreach($live_channel_data as $item)
                @if($loop->iteration == 5)
                        @break
                        @endif
                        <div class="col-12 mb-4">
                            <div class="news-box">
                                <div class="news-img mb-3">
                                    <div class="video-container">
                                        <iframe src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <a href="#">
                                    <h5 class="news-title" style="
                                    margin-bottom: 18px;">{{ $item->heading }}</h5>
                                </a>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-6 mt-4  catholic-talk">
            <h4 class="title border-bottom mb-4"><span>Special</span> News</h4>
            <div class="row">
                @php
                $sub_category_data = \App\Models\SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->where('language_id',$current_language_id)->get();
                 @endphp
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Special")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 5)
                    @break
                    @endif
                <div class="col-12 mb-4">
                    <div class="news-box">
                        <a href="#">
                            <div class="news-img mb-3"><img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                            </div>
                            <h5 class="news-title">{{ $single->post_title }}
                            </h5>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-6 mt-4  catholic-talk">
            <h4 class="title border-bottom mb-4"><span>Catholic </span>Talk</h4>
            <div class="row">
                @php
                $sub_category_data = \App\Models\SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->where('language_id',$current_language_id)->get();
                 @endphp
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Catholic Talk")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 5)
                    @break
                    @endif
                <div class="col-12 mb-4">
                    <div class="news-box">
                        <a href="#">
                            <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="w-100" alt="">
                            </div>
                            <h5 class="news-title">{{ $single->post_title }}
                            </h5>
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

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

@endsection