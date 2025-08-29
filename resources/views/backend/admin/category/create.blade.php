@extends('backend.admin.master')

@section('content')

<div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Category', 'subtitle' => 'Add Category'])
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-4">

                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h5 class="mb-4">Add Category</h5>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        
                        <form class="row g-3" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                            @csrf

                             @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>  
                                
                            @endif
                            
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Category Name">
                            </div>

                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" placeholder="Category Slug">
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="photo">
                            </div>

                            <div class="col-md-6">
                                <img src="" id="photoPreview" width="60" height="60" style="margin-top: 15px; display:none;" alt="">
                            </div>
                            
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!--end row-->
        
        
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('customjs/admin/category.js') }}"></script>
@endpush