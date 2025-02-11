@extends('front.layout.app')

@section('main_content')
<section class="py-4">
    <div class="container">
        <div class="col-12 mb-4">
            <a href="#"><img src="" class="w-100" alt=""></a>
        </div>
        <div class="news-box inner-news-top">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-2"></i>{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ LIVE_CHANNEL }}</li>
                </ol>
            </nav>
        </div>
        <h4 class="title border-bottom mb-4"><span>{{ LIVE_CHANNEL }}</span></h4>

        <div class="row catholic-talk">
            @if(count($livechannel))
            @foreach($livechannel as $item)
            <div class="col-6 col-lg-3 mb-4">
                <div class="news-box">
                    <a href="http://www.youtube.com/watch?v={{ $item->video_id }}" class="video-button">
                        <div class="news-img mb-3"> <img src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg" class="w-100" alt="">
                        </div>
                        <h5 class="news-title">{{ $item->heading }}
                        </h5>
                    </a>
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
            @else
                <span class="text-danger">{{ NO_POST_FOUND }}</span>
            @endif
            <div class="col-md-12">
                {{ $livechannel->links() }}
            </div>

        </div>

    </div>
</section>

@endsection