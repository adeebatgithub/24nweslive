@extends('front.layout.app')

@section('main_content')
<section class="py-4">
        <div class="container">
            <div class="col-12 mb-4">
                <a href="#"><img src="images/add-5.jpg" class="w-100" alt=""></a>
            </div>
            <div class="news-box inner-news-top">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-2"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Volunteer-form</li>
                    </ol>
                </nav>
            </div>

            <div class="row ">
                <div class="col-lg-8 testi-form pe-lg-5" id="submit-testi">

                    <h4 class="title border-bottom mb-4"><span>Volunteer Form</span></h4>
                    <h5>Contribute your interest or expertise</h5>
                    <p></p>
                    <form action="{{ route('volunteer_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Writer" name="category[]" value="Reporter"> Reporter</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Writer" name="category[]" value="Writer"> Writer / Translator</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Journalist" name="category[]" value="Journalist"> Journalist</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Social-Media" name="category[]" value="Social Media"> Social Media</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Technology" name="category[]" value="Technology"> Technology</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Missionary" name="category[]" value="Web Ads Volunteer"> Web Ads Volunteer</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Production-Volunteer" name="category[]" value="Production Volunteer"> Production Volunteer</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Event-Volunteer" name="category[]" value="Event Volunteer"> Event Volunteer</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Full-Timer" name="category[]" value="Full Timer"> Full Timer</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Intercession" name="category[]" value="Intercession"> Intercession</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Come-and-See" name="category[]" value="Come and See"> Come and See</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Missionary" name="category[]" value="Missionary"> Missionary</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Workship" name="category[]" value="Group Workship"> Group Workship</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Family-Support" name="category[]" value="Family Support"> Family Support</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="checkbox" id="Others" name="category[]" value="Others"> Others</label>
                            @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                             <!-- Check Box -->

                            <div class="col-sm-6 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" placeholder="" value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" placeholder="" value="{{old('email')}}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-sm-3 mb-3">
                            <label><input type="radio" class="@error('status') is-invalid @enderror" id="Married" name="status" value="Married"> Married</label>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="radio" class="@error('status') is-invalid @enderror" id="Married" name="status" value="Unmarried"> Unmarried</label>
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="radio" class="@error('spirituality') is-invalid @enderror" id="Priest" name="spirituality" value="Priest"> Priest</label>
                                @error('spirituality')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                            <label><input type="radio" class="@error('spirituality') is-invalid @enderror" id="Priest" name="spirituality" value="Nun"> Nun</label>
                            </div>
                            <!-- Radio button -->
                            <div class="col-sm-6 mb-3">
                                <label>Select Photo</label>
                                <input type="file" class="@error('photo') is-invalid @enderror" name="photo">
                                @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Religion / Cast</label>
                                <input type="text" class="form-control shadow-none @error('religion') is-invalid @enderror" name="religion" placeholder="" value="{{old('religion')}}">
                                @error('religion')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Education</label>
                                <input type="text" class="form-control shadow-none @error('education') is-invalid @enderror" name="education"  placeholder="" value="{{old('education')}}" >
                                @error('education')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Job</label>
                                <input type="text" class="form-control shadow-none @error('job') is-invalid @enderror" name="job"  placeholder="" value="{{old('job')}}">
                                @error('job')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label>Parish</label>
                                <input type="text" class="form-control shadow-none @error('parish') is-invalid @enderror" name="parish"  placeholder="" value="{{old('parish')}}">
                                @error('parish')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Parish Priest</label>
                                <input type="text" class="form-control shadow-none @error('parish_priest') is-invalid @enderror" name="parish_priest"  placeholder="" value="{{old('parish_priest')}}">
                                @error('parish_priest')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label>Address</label>
                                <input type="text" class="form-control shadow-none @error('address') is-invalid @enderror" name="address"  placeholder="" value="{{old('address')}}">
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Phone (Whatsapp Number)</label>
                                <input type="text" class="form-control shadow-none @error('phone') is-invalid @enderror" name="phone"  placeholder="+91 xx-nnn [+Country Code <space> mobile no.]" value="{{old('phone')}}">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>City</label>
                                <input type="text" class="form-control shadow-none @error('city') is-invalid @enderror" name="city"  placeholder="" value="{{old('city')}}">
                                @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>State</label>
                                <input type="text" class="form-control shadow-none @error('state') is-invalid @enderror" name="state"  placeholder="" value="{{old('state')}}">
                                @error('state')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Country</label>
                                <input type="text" class="form-control shadow-none @error('country') is-invalid @enderror" name="country"  placeholder="" value="{{old('country')}}">
                                @error('country')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label>Comments <small>(Up To 1500 Characters)</small> <strong class="fw-bold">0/1500</strong></label>
                                <textarea class="form-control shadow-none  p-3 @error('comments') is-invalid @enderror" name="comments" placeholder="">{{old('comments')}}</textarea>
                                @error('comments')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label>
                                        <input class="form-check-input me-3 @error('confirmation') is-invalid @enderror" type="checkbox" name="confirmation" value="Yes">I confirmed to join in the prayer group.</label>
                                        @error('confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            </div>

                        </div>
                        <div class="col-12 d-flex">

                            <button class="btn btn-1 shadow-none ms-auto">Submit</button>

                        </div>
                    </form>
                </div>


                <div class="col-lg-4 mt-4 mt-lg-0">
                    <h4 class="title border-bottom mb-4"><span>Testimonials</span></h4>
                    <div class="inner-testimonial live-news">
                        <div class="owl-carousel owl-theme">
                            @foreach($testimonials_data as $item)
                            @if($loop->first)  
                            <div class="item">
                                @if ($item->photo !== NULL)
                                <img src="{{ asset('uploads/'.$item->photo) }}" class="w-100">
                                @endif
                                <div class="p-4 bg-light">
                                    <h4>{{ $item->title }}</h4>
                                    <p>{{ $item->testimony }}</p>
                                    <a href="{{ route('testimonials') }}">Read More <i class="fas fa-arrow-right ms-2"></i></a>
                                    <h5 class="m-0 pt-2">{{ $item->name }} <span>{{ $item->location }}</span></h5>
                                </div>
                            </div>
                            @else
                            <!--item-->
                            <div class="item">
                                <img src="{{ asset('uploads/'.$item->photo) }}" class="w-100">
                                <div class="p-4 bg-light">
                                    <h4>{{ $item->title }}</h4>
                                    <p>{{ $item->testimony }}</p>
                                    <a href="{{ route('testimonials') }}">Read More <i class="fas fa-arrow-right ms-2"></i></a>
                                    <h5 class="m-0 pt-2">{{ $item->name }} <span>{{ $item->location }}</span></h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <!--item-->

                            <!--item-->

                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mt-4  catholic-talk">
                    <h4 class="title border-bottom mb-4"><span>Related </span>News</h4>
                    <div class="row">
                        
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 mt-4  catholic-talk news-video-inner">
                    <h4 class="title border-bottom mb-4"><span>Live </span>Videos</h4>
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#video-popup">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt="">
                                        <div class="news-time"><i class="fas fa-play-circle me-2"></i>04:00
                                        </div>
                                    </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>

                        <div class="modal fade video-popup" id="video-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content bg-black shadow-none rounded-0">
                                    <div class="modal-header border-0">
                                        <div class="d-block w-100 live-news">
                                            <div class="owl-carousel owl-theme">
                                                <div class="item">
                                                    <img src="images/add-5.jpg" class="w-100" alt="">
                                                </div>
                                                <!--item-->
                                                <div class="item">
                                                    <img src="images/add-5a.jpg" class="w-100" alt="">
                                                </div>
                                                <!--item-->

                                            </div>
                                        </div>
                                        <button type="button" class="btn-close shadow-none position-absolute end-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <iframe src="https://www.youtube.com/embed/5Peo-ivmupE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:100%; height:450px;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt="">
                                        <div class="news-time"><i class="fas fa-play-circle me-2"></i>04:00
                                        </div>
                                    </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt="">
                                        <div class="news-time"><i class="fas fa-play-circle me-2"></i>04:00
                                        </div>
                                    </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt="">
                                        <div class="news-time"><i class="fas fa-play-circle me-2"></i>04:00
                                        </div>
                                    </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt="">
                                        <div class="news-time"><i class="fas fa-play-circle me-2"></i>04:00
                                        </div>
                                    </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 mt-4  catholic-talk">
                    <h4 class="title border-bottom mb-4"><span>Breaking </span>News</h4>
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 mt-4  catholic-talk">
                    <h4 class="title border-bottom mb-4"><span>Catholic </span>Talk</h4>
                    <div class="row">
                        <div class="col-6  mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-16.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="#">
                                    <div class="news-img mb-3"> <img src="images/news-17.jpg" class="w-100" alt=""> </div>
                                    <h5 class="news-title">Ukraine rebels mobilize troops amid Russia invasion fears</h5>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        </div>
    </section>

<script>
    (function($){
        $(".form_contact_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }
                    
                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>


@endsection