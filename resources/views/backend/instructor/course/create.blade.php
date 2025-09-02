@extends('backend.instructor.master')

@section('content')

<div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Course', 'subtitle' => 'Add Course'])
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">

                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h5 class="mb-4">Add Course</h5>
                            <a href="{{ route('instructor.course.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        
                        <form class="row g-3" method="POST" action="{{ route('instructor.course.store') }}" enctype="multipart/form-data">
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

                            <input type="hidden" name="instructor_id" value="{{ auth()->user()->id }}">
                                                        
                            <div class="col-md-6">
                                <label for="name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="course_name" id="name" placeholder="Enter the course name" value="{{ old('course_name') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="course_name_slug" id="slug" placeholder="Enter the slug" value="{{ old('course_name_slug') }}" required>
                            </div>

                            <div class="col-md-12">
                                <label for="course_title" class="form-label">Course Title</label>
                                <input type="text" class="form-control" name="course_title" id="course_title" placeholder="Enter the course title" value="{{ old('course_title') }}" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="category" class="form-label">Choose Category</label>
                                <select name="category_id" class="form-select"  id="category" data-placeholder="Choose a category" required>
                                    <option value="" disabled selected>Choose a category</option>
                                    @foreach ($allCategories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label for="category" class="form-label">Choose Subcategory</label>
                                <select name="subcategory_id" class="form-select"  id="subcategory" data-placeholder="Choose a subcategory" required>
                                    <option value="" disabled selected>Choose a Subcategory</option>
                                    {{-- Ajax data shows here --}}
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="photo" accept="image/*">

                                <div style="margin-top: 10px;">
                                    <img src="" id="photoPreview" class="img-fluid" alt="" style="margin-top: 15px; display:none;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="resources" class="form-label">Resources</label>
                                <input type="number" class="form-control" name="resources" id="resources" placeholder="Enter the number of download resources" value="{{ old('resources') }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control editor" name="description" id="description" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="video_url" class="form-label">Youtube Video Url</label>
                                <input type="url" name="video_url" class="form-control" id="video_url" placeholder="Enter the youtube video Url" value="{{ old('video_url') }}" required>

                                <iframe src="" id="videoPreview" style="margin-top: 15px; display:none; width:100%; height:400px" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="col-md-6">
                                <label for="label" class="form-label">Course Label</label>
                                <select name="label" class="form-select" id="label" data-placeholder="Choose one">
                                    <option value="" selected disabled>Choose one</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="medium">Medium</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="certificate" class="form-label">Certificate</label>
                                <select name="certificate" class="form-select" id="certificate" data-placeholder="Choose one">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="selling_price" class="form-label">Selling_price</label>
                                <input type="number" name="selling_price" id="selling_price" class="form-control" placeholder="Enter selling price" value="{{ old('selling_price') }}">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <input type="number" name="discount_price" id="discount_price" class="form-control" placeholder="Enter discount price" value="{{ old('discount_price') }}">
                            </div>

                            <div class="col-md-12">
                                <label for="prerequisites" class="form-label">Course Prerequisites</label>
                                <textarea class="form-control editor" name="prerequisites" id="prerequisites" required>{{ old('prerequisites') }}</textarea>
                            </div>

                            <div class="colo-md-12">
                                <label for="course_goal" class="form-label">Course Goal</label>
                                <div id="goalContainer">
                                    <div style="display: flex; align-items:center; gap:10px; margin-bottom:10px;">
                                        <input type="text" class="form-control" name="course_goals[]" placeholder="Enter the course goal" id="">
                                        <button type="button" id="addGoalInput" class="btn btn-primary">+</button>
                                    </div>
                                </div>
                            </div>    
                            
                            <div class="d-flex align-items-center gap-3 mt-3">
                                <div class="form-check form-check-success">
                                    <input type="hidden" name="bestseller" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckSuccess" style="cursor: pointer">
                                    <label class="form-check-label" for="flexCheckSuccess">Best Seller</label>
                                </div>

                                <div class="form-check form-check-danger">
                                    <input type="hidden" name="featured" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDanger" style="cursor: pointer">
                                    <label class="form-check-label" for="flexCheckDanger">Featured</label>
                                </div>

                                <div class="form-check form-check-warning">
                                    <input type="hidden" name="highest_rated" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckWarning" style="cursor: pointer">
                                    <label class="form-check-label" for="flexCheckWarning">Highest Rated</label>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4 w-100">Create</button>
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
    <script src="{{ asset('customjs/instructor/course.js') }}"></script>

    <script>
        document.getElementById('video_url').addEventListener('input', function() {
            const videoUrl = this.value;
            const videoPreview = document.getElementById('videoPreview');

            if (videoUrl) {
                // Function to extract YouTube video ID from URL
                const videoId = extractYouTubeVideoID(videoUrl);
                if (videoId) {
                    // Set the iframe src to embed the YouTube video
                    videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                    videoPreview.style.display = 'block';
                } else {
                    alert('Please enter a valid YouTube URL.');
                    videoPreview.src = '';
                    videoPreview.style.display = 'none';
                }
            } else {
                //Hide the iframe if the input is empty
                videoPreview.src = '';
                videoPreview.style.display = 'none';
            }            
        });

        //Function to extract YouTube video ID from URL
        function extractYouTubeVideoID(url) {
            const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
            const match = url.match(regex);
            return match ? match[1] : null;
        }
    </script>


    {{-- Script for checkboxes --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll(".form-check-input").forEach(function(checkbox){
                checkbox.addEventListener("change", function(){
                    let hiddenInput = this.previousElementSibling; //Hidden input
                    hiddenInput.value = this.checked ? "yes" : "no";
                });
            });
        });
    </script>


@endpush