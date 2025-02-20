@extends('admin.layout.app')

@section('heading', 'Author Permissions')

@section('button')
<a href="{{ route('admin_author_show') }}" class="btn btn-primary">Back to Author list</a>
@endsection

@section('main_content')
<a href="{{ route('admin_permission_add_all',$author_id) }}" class="btn btn-primary">Add All Permissions</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->sub_category_name }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_permission_add',['author_id'=>$author_id, 'category_id'=>$row->id]) }}" class="btn btn-primary">Add</a>
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

<a href="{{ route('admin_permission_remove_all',$author_id) }}" class="btn btn-danger">Remove All Permissions</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permittedCategories as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->category->sub_category_name }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_permission_remove',$row->id) }}" class="btn btn-danger">Remove</a>
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
