@extends('admin.layout.app')

@section('heading', 'Home Advertisements')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_home_ad_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Above Search 1</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$home_ad_data->above_search_ad) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_search_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_search_ad_url" value="{{ $home_ad_data->above_search_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_search_ad_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_search_ad_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_search_ad_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Above Search 2</h5>
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_footer_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_footer_ad_url" value="{{ $home_ad_data->above_footer_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_footer_ad_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_footer_ad_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_footer_ad_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Above Footer 1</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$home_ad_data->above_search_ad1) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_search_ad1">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_search_ad1_url" value="{{ $home_ad_data->above_search_ad1_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_search_ad1_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_search_ad1_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_search_ad1_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Above Footer 2</h5>
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad1) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_footer_ad1">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_footer_ad1_url" value="{{ $home_ad_data->above_footer_ad1_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_footer_ad1_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_footer_ad1_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_footer_ad1_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Home Side Ad 1</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$home_ad_data->above_search_ad2) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_search_ad2">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_search_ad2_url" value="{{ $home_ad_data->above_search_ad2_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_search_ad2_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_search_ad2_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_search_ad2_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Home Side Ad 2</h5>
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad2) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_footer_ad2">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_footer_ad2_url" value="{{ $home_ad_data->above_footer_ad2_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_footer_ad2_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_footer_ad2_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_footer_ad2_status == 'Hide') selected @endif>Hide</option>
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