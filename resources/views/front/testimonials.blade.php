@extends('front.layout.app')

@section('main_content')
<style>
    li{
  list-style-type: none;
  color: blue;
  
}
.cursor-pointer{
  cursor: pointer;
}
</style>
<section class="py-4">
        <div class="container">
            <div class="col-12 mb-4">
                <a href="#"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad2) }}" class="w-100" alt=""></a>
            </div>
            <div class="news-box inner-news-top">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-2"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sakshyam</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row">
                <div class="col-xl-9 mt-xl-3">
                    <div class="col-12 px-0 position-relative testi-head">
                        <h4 class="title border-bottom mb-4"><span>Sakshyam</span></h4>
                        <a href="#submit-testi" class="btn shadow-none btn-1">Submit a Sakshyam</a>
                    </div>
                    <div class="testimonials">
                        <div class="row">
                            @foreach($testimonials_data as $row)
                            
                            <div class="col-12 mb-4">
                                <article class="p-4 d-flex flex-column flex-md-row">
                                    <img src="{{ asset('uploads/user.jpg') }}" class="img-fluid border flex-shrink-0" alt="testimonial">

                                    @php
                                    $ts = strtotime($row->updated_at);
                                    $updated_date = date('d F, Y',$ts);
                                    @endphp

                                    <div class="ms-md-4 mt-3 mt-md-0">
                                        <h4>{{ $row->title }}</h4>
                                        <h6 class="border-bottom mb-2 pb-3">Testimony <span class="d-inline-block border-start ps-3 ms-3"><i
                                                    class="far fa-calendar-alt me-2"></i> {{ $updated_date }}</span></h6>
                                        <p>{{ $row->testimony }}
                                        </p>

                                        @if ($row->photo !== NULL)
                                        <div class="sakshyam-img w-100 mt-3 d-flex flex-wrap">
                                            <img src="{{ asset('uploads/'.$row->photo) }}" class="img-fluid" alt="img">
                                            <img src="./images/dummy-img.jpg" class="img-fluid" alt="img">
                                            <img src="./images/dummy-img.jpg" class="img-fluid" alt="img">
                                        </div>
                                        @endif
                                        @if ($row->video !== NULL)
                                        <video controls>
                                            <source src="{{ asset('uploads/'.$row->video) }}" type="video/mp4">
                                            <source src="{{ asset('uploads/'.$row->video) }}" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                        @endif
                                        @if ($row->audio !== NULL)
                                        <audio controls>
                                            <source src="{{ asset('uploads/'.$row->audio) }}" type="audio/ogg">
                                            <source src="{{ asset('uploads/'.$row->audio) }}" type="audio/mpeg">
                                            Your browser does not support the audio tag.
                                        </audio>
                                        @endif
                                        <h5 class="m-0 pt-2">{{ $row->name }} <span>{{ $row->location }}</span></h5>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                            <div class="col-12">
                                <p class="text-left">Showing 1 to 5 of 41</p>
                                <p class="text-center">{{ $testimonials_data->links() }}</p> 
                            </div>
                        </div>
                       
                        <div class="row mt-4">
                            <div class="col-12 testi-form" id="submit-testi">
                                <h4 class="title border-bottom mb-4"><span>Submit Sakshyam</span></h4>
                                <form action="{{ route('testimonials_submit') }}" id="sakshyam_form" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label>Name</label>
                                            <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Email</label>
                                            <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Phone</label>
                                            <input type="text" class="form-control shadow-none @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="">
                                            @error('php_ini_loaded_file')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Your Location</label>
                                            <input type="text" class="form-control shadow-none @error('location') is-invalid @enderror" name="location" value="{{old('location')}}" placeholder="">
                                            @error('location')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Upload Sakshyam Images/Photo</label>
                                            <input type="file" class="form-control shadow-none @error('photo') is-invalid @enderror" name="photo" value="{{old('photo')}}" placeholder="">
                                            @error('photo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Upload Sakshyam Audio</label>
                                            <div id="controls" class="row">
                                                <div class="col-md-3">
                                                <label class="btn btn-success" id="recordButton">Record</label>
                                                </div>
                                                <div class="col-md-3">
                                                {{-- <label class="btn btn-warning" id="pauseButton" disabled>Pause</label> --}}
                                                <label class="btn btn-danger" id="stopButton" disabled>Stop</label>
                                                </div>
                                             </div>
                                             <div id="formats">Format: start recording to see sample rate</div>
                                               <p><strong>Recordings:</strong></p>
                                               <ol id="recordingsList"></ol>
                                           
                                          
                                            {{-- <input type="file" id="audio" class="form-control shadow-none @error('audio') is-invalid @enderror" name="audio" value="{{old('audio')}}" placeholder="">
                                            @error('audio')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror --}}
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Upload Sakshyam video</label>
                                            <input type="file" class="form-control shadow-none @error('video') is-invalid @enderror" name="video" value="{{old('video')}}" placeholder="">
                                            @error('video')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label>Type Your Sakshyam Title</label>
                                            <input type="text" class="form-control shadow-none @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" placeholder="">
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label>Type Your Sakshyam</label>
                                            <textarea class="form-control shadow-none  p-3 @error('testimony') is-invalid @enderror" name="testimony" placeholder="">{{old('testimony')}}</textarea>
                                            @error('testimony')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label>
                                                <input class="form-check-input me-3 @error('confirmation') is-invalid @enderror" type="checkbox" name="confirmation" value="Yes">
                                                I here by testifying in name of jesus christ that the above stated
                                                Sakshyam and
                                                informations is true and correct to the best of my knowledge.</label>
                                                @error('confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>

                                    </div>
                                    <div class="col-12 d-flex">

                                        <button class="btn btn-1 shadow-none ms-auto">Submit Sakshyam</button>

                                    </div>

                            </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                @include('front.layout.sidebar')
            </div>
            <div class="row">
                <div class="col-lg-6 mt-4  catholic-talk">
                    <h4 class="title border-bottom mb-4"><span>Related </span>News</h4>
                    <div class="row">
                        @foreach($trending_post_array as $item)
                        
                        @if($loop->iteration == 7)
                        @break
                        @endif
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="{{ route('news_detail',$item->id) }}">
                                    <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt=""> </div>
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
                                    <h5 class="news-title">{{ $item->post_title }}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-6 mt-4  catholic-talk news-video-inner">
                    <h4 class="title border-bottom mb-4"><span>Live </span>Videos</h4>
                    <div class="row">
                        
                        
                        
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
                        @foreach($live_channel_data as $item)
                        @if($loop->iteration == 7)
                        @break
                        @endif
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="http://www.youtube.com/watch?v={{ $item->video_id }}" class="video-button">
                                    <div class="news-img mb-3"> <img src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg" class="w-100" alt="">
                                        <div class="news-time"><i class="fas fa-play-circle me-2"></i>04:00
                                        </div>
                                    </div>
                                    <div class="user">
                                    @php
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date('d F, Y',$ts);
                                    @endphp
                                    <a href="javascript:void;">{{ $updated_date }}</a>
                                    </div>
                                    <h5 class="news-title">{{ $item->heading }}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        
                        
                        
                        

                    </div>
                </div>
                <div class="col-lg-6 mt-4  catholic-talk">
                    <h4 class="title border-bottom mb-4"><span>Breaking </span>News</h4>
                    <div class="row">
                    @foreach($special_post_array as $item)
                        
                        @if($loop->iteration == 7)
                        @break
                        @endif
                        <div class="col-6 mb-4">
                            <div class="news-box">
                                <a href="{{ route('news_detail',$item->id) }}">
                                    <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt=""> </div>
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
                                    <h5 class="news-title">{{ $item->post_title }}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 mt-4  catholic-talk">
                    <h4 class="title border-bottom mb-4"><span>Catholic </span>Talk</h4>
                    <div class="row">
                    @foreach($catholic_post_array as $item)
                        
                        @if($loop->iteration == 7)
                        @break
                        @endif
                        <div class="col-6  mb-4">
                            <div class="news-box">
                                <a href="{{ route('news_detail',$item->id) }}">
                                    <div class="news-img mb-3"> <img src="{{ asset('uploads/'.$item->post_photo) }}" class="w-100" alt=""> </div>
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
                                    <h5 class="news-title">{{ $item->post_title }}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
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


    class VoiceRecorder {
	constructor() {
		if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
			console.log("getUserMedia supported")
		} else {
			console.log("getUserMedia is not supported on your browser!")
		}

		this.mediaRecorder
		this.stream
		this.chunks = []
		this.isRecording = false

		this.recorderRef = document.querySelector("#recorder")
		this.playerRef = document.querySelector("#player")
		this.startRef = document.querySelector("#start")
		this.stopRef = document.querySelector("#stop")
		
		this.startRef.onclick = this.startRecording.bind(this)
		this.stopRef.onclick = this.stopRecording.bind(this)

		this.constraints = {
			audio: true,
			video: false
		}
		
	}

	handleSuccess(stream) {
		this.stream = stream
		this.stream.oninactive = () => {
			console.log("Stream ended!")
		};
		this.recorderRef.srcObject = this.stream
		this.mediaRecorder = new MediaRecorder(this.stream)
		console.log(this.mediaRecorder)
		this.mediaRecorder.ondataavailable = this.onMediaRecorderDataAvailable.bind(this)
		this.mediaRecorder.onstop = this.onMediaRecorderStop.bind(this)
		this.recorderRef.play()
		this.mediaRecorder.start()
	}

	handleError(error) {
		console.log("navigator.getUserMedia error: ", error)
	}
	
	onMediaRecorderDataAvailable(e) { this.chunks.push(e.data) }
	
	onMediaRecorderStop(e) { 
			const blob = new Blob(this.chunks, { 'type': 'audio/ogg; codecs=opus' })
			const audioURL = window.URL.createObjectURL(blob)
			this.playerRef.src = audioURL
			this.chunks = []
			this.stream.getAudioTracks().forEach(track => track.stop())
			this.stream = null
	}

	startRecording() {
		if (this.isRecording) return
		this.isRecording = true
		this.startRef.innerHTML = 'Recording...'
		this.playerRef.src = ''
		navigator.mediaDevices
			.getUserMedia(this.constraints)
			.then(this.handleSuccess.bind(this))
			.catch(this.handleError.bind(this))
	}
	
	stopRecording() {
		if (!this.isRecording) return
		this.isRecording = false
		this.startRef.innerHTML = 'Record'
		this.recorderRef.pause()
		this.mediaRecorder.stop()
	}
	
}

window.voiceRecorder = new VoiceRecorder()

</script>
<div id="loader"></div>


@endsection