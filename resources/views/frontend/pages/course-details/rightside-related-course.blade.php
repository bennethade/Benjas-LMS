<div class="card card-item">
    <div class="card-body">
        <h3 class="card-title fs-18 pb-2">Related Courses</h3>
        <div class="divider"><span></span></div>

        @php
            // $relatedCourse = \App\Models\Course::where('subcategory_id', $course->subcategory_id)->where('id', '!=', $course->id)->take(3)->get();
        @endphp

        @foreach ($relatedCourse as $course)
            <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                <a href="course-details.html" class="media-img">
                    <img class="mr-3 lazy" src="{{ asset($course->course_image) }}" data-src="{{ asset($course->course_image) }}" alt="Related course image">
                </a>
                <div class="media-body">
                    <h5 class="fs-15">
                        <a href="course-details.html">
                            {{ \Illuminate\Support\Str::limit($course->course_name, 50) }}
                        </a>
                    </h5>
                    <span class="d-block lh-18 py-1 fs-14">{{ $course->user->first_name }} {{ $course->user->surname }}</span>
                    <p class="text-black font-weight-semi-bold lh-18 fs-15">N{{ $course->discount_price }} <span class="before-price fs-14">N{{ $course->selling_price }}</span></p>
                </div>
            </div><!-- end media -->
        @endforeach

        
        <div class="view-all-course-btn-box">
            <a href="course-grid.html" class="btn theme-btn w-100">View All Courses <i class="la la-arrow-right icon ml-1"></i></a>
        </div>
    </div>
</div><!-- end card -->