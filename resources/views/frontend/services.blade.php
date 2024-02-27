@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('Our Services') }}</h1>
    </div>

    <div class="container">



        <div class="projcard-container">
            @foreach ($services as $service)
             



                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox row">

                        @if ($service->image)
                            <img src="{{ asset($service->image) }}" class="projcard-img" alt="">
                        @else
                            <img src="{{ asset('image/girl.jpg') }}" class=" projcard-img" alt="">
                        @endif


                        <img class="projcard-img col-lg-6 col-sm-12" src="{{ asset('uploads/service/' . $service->image) }}" />
                        <div class="projcard-textbox col-lg-6 col-sm-12">
                            <div class="projcard-title">{{ $service->title }}</div>
                            {{-- <div class="projcard-subtitle">This explains the card in more detail</div> --}}
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">
                                {{ Str::limit(strip_tags($service->description), 350) }}
                            </div>
                            {{-- <div class="projcard-tagbox"> --}}

                            <a href="{{ route('SingleService', ['slug' => $service->slug]) }}">
                                <button class="btn bg-primary text-white">Read More &nbsp;&nbsp;<i
                                        class="fa-solid fa-arrow-right"></i></button>
                            </a>


                            {{-- <span class="projcard-tag">Read More <i class="fa-solid fa-arrow-right"></i></span> --}}

                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
