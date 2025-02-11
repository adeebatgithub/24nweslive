//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");

//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording() {
	var label = document.getElementById('recordButton');
	label.style.display = 'none'; 
	

	/*
		Simple constraints object, for more advanced audio features see
		https://addpipe.com/blog/audio-constraints-getusermedia/
	*/
    
    var constraints = { audio: true, video:false }

 	/*
    	Disable the record button until we get a success or fail from getUserMedia() 
	*/

	recordButton.disabled = true;
	stopButton.disabled = false;
	// pauseButton.disabled = false

	/*
    	We're using the standard promise based getUserMedia() 
    	https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
	*/

	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		/*
			create an audio context after getUserMedia is called
			sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
			the sampleRate defaults to the one set in your OS for your playback device

		*/
		audioContext = new AudioContext();

		//update the format 
		document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"

		/*  assign to gumStream for later use  */
		gumStream = stream;
		
		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		/* 
			Create the Recorder object and configure to record mono sound (1 channel)
			Recording 2 channels  will double the file size
		*/
		rec = new Recorder(input,{numChannels:1})

		//start the recording process
		rec.record()

		console.log("Recording started");

	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails
    	recordButton.disabled = false;
    	stopButton.disabled = true;
    	// pauseButton.disabled = true
	});
}

function pauseRecording(){
	console.log("pauseButton clicked rec.recording=",rec.recording );
	if (rec.recording){
		//pause
		rec.stop();
		pauseButton.innerHTML="Resume";
	}else{
		//resume
		rec.record()
		pauseButton.innerHTML="Pause";

	}
}

function stopRecording() {
	console.log("stopButton clicked");

	//disable the stop button, enable the record too allow for new recordings
	stopButton.disabled = true;
	recordButton.disabled = false;
	// pauseButton.disabled = true;

	//reset button just in case the recording is stopped while paused
	// pauseButton.innerHTML="Pause";
	
	//tell the recorder to stop the recording
	rec.stop();

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
    var url = URL.createObjectURL(blob);
    var au = document.createElement('audio');
    var li = document.createElement('li');
    var link = document.createElement('a');
    var deleteButton = document.createElement('label'); // Create delete button

    // Name of .wav file to use during upload and download (without extension)
    var filename = new Date().toISOString();

    // Add controls to the <audio> element
    au.controls = true;
    au.src = url;

    // Save to disk link
    link.href = url;
    link.download = filename + ".wav"; // Download forces the browser to download the file using the filename

    // Append elements to <li>
    li.appendChild(au);
	li.appendChild(document.createElement("br"));
    li.appendChild(link);

    // Add the delete button
    deleteButton.innerHTML = 'Delete';
    deleteButton.className = "cursor-pointer"; // Add Bootstrap classes
    deleteButton.addEventListener("click", function() {
		 var btn = document.getElementById('recordButton');
		btn.style.display = 'block'; 
        // Remove the corresponding <li> element when the delete button is clicked
        li.parentNode.removeChild(li);
    });
    li.appendChild(deleteButton); // Append delete button to the bottom of the list item

    // Add the <li> element to the list of recordings
    recordingsList.appendChild(li);

    // Create file upload if needed
    createFileUpload(blob);
}


function createFileUpload(blob) {


	var url = URL.createObjectURL(blob);
    var filename = new Date().toISOString();

    // Create a hidden input element
    var input = document.createElement('input');
    input.type = 'file';
    input.style.display = 'none';
	input.name = 'recorded_audio';

    // Create a new DataTransfer object
    var dataTransfer = new DataTransfer();

    // Create a new File object and add it to the DataTransfer object
    var file = new File([blob], filename , { type: 'audio/wav' });
    dataTransfer.items.add(file);

    // Set the files property of the input element with the DataTransfer object
    input.files = dataTransfer.files;

    // Append the input element to the form
    var form = document.getElementById('sakshyam_form');
    form.appendChild(input);
}