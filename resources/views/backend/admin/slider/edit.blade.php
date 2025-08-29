@extends('backend.admin.master')

@section('content')

<div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Slider', 'subtitle' => 'Update Slider'])
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body p-4">

                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h5 class="mb-4">Update Slider</h5>
                            <a href="{{ route('admin.slider.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        
                        <form class="row g-3" method="POST" action="{{ route('admin.slider.update', $slider->id) }}" enctype="multipart/form-data">
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
                            
                            <div class="col-md-12">
                                <label for="title" class="form-label">Slider Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Slider Title" value="{{ old('title', $slider->title) }}">
                            </div>

                            <div class="col-md-12">
                                <label for="Short Description" class="form-label">Short Description</label>
                                <textarea name="short_description" class="form-control" id="short_description" placeholder="Short Description">{{ old('short_description', $slider->short_description) }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="video_url" class="form-label">Video Url</label>
                                <input type="text" name="video_url" class="form-control" id="video_url" placeholder="Video Url" value="{{ old('video_url', $slider->video_url) }}">
                            </div>

                            <div class="col-md-12">
                                <iframe frameborder="0" id="videoPreview" style="margin-top: 15px; display:none; width:90%; height:400px" allowfullscreen></iframe>
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label">Background Image</label>
                                <input type="file" name="image" class="form-control" id="photo">
                            </div>

                            <div class="col-md-12">
                                <img src="{{ asset($slider->image) }}" id="photoPreview" width="100%" height="100%" style="margin-top: 15px;" alt="">
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100 mt-4">Update Slider</button>
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
@endpush