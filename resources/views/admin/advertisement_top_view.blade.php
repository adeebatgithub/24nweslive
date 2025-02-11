@extends('admin.layout.app')

@section('heading', 'Top Advertisements')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_top_ad_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Top Ad1 Section</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$top_ad_data->top_ad) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="top_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="top_ad_url" value="{{ $top_ad_data->top_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="top_ad_status" class="form-control">
                                <option value="Show" @if($top_ad_data->top_ad_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($top_ad_data->top_ad_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Top Ad2 Section</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$top_ad_data->top_ad1) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="top_ad1">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="top_ad1_url" value="{{ $top_ad_data->top_ad1_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="top_ad1_status" class="form-control">
                                <option value="Show" @if($top_ad_data->top_ad1_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($top_ad_data->top_ad1_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5>News View Ad Section</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$top_ad_data->top_ad2) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="top_ad2">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="top_ad2_url" value="{{ $top_ad_data->top_ad2_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="top_ad2_status" class="form-control">
                                <option value="Show" @if($top_ad_data->top_ad2_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($top_ad_data->top_ad2_status == 'Hide') selected @endif>Hide</option>
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
@endsection