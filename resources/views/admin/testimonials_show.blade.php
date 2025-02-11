@extends('admin.layout.app')

@section('heading', 'Testimonials')

@section('button')
<!-- <a href="{{ route('admin_testimonials_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a> -->
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Title</th>
                                    <th>Publish</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->location }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->show_on_page }}</td>
                                    <td class="pt_10 pb_10">
                                        
                                        <a href="{{ route('admin_testimonials_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_testimonials_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                       
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection