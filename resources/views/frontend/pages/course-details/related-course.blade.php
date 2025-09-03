
<section class="related-course-area bg-gray pt-60px pb-60px">
    <div class="container">
        <div class="related-course-wrap">
            <h3 class="fs-28 font-weight-semi-bold pb-35px">More Courses by <a href="teacher-detail.html" class="text-color hover-underline">{{ $course->user->first_name }} {{ $course->user->surname }}</a></h3>
            <div class="view-more-carousel-2 owl-action-styled">
                
                @forelse ($moreCourseFromInstructor as $course)
                    <div class="card card-item">
                        <div class="card-image">
                            <a href="course-details.html" class="d-block">
                                <img class="card-img-top" src="{{ asset($course->course_image) }}" width="280" height="240" data-src="{{ asset($course->course_image) }}"  alt="Card image cap">
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge">
                                    @if ($course->bestseller == 'yes')
                                        Bestseller
                                    @elseif ($course->featured == 'yes')
                                        Featured
                                    @else
                                        Highest Rated
                                    @endif
                                </div>
                                <div class="course-badge blue">
                                    -{{ round((($course->selling_price - $course->discount_price) / $course->selling_price) * 100) }} %
                                </div>
                            </div>
                        </div><!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $course->label }}</h6>
                            <h5 class="card-title"><a href="course-details.html">{{ \Illuminate\Support\Str::limit($course->course_name, 50) }}</a></h5>
                            <p class="card-text"><a href="teacher-detail.html">{{ $course->user->first_name }} {{ $course->user->surname }}</a></p>
                            <div class="rating-wrap d-flex align-items-center py-2">
                                <div class="review-stars">
                                    <span class="rating-number">4.4</span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star-o"></span>
                                </div>
                                <span class="rating-total pl-1">(20,230)</span>
                            </div><!-- end rating-wrap -->
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-price text-black font-weight-bold"> N{{ $course->discount_price }} <span class="before-price font-weight-medium" style="margin-left: 5px;"> N{{ $course->selling_price }}</span></p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                @empty
                    
                @endforelse


            </div><!-- end view-more-carousel -->
        </div><!-- end related-course-wrap -->
    </div><!-- end container -->
</section><!-- end related-course-area -->