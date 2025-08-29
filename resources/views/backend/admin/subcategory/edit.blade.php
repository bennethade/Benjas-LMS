@extends('backend.admin.master')

@section('content')

<div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Subcategory', 'subtitle' => 'Update Subcategory'])
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-4">

                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h5 class="mb-4">Edit Subcategory</h5>
                            <a href="{{ route('admin.subcategory.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        
                        <form class="row g-3" method="POST" action="{{ route('admin.subcategory.update', $subcategory->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
                                <label for="Category_name" class="form-label">Choose Category</label>
                                <select class="form-select" name="category_id" id="">
                                    <option value="" selected disabled>-- Select Category --</option>
                                    @foreach ($allCategory as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">Subcategory Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $subcategory->name }}" placeholder="Subcategory Name">
                            </div>

                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" value="{{ $subcategory->slug }}" placeholder="Subcategory Slug">
                            </div>
                            
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Update</button>
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