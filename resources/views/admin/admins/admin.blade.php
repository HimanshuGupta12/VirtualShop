@extends('admin.layout.layout')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Admin Id</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin )
                                        <tr>
                                            <td>{{ $admin['id'] }}</td>
                                            <td>{{ $admin['name'] }}</td>
                                            <td>{{ $admin['type'] }}</td>
                                            <td>{{ $admin['mobile'] }}</td>
                                            <td>{{ $admin['email'] }}</td>
                                            <td><img src="{{ asset('admin/images/photos/'.$admin['image']) }}" alt="" width="50px"></td>
                                            <td>
                                                @if ($admin['status']==1)
                                                <a  class = "updateAdminStatus"  href="javascript:void(0)" id ="admin-{{ $admin['id'] }}" admin_id = "{{ $admin['id'] }}">
                                                    <i style ="font-size: 30px; color:green;" class="bx bxs-user-check" status = "Active"></i>
                                                </a>
                                                @else
                                                <a  class = "updateAdminStatus" href="javascript:void(0)" id ="admin-{{ $admin['id'] }}" admin_id = "{{ $admin['id'] }}">
                                                    <i style="font-size: 30px; color:red;" class="bx bxs-user-x" status = "Inactive"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($admin['type'] == "seller")
                                                    <a href="{{ url('admin/view-seller-details/'.$admin['id']) }}"> <i style="font-size: 25px;" class="bx bxs-show"></i></a>
                                                @endif
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
    </div>
</div>
@endsection
