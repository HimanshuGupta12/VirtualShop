@extends('admin.layout.layout')
@section('content')

    @if ($slug == 'personal')
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Update Seller's Details

                                </h4>


                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Add Product</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
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
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Basic Information</h4>
                                    <p class="card-title-desc">Fill all information below</p>

                                    <form class="form-horizontal"
                                        action="{{ url('admin/update_sellers_details/personal') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label"> Email</label>
                                                    <input class="form-control"
                                                        value="{{ Auth::guard('admin')->user()->email }}" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_name" class="form-label"> Name</label>
                                                    <input type="text" class="form-control" id="seller_name"
                                                        name="seller_name"
                                                        value="{{ Auth::guard('admin')->user()->name }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_mobile" class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" maxlength="10" minlength="10"
                                                        id="seller_mobile" name="seller_mobile" placeholder="Enter Mobile"
                                                        value="{{ $sellerDetail['mobile'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_address" class="form-label"> Address</label>
                                                    <textarea name="seller_address" id="seller_address" cols="10" rows="4" class="form-control">{{ $sellerDetail['address'] }}</textarea>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">


                                                <div class="mb-3">
                                                    <label for="seller_city" class="form-label"> City</label>
                                                    <input type="text" class="form-control" id="seller_city"
                                                        name="seller_city" value="{{ $sellerDetail['city'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_state" class="form-label"> State</label>
                                                    <input type="text" class="form-control" id="seller_state"
                                                        name="seller_state" value="{{ $sellerDetail['state'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_country" class="form-label"> Country</label>
                                                    {{-- <input type="text" class="form-control" id="seller_country"
                                                        name="seller_country" value="{{ $sellerDetail['country'] }}"> --}}
                                                        <select name="seller_country" id="seller_country" class="form-control">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country['country_name'] }}"
                                                                 @if ($country['country_name'] == $sellerDetail['country']) selected @endif>{{ $country['country_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_pincode" class="form-label"> Pincode</label>
                                                    <input type="text" class="form-control" id="seller_pincode"
                                                        name="seller_pincode" value="{{ $sellerDetail['pincode'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_image" class="form-label">Photo </label>
                                                    <input type="file" class="form-control" id="seller_image"
                                                        name="seller_image">
                                                </div>

                                                @if (!empty(Auth::guard('admin')->user()->image))
                                                    <a target="_blank"
                                                        href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">View
                                                        Image</a>
                                                    <input type="hidden" name="current_seller_image"
                                                        value="{{ Auth::guard('admin')->user()->image }}">
                                                @endif

                                            </div>
                                            <div class="text-end mt-5">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                                                <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
    @elseif ($slug == 'business')


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Update Seller's Details</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Update Seller's Details</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
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
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Business Detail</h4>
                                    <p class="card-title-desc">Fill all information below</p>

                                    <form class="form-horizontal"
                                        action="{{ url('admin/update_sellers_details/business') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label"> Email</label>
                                                    <input class="form-control"
                                                        value="{{ Auth::guard('admin')->user()->email }}" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_name" class="form-label">Shop Name</label>
                                                    <input type="text" class="form-control" id="shop_name"
                                                        name="shop_name"
                                                        value="{{ $sellerDetail['shop_name'] }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_address" class="form-label">Shop Address</label>
                                                    <textarea name="shop_address" id="shop_address" cols="10" rows="3" class="form-control"
                                                        placeholder="Enter Shop Address">{{ $sellerDetail['shop_address'] }}</textarea>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="shop_mobile" class="form-label">Shop Mobile</label>
                                                    <input type="text" class="form-control" maxlength="10"
                                                        minlength="10" id="shop_mobile" name="shop_mobile"
                                                        placeholder="Enter shop Mobile"
                                                        value="{{ $sellerDetail['shop_mobile'] }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="business_license_number" class="form-label">Business
                                                        License Number</label>
                                                    <input type="text" class="form-control" id="business_license_number"
                                                        name="business_license_number"
                                                        placeholder="Enter Business License Number"
                                                        value="{{ $sellerDetail['business_license_number'] }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="gst_number" class="form-label">GST Number</label>
                                                    <input type="text" class="form-control" id="gst_number" name="gst_number"
                                                        placeholder="Enter GST Number"
                                                        value="{{ $sellerDetail['gst_number'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pan_number" class="form-label">Pan Number</label>
                                                    <input type="text" class="form-control" id="pan_number" name="pan_number"
                                                        placeholder="Enter PAN Number"
                                                        value="{{ $sellerDetail['pan_number'] }}">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="shop_email" class="form-label">Shop Email</label>
                                                    <input type="email" class="form-control" id="shop_email" name="shop_email"
                                                        placeholder="Enter Shop Email"
                                                        value="{{ $shopDetail['shop_email'] }}">
                                                </div> --}}


                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="shop_city" class="form-label">Shop City</label>
                                                    <input type="text" class="form-control" id="shop_city"
                                                        name="shop_city" placeholder="Enter Shop City"
                                                        value="{{ $sellerDetail['shop_city'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_state" class="form-label">Shop State</label>
                                                    <input type="text" class="form-control" id="shop_state"
                                                        name="shop_state" placeholder="Enter Shop State"
                                                        value="{{ $sellerDetail['shop_state'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_country" class="form-label">Shop Country</label>
                                                    {{-- <input type="text" class="form-control" id="shop_country"
                                                        placeholder="Enter Shop Country" name="shop_country"
                                                        value="{{ $sellerDetail['shop_country'] }}"> --}}

                                                        <select name="shop_country" id="shop_country" class="form-control">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country['country_name'] }}"
                                                                 @if ($country['country_name'] == $sellerDetail['shop_country']) selected @endif>{{ $country['country_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                                    <input type="text" class="form-control" id="shop_pincode"
                                                        placeholder="Enter Shop Pincode" name="shop_pincode"
                                                        value="{{ $sellerDetail['shop_pincode'] }}">
                                                </div>

                                                {{-- <div class="mb-3">
                                                    <label for="shop_website" class="form-label">Shop Website</label>
                                                    <input type="email" class="form-control" id="shop_website" name="shop_website"
                                                        placeholder="Enter Shop Website"
                                                        value="{{ $shopDetail['shop_website'] }}">
                                                </div> --}}


                                                <div class="mb-3">
                                                    <label for="address_proof" class="form-label">Address Proof</label>
                                                    <select class="form-control" name="address_proof" id="address_proof">
                                                        <option value="Passport"        @if ($sellerDetail['address_proof']=="Passport") selected @endif >Passport</option>
                                                        <option value="Voting Card"     @if ($sellerDetail['address_proof']=="Voting Card") selected @endif>Voting Card</option>
                                                        <option value="PAN"             @if ($sellerDetail['address_proof']=="PAN") selected @endif>PAN</option>
                                                        <option value="Driving License" @if ($sellerDetail['address_proof']=="Driving License") selected @endif>Driving License</option>
                                                        <option value="Aadhar Card"     @if ($sellerDetail['address_proof']=="Aadhar Card") selected @endif>Aadhar Card</option>

                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address_proof_image" class="form-label">Address Proof
                                                        Image </label>
                                                    <input type="file" class="form-control" id="address_proof_image"
                                                        name="address_proof_image">
                                                </div>

                                                @if (!empty($sellerDetail['address_proof_image']))
                                                    <a target="_blank"
                                                        href="{{ url('admin/images/proof/'.$sellerDetail['address_proof_image']) }}">View
                                                        Image</a>
                                                    <input type="hidden" name="current_addressProof_image"
                                                        value="{{ $sellerDetail['address_proof_image'] }}">
                                                @endif

                                            </div>
                                            <div class="text-end mt-5">
                                                <button class="btn btn-primary w-md waves-effect waves-light"type="submit">Save</button>
                                                <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
    @elseif ($slug == 'bank')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Update Seller's Details

                            </h4>


                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Update Seller's Details</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
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
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Update Bank Information</h4>
                                <p class="card-title-desc">Fill all information below</p>

                                <form class="form-horizontal"
                                    action="{{ url('admin/update_sellers_details/bank') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Email</label>
                                                <input class="form-control"
                                                    value="{{ Auth::guard('admin')->user()->email }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="account_holder_name" class="form-label">Account Holder Name</label>
                                                <input type="text" class="form-control" id="account_holder_name"
                                                    name="account_holder_name" placeholder="Enter Account  Holder Name"
                                                    value="{{ $sellerDetail['account_holder_name'] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_name" class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" id="bank_name"
                                                    name="bank_name" placeholder="Enter Bank Name"
                                                    value="{{ $sellerDetail['bank_name'] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="account_number" class="form-label">Account Number
                                                    License Number</label>
                                                <input type="text" class="form-control" id="account_number"
                                                    name="account_number"
                                                    placeholder="Enter Account Number"
                                                    value="{{ $sellerDetail['account_number'] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_ifsc_code" class="form-label">Bank IFSC Code</label>
                                                <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code"
                                                    placeholder="Enter GST Number"
                                                    value="{{ $sellerDetail['bank_ifsc_code'] }}">
                                            </div>

                                        </div>

                                        <div class="text-end mt-5">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Save</button>
                                            <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    @endif
@endsection
