@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('About Us') }}</h1>
    </div>
    </section>
    <section class="about_page">
        <div class="container">
            {{-- <h1 class="single_title"><span>{{ $about->title }}</span></h1> --}}
            <div class="row gap-5 mt-5">
                <div class="col-md-5 col-lg-5 col-sm-12">
                    <div class="image">
                    @if ($about->image)
                        <img class="about_page_img img-fluid shadow-lg p-3 mb-5 bg-body-tertiary rounded" src="{{ asset('uploads/about/' . $about->image) }}"
                            alt="About Us">
                    @else
                        <p>No about information available</p>
                    @endif
                    </div>
                   
                </div>

                <div class="col-md-7 col-lg-6 col-sm-12 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <!-- About Us Content -->
                    <div style="text-align: justify;">
                        {!! $about->content !!}
                    </div>
                </div>
            </div>
    </section>


    {{-- Include any related file --}}
    {{-- @include('frontend/includes/teams'); --}}
    {{-- @include('frontend/includes/contact'); --}}
@endsection
