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

<div class="col-xl-3 mt-4 mt-xl-0">
    <div class="row">
    @foreach($global_sidebar_top_ad as $row)
        @if($row->sidebar_ad_url == '')
        <div class="col-12">
            <a href="#" class="d-block w-100 mb-4 add-width-3 mx-auto"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" class="w-100" alt=""></a>
        </div>
        @else
        <div class="col-12">
            <a href="#" class="d-block w-100 mb-4 add-width-3 mx-auto"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" class="w-100" alt=""></a>
        </div>
        @endif
    @endforeach
        <div class="col-12 related-news">
            <h4 class="title border-bottom mb-4"><span>POPULAR</span> NEWS</h4>
            @php
                    $popular_news_data = \App\Models\Post::with('rSubCategory')->where('language_id',$current_language_id)->orderBy('visitors','desc')->get();
                    @endphp
                    @foreach($popular_news_data as $item)
                        @if($loop->iteration > 5)
                            @break
                        @endif
            <div class="col-12 px-0my-4">
                <div class="news-box">
                    <a href="{{ route('news_detail',$item->id) }}" class="d-flex align-items-center">
                        <div class="news-img me-3"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt="">
                        </div>
                        <div>
                            <p>{{ $item->post_title }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12  editorial live-news pb-4 bg-transparent">
            <h4 class="title border-bottom mb-4"><span>Editor Pics</span></h4>
            <div class="owl-carousel owl-theme">
                    @php
                    $editor_news_data = \App\Models\SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->where('language_id',$current_language_id)->get();
                    @endphp
                    @foreach($editor_news_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    @if($item->sub_category_name == "Editor Pics")
                    @foreach($item->rPost as $single)
                    @if($loop->iteration == 6)
                    @break
                    @endif
                <div class="item"> <img src="{{ asset('uploads/'.$single->post_photo) }}" class="img-fluid" alt="">
                    @if($single->author_id==0)
                                        @php
                                        $user_data = \App\Models\Admin::where('id',$single->admin_id)->first();
                                        @endphp
                                    @else
                                        @php
                                        $user_data = \App\Models\Author::where('id',$single->author_id)->first();
                                        @endphp
                                    @endif
                    <h5 class="news-title">{{ $user_data->name }}</h5>
                    <p>{{ $single->post_title }}</p>
                </div>
                @endforeach
                @endif
                @endforeach
                <!--item-->
            </div>
        </div>
        @foreach($global_sidebar_bottom_ad as $row)
        @if($row->sidebar_ad_url == '')
        <div class="col-md-12">
            <a href="#" class="d-block w-100 add-width-3 mx-auto"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" class="w-100" alt=""></a>
        </div>
        @else
        <div class="col-md-12">
            <a href="#" class="d-block w-100 add-width-3 mx-auto"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" class="w-100" alt=""></a>
        </div>
        @endif
        @endforeach
    </div>
</div>