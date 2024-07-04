@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ trans('messages.Testimonials') }}</h1>
    </div>

    <section class="testimonial_page">
        <div class="container">
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-6 row test_row">
                        <div class="col-lg-4">
                            @if ($testimonial->image)
                                <img src="{{ asset('uploads/testimonial/' .$testimonial->image) }}" class="test_image" alt="">
                            @else
                                <img src="{{ asset('image/girl.jpg') }}" class="test_image" alt="">
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <p> @if (app()->getLocale() == 'ne')
                                {{ $testimonial->description_ne }}
                            @else
                                {{ $testimonial->description }}
                            @endif</p>
                            <h3> @if (app()->getLocale() == 'ne')
                                {{ $testimonial->name_ne }}
                            @else
                                {{ $testimonial->name }}
                            @endif</h3>
                            <h5> @if (app()->getLocale() == 'ne')
                                {{ $testimonial->company->title_ne }}
                            @else
                                {{ $testimonial->company->title }}
                            @endif</h5>
                            <h6>
                                @if (app()->getLocale() == 'ne')
                                    {{ $testimonial->work_category->title_ne }}
                                @else
                                    {{ $testimonial->work_category->title }}
                                @endif
                            </h6>
                            <hr>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
