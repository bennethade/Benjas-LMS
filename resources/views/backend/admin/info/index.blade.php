@extends('backend.admin.master')

@section('content')

<div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Info Box', 'subtitle' => 'Manage Info Boxes'])
        <!--end breadcrumb-->

        <div class="row">
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title mt-3" style="margin-left: 15px;">
                        <h5 class="mb-0">INFO BOX-1</h5>
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('admin.info.update', $first_info->id ?? '1') }}">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon" class="form-label">Icon</label>
                                <textarea name="icon"  class="form-control" placeholder="Enter SVG icon link only" rows="5">{{ $first_info->icon ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title"  placeholder="Enter Title" class="form-control" value="{{ $first_info->title ?? '' }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description"  class="form-control" placeholder="Enter Description" rows="3">{{ $first_info->description ?? '' }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Update</button>

                        </form>

                    </div>

                </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-title mt-3" style="margin-left: 15px;">
                        <h5 class="mb-0">INFO BOX-2</h5>
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('admin.info.update', $second_info->id ?? '2') }}">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon" class="form-label">Icon</label>
                                <textarea name="icon"  class="form-control" placeholder="Enter SVG icon link only" rows="5">{{ $second_info->icon ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title"  placeholder="Enter Title" class="form-control" value="{{ $second_info->title ?? '' }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description"  class="form-control" placeholder="Enter Description" rows="3">{{ $second_info->description ?? '' }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Update</button>

                        </form>

                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title mt-3" style="margin-left: 15px;">
                        <h5 class="mb-0">INFO BOX-3</h5>
                    </div>

                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('admin.info.update', $third_info->id ?? '3') }}">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="icon" class="form-label">Icon</label>
                                <textarea name="icon"  class="form-control" placeholder="Enter SVG icon link only" rows="5">{{ $third_info->icon ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title"  placeholder="Enter Title" class="form-control" value="{{ $third_info->title ?? '' }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description"  class="form-control" placeholder="Enter Description" rows="3">{{ $third_info->description ?? '' }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Update</button>

                        </form>

                    </div>

                </div>
            </div>

        </div>
        <!--end row-->
        
        
    </div>

@endsection