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


<div class="container-fluid px-0 border-top">
    <div class="container d-flex align-items-center justify-content-between">
        <ul id="navigation" class="slimmenu">
            <li class="active"><a href="{{ route('home') }}">{{ HOME }}</a></li>
            @foreach($global_categories as $item)                           
                @if($current_language_id == $item->language_id)
                <li>
                    <a href="#">{{ $item->category_name }}</a>
                    <ul>
                        @foreach($item->rSubCategory as $item2)
                        <li><a href="{{ route('category',$item2->id) }}">{{ $item2->sub_category_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            <div class="d-lg-none">
                <li><a href="{{ route('home') }}#Special">Special</a> </li>
                <li><a href="{{ route('home') }}#Trending">Trending</a> </li>
                <li><a href="{{ route('home') }}#Live">Live Channels</a> </li>
                <li><a href="{{ route('home') }}#Kerala">Kerala</a> </li>
                <li><a href="{{ route('home') }}#India">India</a> </li>
                <li><a href="{{ route('home') }}#Editor">Editor</a> </li>
                <li><a href="{{ route('home') }}#Religion">Religion</a> </li>
                <li><a href="{{ route('home') }}#TopNews">Top News</a> </li>
                <li><a href="{{ route('home') }}#English">English News</a> </li>
                <li><a href="{{ route('home') }}#Catholic">Catholic</a> </li>
                <li><a href="{{ route('home') }}#Knanaya">Knanaya</a> </li>
                <li><a href="{{ route('home') }}#Prayers">Prayers</a> </li>
                <li><a href="{{ route('home') }}#Obituary">OBITUARY</a> </li>
                <li><a href="{{ route('home') }}#13">13 DAYS BIBLE READING</a></li>
                <li><a href="{{ route('volunteer') }}">Volunteers</a> </li>
                <li><a href="{{ route('testimonials') }}">Testimonials</a> </li>
            </div>
            <li class="nav-item dropdown">
                <a href="">
                {{ GALLERY }}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('photo_gallery') }}">{{ PHOTO_GALLERY }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('video_gallery') }}">{{ VIDEO_GALLERY }}</a></li>
                </ul>
            </li>
            <li><a href="#" class="btn shadow-none menu-btn text-white">Donate</a></li>
        </ul>
        <div class="social d-none d-lg-block">
            <ul class="d-flex m-0 p-0 align-items-center">
            @foreach($global_social_item_data as $item)
                <li><a href="{{ $item->url }}" target="_blank"><i class="{{ $item->icon }}"></i></a></li>
            @endforeach
            </ul>
        </div>
    </div>
</div>

