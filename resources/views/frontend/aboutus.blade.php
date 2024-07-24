@extends('frontend.layouts.master')

@section('content')
    <!-- herosection -->
    <section class="aboutherosection">
    <div class="container py-5 ">
      <div class="row align-items-center mx-5">
        <div class="col-md-7 order-md-1 order-2">
          <h3 class="text-center pt-4">What We Give?</h3>
          <p style="text-align: justify; line-height: 1.6;">Embarking on an odyssey through the digital landscape of
            virtual reality, we are beckoned into a realm where pixels dance with possibility and imagination knows no
            bounds. But what is this elusive phenomenon that whispers promises of alternate realities and immersive
            experiences? Virtual reality, a symphony of code and creativity, transports us beyond the confines of the
            tangible world into a universe of endless potential. It's the artful fusion of technology and human
            curiosity, inviting us to explore realms both familiar and new.</p>
        </div>
        <div class="col-md-5 order-md-2 order-1">
          <img src="./image/aboutheroimage.png" alt="" style="max-width: 100%; height: auto;">
        </div>
      </div>
    </div>

    <section class="sample_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 order-1 order-md-1">
                    @if ($about->image)
                        <img class="sample_page_image" src="{{ asset('uploads/about/' . $about->image) }}" alt="About Image">
                    @else
                        <p>No about information available</p>
                    @endif
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 order-2 order-md-3 sample_page_content">
                    {!! app()->getLocale() === 'ne' ? $about->description_ne : $about->description !!}
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 order-3 order-md-2 sample_page_list mt-2 mb-2 p-4">
                    <h3 class="">{{ trans('messages.ExperienceInProviding') }}</h3>
                    <ul>
                        @foreach ($listservices as $service)
                            <li>
                                <a href="{{ route('SingleService', ['slug' => $service->slug]) }}">
                                    <span>
                                        @if (app()->getLocale() == 'ne')
                                            {{ $service->title_ne }}
                                        @else
                                            {{ $service->title }}
                                        @endif
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
