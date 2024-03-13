@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('Student Review') }}</h1>
    </div>


    <section class="testimonial_page">
        <div class="container">
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-6 row test_row">

                        <div class="col-lg-4">
                            @if ($testimonial->image)
                                <img src="{{ asset($testimonial->image) }}" class="test_image" alt="">
                            @else
                                <img src="{{ asset('image/girl.jpg') }}" class="test_image" alt="">
                            @endif

                        </div>
                        <div class="col-lg-8">
                            <p>"{{ $testimonial->description }}"</p>
                            <h3>{{ $testimonial->name }}</h3>
                            <h5>{{ $testimonial->university->title }}</h5>
                            <h6>({{ $testimonial->course->title }})</h6>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
