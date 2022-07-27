@extends('admin.layout.layout')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
	<div class="container-fluid">
        <div class="col-lg-12">
            <div class="text-sm-end mb-3">
                <a href="{{ url('admin/categories') }}">   <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="bx bx-arrow-back me-1"></i> Back</button>  </a>
            </div>
        </div>
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
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
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">{{ $title }}</h4>
						<p class="card-title-desc">Fill all information below</p>
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
						<form class="form-horizontal"
						@if (empty($category['id'])) action="{{ url('admin/add_edit_categories') }}" @else   action="{{ url('admin/add_edit_categories/' . $category['id']) }}" @endif
						method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label for="category_name" class="form-label">Category Name</label>
									<input type="text" class="form-control" id="category_name"
									name="category_name"
									@if (!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value = "{{ old('category_name') }}" @endif>
								</div>
								<div class="mb-3">
									<label for="category_discount" class="form-label">Category Discount</label>
									<input type="text" class="form-control" id="category_discount"
									name="category_discount"
									@if (!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value = "{{ old('category_discount') }}" @endif>
								</div>
								<div class="mb-3">
									<label for="category_url" class="form-label">Category URL</label>
									<input type="text" class="form-control" id="category_discount"
									name="category_url"
									@if (!empty($category['category_url'])) value="{{ $category['category_url'] }}" @else value = "{{ old('category_url') }}" @endif>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mb-3">
									<label for="section_id" class="form-label">Select Section</label>
									<select name="section_id" id="section_id" class="form-control">
										<option value="">Select </option>
										@foreach ($getSections as $section)
										<option value="{{ $section['id'] }}"
                                        @if (!empty($category['section_id']) && $category['section_id'] == $section['id']) selected =""  @endif>{{ $section['name'] }}
										</option>
										@endforeach
									</select>
								</div>
                                <div id="appendCategoriesLevel">
                                       @include('admin.categories.append_categories_level')
                                </div>

								<div class="mb-3">
									<label for="category_discription">Category Description</label>
									<textarea name="category_discription" class="form-control" id="category_discription" rows="3">
									@if (!empty($category['category_discription'])) {{ $category['category_discription'] }} @else {{ old('category_discription') }} @endif</textarea>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h4 class="card-title mb-3">Category Image</h4>
						<div class="fallback">
							<input name="category_image" type="file" multiple />


						</div>


                            @if (!empty($category['category_image']))

                        <div class="dz-message needsclick text-center">
							<img src="{{ url('front/images/category_images/'.$category['category_image']) }}" alt="categoryImage" width="400px;" height="400px">
						</div>
                        <div class="text-sm-end">
                            <a href="javascript:void(0)" module = "category-image" moduleid="{{ $category['id'] }}"
                            class="text-danger confirmDelete">  <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light"><i class="far fa-trash-alt me-1"></i> Delete Image</button>  </a>

                        </div>


                        @else
						<div class="dz-message needsclick">
							<div class="mb-3">
								<i class="display-4 text-muted bx bxs-cloud-upload"></i>
							</div>
							<h4>Drop files here or click to upload.</h4>
						</div>
                        @endif
					</div>
				</div>
				<!-- end card-->
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Meta Data</h4>
						<p class="card-title-desc">Fill all information below</p>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label for="meta_title" class="form-label"> Meta Title</label>
									<input type="text" class="form-control" id="meta_title" name="meta_title"
									@if (!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value = "{{ old('meta_title') }}" @endif>
								</div>
								<div class="mb-3">
									<label for="meta_keywords">Meta Keywords</label>
									<input id="meta_keywords" name="meta_keywords" type="text"
									class="form-control"
									@if (!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value = "{{ old('meta_keywords') }}" @endif>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mb-3">
									<label for="meta_description">Meta Description</label>
									<textarea class="form-control" id="meta_description" rows="5" name="meta_description">
									@if (!empty($category['meta_description']))
									{{ $category['meta_description'] }}
									@else
									{{ old('meta_description') }}
									@endif
									</textarea>
								</div>
							</div>
						</div>
						<div class="d-flex flex-wrap gap-2">
							<button type="submit" class="btn btn-primary w-md waves-effect waves-light">Save </button>
                            <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
	<!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
