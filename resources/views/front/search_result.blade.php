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
                    <li class="breadcrumb-item active" aria-current="page">{{ SEARCH_RESULT }}</li>
                </ol>
            </nav>
        </div>
        <h4 class="title border-bottom mb-4"><span>{{ SEARCH_RESULT }}</span></h4>

        <div class="row catholic-talk">

            @if(count($post_data1))
           
            @foreach($post_data1 as $item)
            <div class="col-6 col-lg-3 mb-4">
                <div class="news-box">
                    <a href="{{ route('news_detail',$item->id) }}">
                        <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt="">
                        </div>
                        <h5 class="news-title">{{ $item->post_title }}
                        </h5>
                    </a>
                </div>
                    
                </div>
          
            @endforeach
        </div>
            @else
                <span class="text-danger">{{ NO_POST_FOUND }}</span>
            @endif
            <div class="col-md-12">
            {{ $post_data1->appends(['text_item' => $text_item])->links() }}
            </div>

        </div>

    </div>
</section>

@endsection