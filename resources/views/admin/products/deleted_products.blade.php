@extends('admin.layout.layout')
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Catalogue Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Catalogue</a></li>
                                    <li class="breadcrumb-item active">Deleted Products</li>
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

                                <h4 class="card-title">Deleted Products </h4>
                                <div class="col-lg-12">
                                    <div class="text-sm-end">
                                        <a href="{{ url('admin/products') }}">   <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="bx bx-arrow-back me-1"></i> Back</button>  </a>

                                    </div>
                                </div>


                                <p class="card-title-desc"></p>
                                @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session::get('success_message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Product Color</th>
                                            <th>Product Image</th>
                                            <th>Category</th>
                                            <th>Section</th>
                                            <th>Added By</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)

                                        <tr>
                                            <td>{{ $product['id'] }}</td>
                                            <td>{{ $product['product_name'] }}</td>
                                            <td>{{ $product['product_code']}}</td>
                                            <td>{{ $product['product_color']}}</td>
                                            <td>@if (!empty($product['product_image']))
                                                    <img src="{{ asset('front/images/product_images/small/'.$product['product_image']) }}" alt="Product Image" width="80px;">
                                                    @else
                                                    <img src="{{ asset('front/images/product_images/small/websiteplanet-dummy-250X250.png') }}" alt="No Image" width="80px">
                                                @endif</td>
                                            <td>{{ $product['category']['category_name']}}</td>
                                            <td>{{ $product['section']['name']}}</td>
                                            <td>
                                                @if ($product['admin_type'] == "seller")
                                                    <a target="blank" href="{{ url('admin/view-seller-details/'.$product['admin_id']) }}">{{ ucfirst($product['admin_type']) }}</a>

                                                @else
                                                    {{ ucfirst($product['admin_type']) }}

                                                @endif
                                            </td>
                                            <td>
                                                @if ($product['status'] == 1)
                                                    <a class="updateProductStatus" href="javascript:void(0)" id
                                                        ="product-{{ $product['id'] }}"
                                                        product_id="{{ $product['id'] }}">
                                                        <i style ="font-size: 20px;"
                                                            class="bx bx-toggle-right text-info" status="Active"></i>
                                                    </a>
                                                @else
                                                    <a class="updateProductStatus" href="javascript:void(0)" id
                                                        ="product-{{ $product['id'] }}"
                                                        product_id="{{ $product['id'] }}">
                                                        <i style="font-size: 20px; color:danger;"
                                                            class="bx bx-toggle-left text-danger" status="Inactive"></i>
                                                    </a>
                                                @endif
                                            </td>
                                                <td>
                                                    <a href="{{ url('admin/restore_product/'. $product['id']) }}">   <button type="button" class="btn btn-info btn-rounded waves-effect waves-light"><i class= "fas fa-trash-restore-alt me-1"></i> Restore Product</button>  </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
@endsection
