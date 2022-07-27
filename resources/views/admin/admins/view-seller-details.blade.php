@extends('admin.layout.layout')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Seller Details</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Seller Details</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Information</h4>
                                <p class="card-title-desc">Fill all information below</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Email</label>
                                                <input class="form-control"
                                                    value="{{ $viewsellerDetails['seller_personal']['email'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="seller_name" class="form-label"> Name</label>
                                                <input class="form-control" id="seller_name"
                                                    name="seller_name" value="{{ $viewsellerDetails['seller_personal']['name'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="seller_mobile" class="form-label">Mobile</label>
                                                <input class="form-control" maxlength="10" minlength="10"
                                                    id="seller_mobile" name="seller_mobile" placeholder="Enter Mobile"
                                                    value="{{ $viewsellerDetails['seller_personal']['mobile'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_address" class="form-label"> Address</label>
                                                <textarea name="seller_address" id="seller_address" cols="10" rows="4" class="form-control" readonly>{{  $viewsellerDetails['seller_personal']['address'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="seller_city" class="form-label"> City</label>
                                                <input class="form-control" id="seller_city"
                                                    name="seller_city" value="{{ $viewsellerDetails['seller_personal']['city'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_state" class="form-label"> State</label>
                                                <input class="form-control" id="seller_state"
                                                    name="seller_state" value="{{ $viewsellerDetails['seller_personal']['state'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_country" class="form-label"> Country</label>
                                                <input class="form-control" id="seller_country"
                                                    name="seller_country" value="{{ $viewsellerDetails['seller_personal']['country'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_pincode" class="form-label"> Pincode</label>
                                                <input class="form-control" id="seller_pincode"
                                                    name="seller_pincode" value="{{ $viewsellerDetails['seller_personal']['pincode'] }}" readonly>
                                            </div>
                                        </div>
                                        @if (!empty($viewsellerDetails['image']))
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3"></h4>
                                                        <img src="{{ url('admin/images/photos/'.$viewsellerDetails['image']) }}" alt="" width="200px">
                                            </div>
                                        </div> <!-- end card-->
                                        @endif


                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Business Information</h4>
                                {{-- <p class="card-title-desc">Fill all information below</p> --}}
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="mb-3">
                                                <label for="shop_name" class="form-label">Shop Name</label>
                                                <input class="form-control" id="shop_name"
                                                    name="shop_name" value="{{ $viewsellerDetails['seller_business']['shop_name'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_mobile" class="form-label">Shop Mobile</label>
                                                <input  class="form-control" maxlength="10" minlength="10"
                                                    id="shop_mobile" name="shop_mobile"
                                                    value="{{ $viewsellerDetails['seller_business']['shop_mobile'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_address" class="form-label">Shop Address</label>
                                                <textarea name="shop_address" id="shop_address" cols="10" rows="4" class="form-control" readonly>{{  $viewsellerDetails['seller_business']['shop_address'] }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="business_license_number" class="form-label">Business License Number</label>
                                                <input class="form-control" id="business_license_number"
                                                    name="business_license_number" value="{{ $viewsellerDetails['seller_business']['business_license_number'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="gst_number" class="form-label">GST Number</label>
                                                <input  class="form-control" id="gst_number"
                                                    name="gst_number" value="{{ $viewsellerDetails['seller_business']['gst_number'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="pan_number" class="form-label">PAN Number</label>
                                                <input  class="form-control" id="pan_number"
                                                    name="pan_number" value="{{ $viewsellerDetails['seller_business']['pan_number'] }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">


                                            <div class="mb-3">
                                                <label for="shop_city" class="form-label">Shop City</label>
                                                <input  class="form-control" id="shop_city"
                                                    name="shop_city" value="{{ $viewsellerDetails['seller_business']['shop_city'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_state" class="form-label">Shop State</label>
                                                <input  class="form-control" id="shop_state"
                                                    name="shop_state" value="{{ $viewsellerDetails['seller_business']['shop_state'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_country" class="form-label">Shop Country</label>
                                                <input  class="form-control" id="shop_country"
                                                    name="shop_country" value="{{ $viewsellerDetails['seller_business']['shop_country'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                                <input  class="form-control" id="shop_pincode"
                                                    name="shop_pincode" value="{{ $viewsellerDetails['seller_business']['shop_pincode'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="address_proof" class="form-label">Address Proof</label>
                                                <input class="form-control" id="address_proof"
                                                    name="address_proof" value="{{ $viewsellerDetails['seller_business']['address_proof'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_website" class="form-label">Shop Website</label>
                                                <input class="form-control" id="shop_website"
                                                    name="shop_website" value="{{ $viewsellerDetails['seller_business']['shop_website'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_email" class="form-label">Shop Email</label>
                                                <input class="form-control" id="shop_email"
                                                    name="shop_email" value="{{ $viewsellerDetails['seller_business']['shop_email'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="address_proof" class="form-label">Address Proof</label>
                                                <input class="form-control" id="address_proof"
                                                    name="address_proof" value="{{ $viewsellerDetails['seller_business']['address_proof'] }}" readonly>
                                            </div>


                                        </div>
                                        <label for="address_proof_image" class="form-label">Address Proof Image</label>
                                        @if (!empty($viewsellerDetails['seller_business']['address_proof_image']))
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3"></h4>
                                                        <img src="{{ url('admin/images/proof/'.$viewsellerDetails['seller_business']['address_proof_image']) }}" alt="" width="200px">

                                            </div>

                                        </div>
                                        @endif


                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bank Informtion</h4>
                                {{-- <p class="card-title-desc">Fill all information below</p> --}}
                                    <div class="row">
                                        <div class="col-sm-6">


                                            <div class="mb-3">
                                                <label for="account_holder_name" class="form-label"> Account Holder Name</label>
                                                <input class="form-control" id="account_holder_name"
                                                    name="account_holder_name" value="{{ $viewsellerDetails['seller_bank']['account_holder_name'] }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_name" class="form-label"> Bank Name</label>
                                                <input class="form-control" id="bank_name"
                                                    name="bank_name" value="{{ $viewsellerDetails['seller_bank']['bank_name'] }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">


                                            <div class="mb-3">
                                                <label for="account_number" class="form-label">Account Number</label>
                                                <input class="form-control" id="account_number"
                                                    name="account_number" value="{{ $viewsellerDetails['seller_bank']['account_number'] }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="bank_ifsc_code" class="form-label">Bank  IFSC Code</label>
                                                <input class="form-control" id="bank_ifsc_code"
                                                    name="bank_ifsc_code" value="{{ $viewsellerDetails['seller_bank']['bank_ifsc_code'] }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
