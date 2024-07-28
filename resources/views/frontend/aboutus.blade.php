

@extends('frontend.layouts.master')

@section('content')
  


<!-- herosection -->
    <section class="aboutherosection">
    <div class="container py-5 ">
      <div class="row align-items-center mx-5">
        <div class="col-md-7 order-md-1 order-2">
          <h3 class="text-center pt-4">What We Give?</h3>
          <p style="text-align: justify; line-height: 1.6;">{!! app()->getLocale() === 'ne' ? $about->content_ne : $about->content !!}</p>
        </div>
        <div class="col-md-5 order-md-2 order-1">
          <img src="{{ asset('uploads/about/' . $about->image) }}" alt="" style="max-width: 100%; height: auto;">
        </div>
      </div>
    </div>
  </section>

  


<!-- description  -->

    <section class="container py-4">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160">
      <path fill="#9f9a9a55" fill-opacity="1"
        d="M0,128L120,117.3C240,107,480,85,720,90.7C960,96,1200,128,1320,144L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
      </path>
    </svg>
    <div class="companydes-section">
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-6 order-md-2 order-1">
                <h3 class="featurette-heading fw-normal lh-5 py-1 text-center">
                    Company Description
                </h3>
                <p class="lead text-justify">
                    {{ app()->getLocale() === 'ne' ? $about->description_ne : $about->description }}
                </p>
            </div>
            <div class="col-md-4 col-xs-12 order-md-1 order-2">
                <img src="{{ asset('uploads/about/' . $about->description_image) }}" alt="About Image" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>

    <div class="row featurette d-flex justify-content-center align-items-center text-justify whyuscustomcard py-4 mt-4">
        <div class="col-md-6 order-md-1 order-1">
            <h3 class="featurette-heading fw-normal lh-5 py-1">
                Company Scope
            </h3>
            <p cla ss="lead d-flex text-justify">
                {!! app()->getLocale() === 'ne' ? $about->scope_ne : $about->scope !!}
            </p>
        </div>
        <div class="col-md-4 col-xs-12 order-md-2 order-2">
            <img src="{{ $siteSetting->google_maps_link }}" alt="Map Maker" class="img-fluid" />
        </div>
    </div>
@endsection
