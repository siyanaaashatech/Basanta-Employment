@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('Testimonial') }}</h1>
    </div>

    <section class="single_page">


        <div class="container">
            {{-- <h3 class="single_title"></h3> --}}
            <h1 class="single_title"><span>{{ $testimonial->name }}</span></h1>
            <div class="projcard-title">{{ $testimonial->university->title }}
                ({{ $testimonial->course->title }})
            </div>
            <article class="single_page">
                {{-- <img src="https://placehold.it/200x200"> --}}
                @if ($testimonial->image)
                    <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" alt="Post Image" class="singleImage">
                @endif


                <div>{!! $testimonial->description !!}

                </div>
            </article>
        </div>
    </section>
@endsection
