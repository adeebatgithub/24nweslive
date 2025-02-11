@extends('front.layout.app')

@section('main_content')

    <section class="py-4">
        <div class="container">
            <div class="col-12 mb-4">
                <a href="#"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad2) }}" class="w-100" alt=""></a>
            </div>
            <div class="news-box inner-news-top">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-2"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Prayer Request</li>
                    </ol>
                </nav>
            </div>

            <div class="row ">
                <div class="col-lg-8 testi-form pe-lg-5" id="submit-testi">

                    <h4 class="title border-bottom mb-4"><span>Prayer Request</span></h4>
                    <form action="{{ route('prayerrequest_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="">
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="">
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Phone</label>
                                <input type="text" class="form-control shadow-none @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="">
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Country</label>
                                <select class="form-select shadow-none" aria-label="Default select example">
                                    <option></option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                </select>
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>State</label>
                                <select class="form-select shadow-none" aria-label="Default select example">
                                    <option></option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                </select>
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>City</label>
                                <select class="form-select shadow-none" aria-label="Default select example">
                                    <option></option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                    <option>India</option>
                                </select>
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label>Address</label>
                                <input type="text" class="form-control shadow-none @error('address') is-invalid @enderror" name="address" value="{{old('address')}}" placeholder="">
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label>Prayer Request <small>(Up To 1500 Characters)</small> <strong class="fw-bold">0/1500</strong></label>
                                <textarea class="form-control shadow-none  p-3 @error('testimony') is-invalid @enderror" name="prayers" placeholder="">{{old('prayers')}}</textarea>
                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label>
                                        <input class="form-check-input me-3 @error('confirmation') is-invalid @enderror" type="checkbox" name="confirmation" value="Yes">I give consent to display my request on SW PRAYER that worldwide viewers may join to pray.</label>
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
                            <div class="item">
                                <img src="./images/testi-1.jpg" class="w-100">
                                <div class="p-4 bg-light">
                                    <h4>Lorem ipsum is simply dummy</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                        to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining </p>
                                    <a href="#">Read More <i class="fas fa-arrow-right ms-2"></i></a>
                                    <h5 class="m-0 pt-2">Mr. Lorem Ipsum <span>Kottayam</span></h5>
                                </div>
                            </div>
                            <!--item-->
                            <div class="item">
                                <img src="./images/testi-2.jpg" class="w-100">
                                <div class="p-4 bg-light">
                                    <h4>Lorem ipsum is simply dummy</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                        to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining </p>
                                    <a href="#">Read More <i class="fas fa-arrow-right ms-2"></i></a>
                                    <h5 class="m-0 pt-2">Mr. Lorem Ipsum <span>Kottayam</span></h5>
                                </div>
                            </div>
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


   
    


@endsection