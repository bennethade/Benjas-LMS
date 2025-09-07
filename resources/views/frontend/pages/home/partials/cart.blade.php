<ul>
    <li>
        <p class="shop-cart-btn d-flex align-items-center">
            {{-- <i class="la la-shopping-cart"></i> --}}

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
            </svg>
            <span class="product-count">{{ count($cart) }}</span>
        </p>

        @if($cart->count() > 0)
        <ul class="cart-dropdown-menu">
            @foreach($cart as $item)
                <li class="media media-card">
                    <a href="{{ route('course-details', $item->course->course_name_slug) }}" class="media-img">
                        <img src="{{ asset($item->course->course_image) }}" alt="{{ $item->course->course_title }}">
                    </a>
                    <div class="media-body">
                        <h5>
                            <a href="{{ route('course-details', $item->course->course_name_slug) }}">{{ $item->course->course_title }}</a>
                        </h5>
                        <span class="d-block lh-18 py-1">{{ $item->course->user->first_name }} {{ $item->course->user->surname }}</span>
                        <p class="text-black font-weight-semi-bold lh-18">
                            N{{ number_format($item->course->discount_price, 2) }}
                            @if($item->course->selling_price > $item->course->discount_price)
                                <span class="before-price fs-14">N{{ number_format($item->course->selling_price, 2) }}</span>
                            @endif
                        </p>
                    </div>
                </li>
            @endforeach

            <li class="media media-card">
                <div class="media-body fs-16">
                    <p class="text-black font-weight-semi-bold lh-18">Total: <span class="cart-total">N{{$subTotal}}</span></p>
                </div>
            </li>


            <li>
                <a href="{{ route('checkout.index') }}" class="btn theme-btn w-100">Go to checkout <i class="la la-arrow-right icon ml-1"></i></a>
            </li>
        </ul>
        @endif
    </li>
</ul>

