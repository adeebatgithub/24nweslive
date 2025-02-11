@extends('admin.layout.app')

@section('heading', 'Top Advertisements')

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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Spirituality</th>
                                    <th>Religion</th>
                                    <th>Education</th>
                                    <th>Job</th>
                                    <th>Parish</th>
                                    <th>P_Priest</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Comments</th>
                                    <th>Confirmation</th>
                                    <th>Interests</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($volunteer_data as $row)
                                <!-- $categories = json_decode($row->category) -->
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="" style="width:200px;">
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->spirituality }}</td>
                                    <td>{{ $row->religion }}</td>
                                    <td>{{ $row->education }}</td>
                                    <td>{{ $row->job }}</td>
                                    <td>{{ $row->parish }}</td>
                                    <td>{{ $row->parish_priest }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->city }}</td>
                                    <td>{{ $row->state }}</td>
                                    <td>{{ $row->country }}</td>
                                    <td>{{ $row->comments }}</td>
                                    <td>{{ $row->confirmation }}</td>
                                    <td>{{ $row->category }}</td>
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