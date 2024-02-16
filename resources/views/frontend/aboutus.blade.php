@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('About Us') }}</h1>
    </div>
    </section>
    <section class="about_page">
        <div class="container">
            <h1 class="single_title"><span>{{ $about->title }}</span></h1>
            <div class="row">
                <div class="col-md-5 p-0 col-lg-5 col-sm-12">
                    @if ($about)
                        <img class="about_page_img img-fluid" src="{{ asset('uploads/about/' . $about->image) }}"
                            alt="About Us">
                    @else
                        <p>No about information available</p>
                    @endif
                </div>

                <div class="col-md-7 col-lg-7 col-sm-12">
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
