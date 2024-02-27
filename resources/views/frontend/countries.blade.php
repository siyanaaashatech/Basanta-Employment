@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('Countries') }}</h1>
    </div>

    <div class="container">
        <div class="projcard-container">
            @foreach ($countries as $country)
            

                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">

                        @if ($country->image)
                            <img class="projcard-img" src="{{ asset('uploads/country/' . $country->image) }}"
                                alt="Country Image">
                        @else
                            <img src="{{ asset('image/girl.jpg') }}" class="projcard-img" alt="">
                        @endif


                        <div class="projcard-textbox">
                            <div class="projcard-title">{{ $country->name }}</div>
                            {{-- <div class="projcard-subtitle">This explains the card in more detail</div> --}}
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">
                                {{ Str::limit(strip_tags($country->content), 350) }}
                            </div>
                            {{-- <div class="projcard-tagbox"> --}}

                            <a href="{{ route('singleCountry', ['slug' => $country->slug]) }}">
                                <button class="btn bg-primary text-white">Read More &nbsp;&nbsp;<i
                                        class="fa-solid fa-arrow-right"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
