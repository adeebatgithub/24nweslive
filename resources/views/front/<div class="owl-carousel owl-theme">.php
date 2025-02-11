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



                        <div id="carouselExampleIndicators" class="carousel slide banner-news position-relative mb-3 overflow-hidden" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
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
                                <div class="carousel-item active">
                                    <a href="{{ route('news_detail',$slug) }}"><img src="{{ asset('uploads/'.$item->post_photo) }}" class="d-block w-100" alt="...">
                                        <div class="banner-news-text position-absolute start-0 bottom-0 p-3 p-md-4">
                                            <h4 class="title text-white pb-0">{{ $item->post_title }}</h4>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                <!--item-->

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>