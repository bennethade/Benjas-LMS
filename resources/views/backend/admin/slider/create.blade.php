@extends('backend.admin.master')

@section('content')

<div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title' => 'Slider', 'subtitle' => 'Add Slider'])
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body p-4">

                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h5 class="mb-4">Add Slider</h5>
                            <a href="{{ route('admin.slider.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        
                        <form class="row g-3" method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
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
                            
                            <div class="col-md-12">
                                <label for="title" class="form-label">Slider Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Slider Title" value="{{ old('title') }}">
                            </div>

                            <div class="col-md-12">
                                <label for="Short Description" class="form-label">Short Description</label>
                                <textarea name="short_description" class="form-control" id="short_description" placeholder="Short Description">{{ old('short_description') }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="video_url" class="form-label">Video Url</label>
                                <input type="text" name="video_url" class="form-control" id="video_url" placeholder="Video Url" value="{{ old('video_url') }}">
                            </div>

                            <div class="col-md-12">
                                <iframe frameborder="0" id="videoPreview" style="margin-top: 15px; display:none; width:90%; height:400px" allowfullscreen></iframe>
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label">Background Image</label>
                                <input type="file" name="image" class="form-control" id="photo">
                            </div>

                            <div class="col-md-12">
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
@endpush