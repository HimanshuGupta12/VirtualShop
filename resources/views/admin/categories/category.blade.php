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
                                    <li class="breadcrumb-item active">Category</li>
                                </ol>
                            </div>


                        </div>
                        @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session::get('success_message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">All Categories </h4>
                                <div class="col-lg-12">
                                    <div class="text-sm-end">
                                        <a href="{{ url('admin/add_edit_categories') }}">   <button type="button" class="btn btn-success btn-rounded waves-effect waves-light"><i class="mdi mdi-plus me-1"></i> Add New Category</button>  </a>
                                        <a href="{{ url('admin/deleted_categories') }}">   <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light"><i class="far fa-trash-alt me-1"></i> Deleted Categories</button>  </a>
                                    </div>
                                </div>


                                <p class="card-title-desc"></p>

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Parent Category</th>
                                            <th>Section</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        @if (isset($category['parentcategory']['category_name'])&&!empty($category['parentcategory']['category_name']))
                                           @php
                                               $parent_category = $category['parentcategory']['category_name'];
                                           @endphp

                                        @else
                                      @php   $parent_category = "Root"; @endphp
                                        @endif
                                            <tr>
                                                <td>{{ $category['id'] }}</td>
                                                <td>{{ $category['category_name'] }}</td>
                                                <td>{{ $parent_category }}</td>
                                                <td>{{ $category['section']['name'] }}</td>

                                                <td>{{ $category['category_url'] }}</td>

                                                <td>
                                                    @if ($category['status'] == 1)
                                                        <a class="updateCategoryStatus" href="javascript:void(0)" id
                                                            ="category-{{ $category['id'] }}"
                                                            category_id="{{ $category['id'] }}">
                                                            <i style ="font-size: 20px;"
                                                                class="bx bx-toggle-right text-info" status="Active"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateCategoryStatus" href="javascript:void(0)" id
                                                            ="category-{{ $category['id'] }}"
                                                            category_id="{{ $category['id'] }}">
                                                            <i style="font-size: 20px; color:danger;"
                                                                class="bx bx-toggle-left text-danger" status="Inactive"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ url('admin/add_edit_categories/' . $category['id']) }}"
                                                            class="text-success"><i
                                                                class="mdi mdi-pencil font-size-18"></i></a>
                                                        {{-- <a title="category" href="{{ url('admin/delete-category/' . $category['id']) }}"
                                                            class="text-danger confirmDelete"><i
                                                                class="mdi mdi-delete font-size-18"></i></a> --}}

                                                                <a href="javascript:void(0)" module = "category" moduleid="{{ $category['id'] }}"
                                                                class="text-danger confirmDelete"><i
                                                                    class="mdi mdi-delete font-size-18"></i></a>
                                                    </div>
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
