@extends('author.layout.app')

@section('heading', 'Edit Post')

@section('button')
<a href="{{ route('author_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('author_post_update',$post_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Post Title *</label>
                            <input type="text" class="form-control" name="post_title" value="{{ $post_single->post_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Title English  (Avoid '-')  *</label>
                            <input id="post_title_english" type="text" class="form-control" name="post_title_english" value="{{ $post_single->post_title_english }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug" value="{{ $post_single->slug }}" >
                        </div>
                        <div class="form-group mb-3">
                            <label>Video Link</label>
                            <input id="video_link" type="text" class="form-control" name="video_link" value="{{ $post_single->video_link }}" >
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Detail *</label>
                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10">{{ $post_single->post_detail }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Post Photo *</label>
                            <div>
                                <img src="{{ asset('uploads/'.$post_single->post_photo) }}" alt="" style="width:300px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Post Photo *</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="sub_category_id" class="form-control select2">
                                @foreach($sub_categories as $item)
                                <option value="{{ $item->id }}" @if($item->id == $post_single->sub_category_id) selected @endif>{{ $item->sub_category_name }} ({{ $item->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Sharable?</label>
                            <select name="is_share" class="form-control">
                                <option value="0" @if($post_single->is_share == 0) selected @endif>No</option>
                                <option value="1" @if($post_single->is_share == 1) selected @endif>Yes</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="0" @if($post_single->is_comment == 0) selected @endif>No</option>
                                <option value="1" @if($post_single->is_comment == 1) selected @endif>Yes</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Tags</label>
                            <table class="table table-bordered">
                                @foreach($existing_tags as $item)
                                    <tr>
                                        <td>{{ $item->tag_name }}</td>
                                        <td>
                                            <a href="{{ route('author_post_delete_tag', [$item->id,$post_single->id]) }}" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="form-group mb-3">
                            <label>New Tags</label>
                            <input type="text" class="form-control" name="tags" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language_id" class="form-control">
                                @foreach($global_language_data as $row)
                                <option value="{{ $row->id }}" @if($row->id == $post_single->language_id) selected @endif>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<script>
    jQuery($ => { // DOM ready and $ alias in scope.

// TAGS BOX

$("#post_title_english").keyup(function () {
            var inputText = $(this).val();
            var firstChar = inputText.charAt(0);

            if (!isNaN(firstChar)) { // Check if the first character is a number
                var convertedText = NumToWord(inputText);
                $("#slug").val(convertedText.toLowerCase());
            } else {
                $("#slug").val(inputText.replace(/[^a-z0-9\+\-\.\#]/ig, '-').toLowerCase());
            }
        });

    });
    function NumToWord(inputText) {
    // Separate the input into words
    var words = inputText.split(/\s+/);

    // Convert the first numeric part to words and leave other numeric parts unchanged
    var outputWords = words.map(function(word, index) {
        if (index === 0 && !isNaN(word[0])) {
            if (word.length <= 9) {
                return convertToWords(word);
            } else {
                return 'number too large';
            }
        } else {
            return word.toLowerCase();
        }
    });

    // Join the output words with hyphens
    return outputWords.join('-');
}

function convertToWords(inputNumber) {
    var num = parseInt(inputNumber, 10); // Ensure numeric value
    if (isNaN(num)) {
        return ''; // Return empty string if input is not a valid number
    }

    var once = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    var twos = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    var tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

    if (num === 0) {
        return 'zero';
    }

    var numStr = '';

    if (num < 10) {
        numStr = once[num];
    } else if (num < 20) {
        numStr = twos[num - 10];
    } else if (num < 100) {
        var tensDigit = Math.floor(num / 10);
        var onesDigit = num % 10;
        numStr = tens[tensDigit] + (onesDigit !== 0 ? '-' + once[onesDigit] : '');
    } else if (num < 1000) {
        var hundredsDigit = Math.floor(num / 100);
        var remainder = num % 100;
        numStr = once[hundredsDigit] + '-hundred';
        if (remainder !== 0) {
            numStr += '-' + convertToWords(remainder);
        }
    } else if (num < 100000) { // Check if number is in thousands range
        var thousands = Math.floor(num / 1000); // Get the thousands part
        var remainder = num % 1000; // Get the remaining part
        numStr = convertToWords(thousands) + '-thousand'; // Convert thousands to words
        if (remainder !== 0) {
            numStr += '-' + convertToWords(remainder); // Convert remaining part to words
        }
    } else if (num < 10000000) { // Check if number is in lakhs range
        var lakhs = Math.floor(num / 100000); // Get the lakhs part
        var remainder = num % 100000; // Get the remaining part
        numStr = convertToWords(lakhs) + '-lakh'; // Convert lakhs to words
        if (remainder !== 0) {
            numStr += '-' + convertToWords(remainder); // Convert remaining part to words
        }
    } else {
        numStr = 'number too large';
    }

    return numStr;
}
</script>
@endsection