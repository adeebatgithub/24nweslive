@extends('front.layout.app')

<style>
  /* General container */
  .embed-container {
    display: flex;
    flex-direction: column;
    /* Always stack video and chat vertically */
    gap: 10px;
    width: 100%;
    /* Full width of the parent container */
  }

  /* Video and chat containers */
  .video-container,
  .chat-container {
    position: relative;
    width: 100%;
    /* Full width */
    padding-bottom: 56.25%;
    /* Maintain 16:9 aspect ratio */
    height: 0;
    /* Maintain aspect ratio */
  }

  /* Iframes inside the containers */
  .video-container iframe,
  .chat-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
  }



  .inner-news-text a {

    color: blue !important;
  }

  .wp-share {
    display: block;
    background: #25d366;
    max-width: 400px;
    padding: 8px 12px;
    color: #fff;
    font-weight: 700;
    font-size: 17px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: auto;
    border-radius: 10px;
    transition: all .3s;
  }

  /* Button trigger modal */
  button.view-modal {
    outline: none !important;
    cursor: pointer !important;
    font-weight: 500 !important;
    border-radius: 4px !important;
    border: 2px solid transparent !important;
    transition: background 0.1s linear, border-color 0.1s linear, color 0.1s linear !important;
    top: 10% !important;
    left: 90% !important;
    color: #e8e4ee !important;
    font-weight: bold !important;
    font-size: 18px !important;
    padding: 10px 25px !important;
    background: rgb(113, 5, 156) !important;
    transform: translate(-50%, -50%) !important;
  }

  /* Modal Content */
  .modal-content {
    background: rgb(255, 254, 254) !important;
    padding: 25px !important;
    border-radius: 15px !important;
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1) !important;
  }

  .modal-header {
    padding-bottom: 15px !important;
    border-bottom: 1px solid #ebedf9 !important;
  }

  .modal-header .modal-title {
    font-size: 21px !important;
    font-weight: 600 !important;
  }



  .modal-header .btn-close:hover {
    background: #ebedf9 !important;
  }

  .modal-body {
    margin: 20px 0 !important;
  }

  .modal-body .icons {
    margin: 15px 0 20px 0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
  }

  .modal-body .icons a {
    height: 50px !important;
    width: 50px !important;
    font-size: 20px !important;
    text-decoration: none !important;
    border: 1px solid transparent !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.3s ease-in-out !important;
  }

  .modal-body .icons a i {
    transition: transform 0.3s ease-in-out !important;
  }

  .modal-body .icons a:hover i {
    transform: scale(1.2) !important;
  }

  .modal-body .icons a:nth-child(1) {
    color: #1877F2 !important;
    border-color: #b7d4fb !important;
  }

  .modal-body .icons a:nth-child(1):hover {
    background: #1877F2 !important;
  }

  .modal-body .icons a:nth-child(2) {
    color: #46C1F6 !important;
    border-color: #b6e7fc !important;
  }

  .modal-body .icons a:nth-child(2):hover {
    background: #46C1F6 !important;
  }

  .modal-body .icons a:nth-child(3) {
    color: #e1306c !important;
    border-color: #f5bccf !important;
  }

  .modal-body .icons a:nth-child(3):hover {
    background: #e1306c !important;
  }

  .modal-body .icons a:nth-child(4) {
    color: #25D366 !important;
    border-color: #bef4d2 !important;
  }

  .modal-body .icons a:nth-child(4):hover {
    background: #25D366 !important;
  }

  .modal-body .icons a:nth-child(5) {
    color: #0088cc !important;
    border-color: #b3e6ff !important;
  }

  .modal-body .icons a:nth-child(5):hover {
    background: #0088cc !important;
  }

  .modal-body .icons a:hover {
    color: #fff !important;
    border-color: transparent !important;
  }

  .modal-body .field {
    margin: 12px 0 -5px 0 !important;
    height: 45px !important;
    border-radius: 4px !important;
    padding: 0 5px !important;
    border: 1px solid #757171 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    transition: border-color 0.3s ease-in-out !important;
  }

  .modal-body .field.active {
    border-color: #7d2ae8 !important;
  }

  .modal-body .field i {
    width: 50px !important;
    font-size: 18px !important;
    text-align: center !important;
  }

  .modal-body .field.active i {
    color: #7d2ae8 !important;
  }

  .modal-body .field input {
    width: 100% !important;
    height: 100% !important;
    border: none !important;
    outline: none !important;
    font-size: 15px !important;
  }

  .modal-body .field button {
    color: #fff !important;
    padding: 5px 18px !important;
    background: #7d2ae8 !important;
    border: none !important;
    border-radius: 4px !important;
    transition: background 0.3s ease-in-out !important;
  }

  .modal-body .field button:hover {
    background: #8d39fa !important;
  }
