@extends('backend.instructor.master')

@section('content')

<div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Course', 'subtitle' => 'Edit Course'])
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">

                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h5 class="mb-4">Update Course</h5>
                            <a href="{{ route('instructor.course.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        
                        <form class="row g-3" method="POST" action="{{ route('instructor.course.update', $course->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
    
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
                                <input type="text" class="form-control" name="course_name" id="name" placeholder="Enter the course name" value="{{ old('course_name', $course->course_name) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="course_name_slug" id="slug" placeholder="Enter the slug" value="{{ old('course_name_slug', $course->course_name_slug) }}" required>
                            </div>

                            <div class="col-md-12">
                                <label for="course_title" class="form-label">Course Title</label>
                                <input type="text" class="form-control" name="course_title" id="course_title" placeholder="Enter the course title" value="{{ old('course_title', $course->course_title) }}" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="category" class="form-label">Choose Category</label>
                                <select name="category_id" class="form-select"  id="category" data-placeholder="Choose a category" required>
                                    <option value="" disabled selected>Choose a category</option>
                                    @foreach ($allCategories as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $course->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label for="category" class="form-label">Choose Subcategory</label>
                                <select name="subcategory_id" class="form-select"  id="subcategory" data-placeholder="Choose a subcategory" required>
                                    <option value="{{ $course->subcategory_id }}" selected>{{ $course->subcategory->name }}</option>
                                    {{-- Ajax data shows here --}}
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="photo" accept="image/*">

                                <div style="margin-top: 10px;">
                                    <img src="{{ asset($course->course_image) }}" id="photoPreview" class="img-fluid" style="margin-top: 15px; {{ $course->course_image ? '' : 'display:none' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="resources" class="form-label">Resources</label>
                                <input type="number" class="form-control" name="resources" id="resources" placeholder="Enter the number of download resources" value="{{ old('resources', $course->resources) }}">
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control editor" name="description" id="description" required>{{ old('description', $course->description) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="video_url" class="form-label">Youtube Video Url</label>
                                <input type="url" name="video_url" class="form-control" id="video_url" placeholder="Enter the youtube video Url" value="{{ old('video_url', $course->video_url) }}" required>

                                <iframe src="" id="videoPreview" style="margin-top: 15px; display:none; width:100%; height:400px" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="col-md-6">
                                <label for="label" class="form-label">Course Label</label>
                                <select name="label" class="form-select" id="label" data-placeholder="Choose one">
                                    {{-- <option value="" selected disabled>Choose one</option> --}}
                                    <option value="beginner" {{ $course->label == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="medium" {{ $course->label == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="advanced" {{ $course->label == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="certificate" class="form-label">Certificate</label>
                                <select name="certificate" class="form-select" id="certificate" data-placeholder="Choose one">
                                    <option value="yes" {{ $course->certificate == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $course->certificate == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="selling_price" class="form-label">Selling_price</label>
                                <input type="number" name="selling_price" id="selling_price" class="form-control" placeholder="Enter selling price" value="{{ old('selling_price', $course->selling_price) }}">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <input type="number" name="discount_price" id="discount_price" class="form-control" placeholder="Enter discount price" value="{{ old('discount_price', $course->discount_price) }}">
                            </div>

                            <div class="col-md-12">
                                <label for="prerequisites" class="form-label">Course Prerequisites</label>
                                <textarea class="form-control editor" name="prerequisites" id="prerequisites" required>{{ old('prerequisites', $course->prerequisites) }}</textarea>
                            </div>

                            <div class="colo-md-12">
                                <label for="course_goal" class="form-label" style="display: flex; align-items:center; justify-content:space-between">
                                    Course Goal
                                    <button type="button" id="addGoalInput" class="btn btn-primary">+</button>
                                </label>

                                <div id="goalContainer">
                                    @foreach ($courseGoals as $data)
                                        <div style="display: flex; align-items:center; gap:10px; margin-bottom:10px;">
                                            <input type="text" class="form-control" name="course_goals[]" placeholder="Enter the course goal" value="{{ $data->goal_name }}">
                                            <button type="button" class="btn btn-danger removeGoalInput">-</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>    
                            
                            <div class="d-flex align-items-center gap-3 mt-3">
                                <div class="form-check form-check-success">
                                    <input type="hidden" name="bestseller" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckSuccess" style="cursor: pointer" value="yes" {{ $course->bestseller == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckSuccess">Best Seller</label>
                                </div>

                                <div class="form-check form-check-danger">
                                    <input type="hidden" name="featured" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDanger" style="cursor: pointer" value="yes" {{ $course->featured == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDanger">Featured</label>
                                </div>

                                <div class="form-check form-check-warning">
                                    <input type="hidden" name="highest_rated" value="no">
                                    <input class="form-check-input" type="checkbox" id="flexCheckWarning" style="cursor: pointer" value="yes" {{ $course->highest_rated == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckWarning">Highest Rated</label>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4 w-100">Update</button>
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
        document.addEventListener('DOMContentLoaded', function(){
            const videoUrlField = document.getElementById('video_url');
            const videoPreview = document.getElementById('videoPreview');

            //Initailize iframe with existing video url from database
            const initalVideoUrl = videoUrlField.value;
            if(initalVideoUrl){
                const videoId = extractYouTubeVideoID(initalVideoUrl);
                if(videoId){
                    videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                    videoPreview.style.display = 'block';
                }
            }

            //Update iframe when input field changes
            videoUrlField.addEventListener('input', function() {
                const videoUrl = this.value;
                if (videoUrl) {
                    const videoId = extractYouTubeVideoID(videoUrl);
                    if (videoId) {
                        videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                        videoPreview.style.display = 'block';
                    } else {
                        alert('Please enter a valid YouTube URL.');
                        videoPreview.src = '';
                        videoPreview.style.display = 'none';
                    }
                }else{
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
        });
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