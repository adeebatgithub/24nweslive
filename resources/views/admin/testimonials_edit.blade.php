@extends('admin.layout.app')

@section('heading', 'Edit Testimonials')

@section('button')
<a href="{{ route('admin_testimonials_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_testimonials_update',$testimonials_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="title" value="{{ $testimonials_single->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Testimony *</label>
                            <textarea name="testimony" class="form-control snote" cols="30" rows="10">{{ $testimonials_single->testimony }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Sharable?</label>
                            <select name="show_on_page" class="form-control">
                                <option value="1" @if($testimonials_single->show_on_page == 1) selected @endif>Yes</option>
                                <option value="0" @if($testimonials_single->show_on_page == 0) selected @endif>No</option>
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