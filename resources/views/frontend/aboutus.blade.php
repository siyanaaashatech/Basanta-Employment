@extends('frontend.layouts.master')

@section('content')
    @include('frontend/includes/page_header')

    <section class="about_page">
        <div class="container">

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
                    {!! $about->content !!}
                </div>
            </div>
    </section>


    {{-- Include any related file --}}
    @include('frontend/includes/teams');
    @include('frontend/includes/contact');
@endsection
