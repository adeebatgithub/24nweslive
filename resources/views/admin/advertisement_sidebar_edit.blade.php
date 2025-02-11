@extends('admin.layout.app')

@section('heading', 'Sidebar Advertisement Update')

@section('button')
<a href="{{ route('admin_sidebar_ad_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_sidebar_ad_update',$sidebar_ad_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$sidebar_ad_data->sidebar_ad) }}" alt="" style="width:200px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="sidebar_ad">
                            </div>
                        </div>
                        <!-- <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="sidebar_ad_url" value="{{ $sidebar_ad_data->sidebar_ad_url }}">
                        </div> -->
                        <div class="form-group mb-3">
                            <label>Location</label>
                            <select name="sidebar_ad_location" class="form-control">
                                <option value="Top" @if($sidebar_ad_data->sidebar_ad_location == 'Top') selected @endif>Top</option>
                                <option value="Bottom" @if($sidebar_ad_data->sidebar_ad_location == 'Bottom') selected @endif>Bottom</option>
                                <option value="Ad1" @if($sidebar_ad_data->sidebar_ad_location == 'Ad1') selected @endif>Ad1</option>
                                <option value="Ad2" @if($sidebar_ad_data->sidebar_ad_location == 'Ad2') selected @endif>Ad2</option>
                                <option value="Ad3" @if($sidebar_ad_data->sidebar_ad_location == 'Ad3') selected @endif>Ad3</option>
                                <option value="Ad4" @if($sidebar_ad_data->sidebar_ad_location == 'Ad4') selected @endif>Ad4</option>
                                <option value="StickyAd1" @if($sidebar_ad_data->sidebar_ad_location == 'StickyAd1') selected @endif>StickyAd1</option>
                                <option value="StickyAd2" @if($sidebar_ad_data->sidebar_ad_location == 'StickyAd1') selected @endif>StickyAd1</option>
                            </select>
                        </div>    
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="sidebar_ad_url" class="form-control">
                                <option value="Show" @if($sidebar_ad_data->sidebar_ad_url == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($sidebar_ad_data->sidebar_ad_url == 'Hide') selected @endif>Hide</option>
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