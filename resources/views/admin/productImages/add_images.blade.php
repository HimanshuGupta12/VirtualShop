@extends('admin.layout.layout') @section('content')
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
						<h4 class="mb-sm-0 font-size-18">Add Images</h4>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
								<li class="breadcrumb-item active">Add Product Images</li>
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
							<h4 class="card-title">Add Images</h4>
							<p class="card-title-desc">Fill all information below</p> @if (Session::has('error_message'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session::get('error_message') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div> @endif @if (Session::has('success_message'))
							<div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session::get('success_message') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div> @endif @if ($errors->any()) @foreach ($errors->all() as $error)
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<p><i class="mdi mdi-alert-outline me-2"></i>{{ $error }}</p>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div> @endforeach @endif
							<form class="form-horizontal" action="{{ url('admin/add_images/' . $products['id']) }}"  method="POST" enctype="multipart/form-data"> @csrf
								<div class="row">
									<div class="col-sm-6">

										<div class="mb-3">
											<label for="product_name" class="form-label"> <b>Product Name : </b> </label>
                                            &nbsp; {{ $products['product_name'] }} </div>
										<div class="mb-3">
											<label for="product_code" class="form-label"> <b>Product Code : </b> </label>
                                            &nbsp; {{ $products['product_code'] }} </div>
										<div class="mb-3">
											<label for="original_price" class="form-label"> <b>Original Price : </b>  </label>
                                            &nbsp; {{ $products['original_price'] }}
                                        </div>

									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="product_color" class="form-label"> <b>Product Color : </b> </label>
                                            &nbsp; {{ $products['product_color'] }}
                                        </div>

                                        {{-- <div class="mb-3">
											<label for="offer_price" class="form-label"> <b>Offer Price</b>  </label>
                                            &nbsp; {{ $products['offer_price'] }}
                                        </div> --}}

                                        <div class="mb-3">
											<div class="field_wrapper">
                                                <div  class="mb-3">
                                                    <label for="images"><b>Add Multiple Images : </b></label>
                                                <input type="file" name="images[]" id="images" multiple="">
                                                </div>
                                            </div>
                                        </div>

									</div>
								</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4 class="card-title mb-3">Product Image</h4>
							<div class="fallback">
								{{-- <input name="product_image" type="file" multiple  /> </div> --}}
                                @if (!empty($products['product_image']))
							<div class="dz-message needsclick text-center"> <img src="{{ url('front/images/product_images/medium/' . $products['product_image']) }}" alt="ProductImage" width="400px;" height="400px"> </div>
                                @else
							<div class="dz-message needsclick">
								<div class="mb-3"> <i class="display-4 text-muted bx bxs-cloud-upload"></i> </div>
								<h4>Drop files here or click to upload.</h4> </div> @endif </div>
                    </div>
					</div>
					<!-- end card-->
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-wrap gap-2">
								<button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
								<button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
							</div>
							</form>
						</div>
					</div>
				</div>
            </div>
			<!-- end row -->
            <div class="card">
                <div class="card-body">
            <h4 class="card-title">Product Images</h4> <br><br>
                <table id="datatable" class="table table-bordered dt-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products['images'] as $image)

                            <tr>
                                <td>{{ $image['id'] }}</td>
                                <td>
                                    <img src="{{ asset('front/images/product_images/small/'.$image['image']) }}" alt="Product Image" width="80px;">
                                </td>
                                <td>
                                    @if ($image['status'] == 1)
                                        <a class="updateImageStatus" href="javascript:void(0)" id ="image-{{ $image['id'] }}"  image_id="{{ $image['id'] }}">
                                            <i style ="font-size: 20px;" class="bx bx-toggle-right text-info" status="Active"></i>
                                        </a>
                                    @else
                                        <a class="updateImageStatus" href="javascript:void(0)" id ="image-{{ $image['id'] }}" image_id="{{ $image['id'] }}">
                                            <i style="font-size: 20px; color:danger;" class="bx bx-toggle-left text-danger" status="Inactive"></i>
                                        </a>
                                    @endif
                                </td>
                                <td> <a href="javascript:void(0)" module = "image" moduleid="{{ $image['id'] }}" class="text-danger confirmDelete">
                                    <i class="mdi mdi-delete font-size-18"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
		</div>
		<!-- container-fluid -->
	</div>
	<!-- End Page-content -->
@endsection
