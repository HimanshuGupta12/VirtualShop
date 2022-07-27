@extends('admin.layout.layout')
@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="col-lg-12">
            <div class="text-sm-end m-4">
                <a href="{{ url('admin/brands') }}">   <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="bx bx-arrow-back me-1"></i> Back</button>  </a>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">{{ $title }} </h5>
                                        {{-- <p>Update Admin Details</p> --}}
                                    </div>
                                </div>
                                {{-- <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            {{-- <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle"
                                                height="34">
                                        </span>
                                    </div>
                                </a>
                            </div> --}}


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
                                <form class="form-horizontal" @if(empty($brand['id']))
                                action="{{ url('admin/add_edit_brand') }}" @else   action="{{ url('admin/add_edit_brand/'.$brand['id']) }}" @endif
                                    method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="mb-3">
                                        <label for="brand_name" class="form-label">brand Name</label>
                                        <input type="text" class="form-control" id="brand_name" name="brand_name"
                                          @if(!empty($brand['brand_name'])) value="{{ $brand['brand_name'] }}" @else value = "{{ old('brand_name')}}" @endif >
                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light"
                                            type="submit">Save</button>
                                            <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