</style>

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
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2222812009487618"
        crossorigin="anonymous"></script>
      <!-- ad-ho-10 -->
      <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-2222812009487618"
        data-ad-slot="8518559398"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <!-- <a href="#"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad2) }}" class="w-100" alt=""></a> -->
    </div>
    <div class="news-box inner-news-top border-bottom mb-4 pb-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-2"></i>{{ HOME }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('category',$post_detail->sub_category_id) }}">{{ $post_detail->rSubCategory->sub_category_name }}</a>
            {{-- </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post_detail->post_title }}
          </li> --}}
        </ol>
      </nav>
      <h5 class="news-title inner-title">{{ $post_detail->post_title }}</h5>
    </div>
    <div class="row">
      <div class="col-xl-9">
        <div class="row">
          <div class="col-12">
            <div class="page-news-box">
              <div class="d-flex flex-column flex-sm-row justify-content-between  news-date">
                @php
                $ts = strtotime($post_detail->created_at);
                $updated_date = date('d F, Y',$ts);
                @endphp
                <p>{{ $updated_date }}</p>
                <!-- Button trigger modal -->
                <div>
                  <a class='wp-share' href='https://chat.whatsapp.com/Jh95X67jBdvJAJyqxQfRVY' target="_blank">
                    Join New Members On Prayer Group</a>
                </div>
                <br />
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-share-alt " style="margin-right: 10px;"></i>Share
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Share this link via</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="content">

                          <ul class="icons">
                            <li><a id="facebookShare"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a id="twitterShare"><i class="fab fa-twitter"></i></a></li>
                            <li><a id="whatsappShare"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a id="linkedinShare"><i class="fab fa-linkedin-in"></i></a></li>
                          </ul>
                          <p>Or copy link</p>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                            <input id="copyUrl" type="text" class="form-control" readonly value="{{ url()->current() }}">
                            <button class="btn btn-success" onclick="copyToClipboard()" type="button">Copy</button>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>

                <!-- <b><i class="fas fa-eye"></i>{{ $post_detail->visitors }} views</b> -->

                {{-- <ul class="m-0 p-0">
                                
                            @foreach($global_social_item_data as $item)
                                <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>
                @endforeach
                </ul> --}}
              </div>
              @if ($post_detail->video_link != null)
              <div class="embed-container">
                <!-- Live Video -->
                <div class="video-container">
                  <iframe
                    src="https://www.youtube.com/embed/{{ $post_detail->video_link  }}?autoplay=1&modestbranding=1&rel=0&controls=1&disablekb=1&fs=0" allow="autoplay"
                    title="YouTube Live Stream"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                  </iframe>
                </div>

                <!-- Live Chat -->
                <!-- <div class="chat-container">
                  <iframe
                    src="https://www.youtube.com/live_chat?v={{ $post_detail->video_link  }}&embed_domain=24newslive.com"
                    frameborder="0">
                  </iframe>
                </div> -->
              </div>



              @else
              <div class="news-img my-3 inner-news-img"><img src="{{ asset('uploads/'.$post_detail->post_photo) }}" class="w-100" alt=""></div>
              @endif


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
                      <a href="javascript:void;">{{ $user_data->name }}</a> | <a href="javascript:void;">{{ $updated_date }}</a>
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
            <a href="{{ route('news_detail',$single->id) }}">
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
            <a href="{{ route('news_detail',$single->id) }}">
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
    <div class="row">
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2222812009487618"
        crossorigin="anonymous"></script>
      <!-- ad-ho-10 -->
      <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-2222812009487618"
        data-ad-slot="8518559398"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>
  </div>
</section>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var currentPageUrl = window.location.href;
    document.getElementById("facebookShare").href = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(currentPageUrl);
    document.getElementById("twitterShare").href = "https://twitter.com/intent/tweet?url=" + encodeURIComponent(currentPageUrl);
    document.getElementById("whatsappShare").href = "whatsapp://send?text=" + encodeURIComponent(currentPageUrl);
    document.getElementById("linkedinShare").href = "https://www.linkedin.com/sharing/share-offsite/?url=" + encodeURIComponent(currentPageUrl);
    $("#copyUrl").val(encodeURIComponent(currentPageUrl));


    document.getElementById("facebookShare_1").href = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(currentPageUrl);
    document.getElementById("twitterShare_1").href = "https://twitter.com/intent/tweet?url=" + encodeURIComponent(currentPageUrl);
    document.getElementById("whatsappShare_1").href = "whatsapp://send?text=" + encodeURIComponent(currentPageUrl);
    document.getElementById("linkedinShare_1").href = "https://www.linkedin.com/sharing/share-offsite/?url=" + encodeURIComponent(currentPageUrl);

  });




  $(document).ready(function() {
    $('.share_btn').click(function() {
      $('.sosmed').toggleClass('active')
    })
  })



  function copyToClipboard() {
    /* Get the text field */
    var copyText = document.getElementById("copyUrl");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the URL: " + copyText.value);
  }
</script>

@endsection