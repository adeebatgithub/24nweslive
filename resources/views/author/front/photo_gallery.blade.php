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
                    <li class="breadcrumb-item active" aria-current="page">{{ PHOTO_GALLERY }}</li>
                </ol>
            </nav>
        </div>
        <h4 class="title border-bottom mb-4"><span>{{ PHOTO_GALLERY }}</span></h4>

        <div class="row catholic-talk">
            @if(count($photos))
            @foreach($photos as $item)
            <div class="col-6 col-lg-3 mb-4">
                <div class="news-box">
                    <a href="{{ asset('uploads/'.$item->photo) }}" class="magnific">
                        <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$item->photo) }}" class="w-100" alt="">
                        </div>
                        <h5 class="news-title">{{ $item->caption }}
                        </h5>
                    </a>
                </div>
                    <div class="date-user">
                        <div class="date">
                            @php
                            $ts = strtotime($item->updated_at);
                            $updated_date = date('d F, Y',$ts);
                            @endphp
                            <a href="javascript:void;">{{ $updated_date }}</a>
                        </div>
                </div>
            </div>
            @endforeach
            @else
                <span class="text-danger">{{ NO_POST_FOUND }}</span>
            @endif
            <div class="col-md-12">
                {{ $photos->links() }}
            </div>

        </div>

    </div>
</section>

@endsection