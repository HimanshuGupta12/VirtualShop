@extends('admin.layout.layout')
@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Update Details </h5>
                                        <p>Update Admin Details</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle"
                                                height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>


                            <div class="p-2">
                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session::get('error_message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session::get('success_message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                            <p><i class="mdi mdi-alert-outline me-2"></i>{{ $error }}</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endforeach
                                @endif
                                <form class="form-horizontal" action="{{ route('admin/update-admin-details') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label"> Email</label>
                                        <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="admin_name" class="form-label"> Name</label>
                                        <input type="text" class="form-control" id="admin_name" name="admin_name"
                                            value="{{ Auth::guard('admin')->user()->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="admin_mobile" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" maxlength="10" minlength="10"
                                            id="admin_mobile" name="admin_mobile" placeholder="Enter Mobile"
                                            value="{{ Auth::guard('admin')->user()->mobile }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Admin Type</label>
                                        <input class="form-control" placeholder="Admin Type"
                                            value="{{ Auth::guard('admin')->user()->type }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="admin_image" class="form-label">Admin Photo </label>
                                        <input type="file" class="form-control" id="admin_image" name="admin_image">
                                    </div>

                                    @if (!empty(Auth::guard('admin')->user()->image))
                                        <a target="_blank"
                                            href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">View
                                            Image</a>
                                        <input type="hidden" name="current_admin_image"
                                            value="{{ Auth::guard('admin')->user()->image }}">
                                    @endif

                                    <div class="text-end mt-5">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                                        <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="auth-login.html" class="fw-medium text-primary"> Sign In here</a> </p>
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                            Themesbrand
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
