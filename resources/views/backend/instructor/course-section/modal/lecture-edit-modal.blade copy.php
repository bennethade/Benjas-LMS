<div class="modal" id="course-edit-{{ $data->id }}">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Update Lecture</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- Modal body --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('instructor.lecture.update', $lecture->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="course_section_id" value="{{ $data->id }}">

                    <div class="col-md-12">
                        <label for="lecture_title" class="form-label">Lecture Title</label>
                        <input type="text" class="form-control" name="lecture_title" value="{{ $lecture->lecture_title }}" id="lecture-title" placeholder="Enter the lecture title" required>
                    </div>

                    <div class="colo-md-12 mt-3">
                        <label for="video_url" class="form-label">Youtube Video URL</label>
                        {{-- <input type="url" class="form-control video_url" value="{{ old('url', $lecture->url) }}" name="url" placeholder="Enter the youtube video URL" required>

                        <iframe src="" class="videoPreview" style="margin-top: 15px; display:none; width:100%; height:400px;" frameborder="0" allowfullscreen></iframe> --}}

                        <input type="url" class="form-control video_url" value="{{ old('url', $lecture->url) }}" name="url" placeholder="Enter the youtube video URL" required>

                        <iframe src="" class="videoPreview" style="margin-top: 15px; display:none; width:100%; height:400px;" frameborder="0" allowfullscreen></iframe>


                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="content" class="form-label">Content</label>

                        <textarea class="form-control editor" name="content">{{ $lecture->content }}</textarea>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>



@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            let videoInputs = document.querySelectorAll(".video_url");

            videoInputs.forEach(videoInput => {
                let videoPreview = videoInput.closest('.col-md-12').querySelector(".videoPreview");

                function extractYouTubeVideoID(url) {
                    const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
                    const match = url.match(regex);
                    return match ? match[1] : null;
                }

                //video preview update function
                function updateVideoPreview(){
                    let url = videoInput.value;
                    let videoId = extractYouTubeVideoID(url);

                    if(videoId){
                        videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                        videoPreview.style.display = 'block';
                    }else{
                        videoPreview.src = '';
                        videoPreview.style.display = 'none';
                    }
                }

                //Update video preview when video input changes
                videoInput.addEventListener("input", updateVideoPreview);

                //if video url exists then show the video
                if(videoInput.value.trim() !== ""){
                    updateVideoPreview();
                }

                
            });
         
 
        });
    </script>
@endpush