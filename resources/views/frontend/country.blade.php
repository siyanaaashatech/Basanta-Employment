{{-- <h1>Country: {{ $country->name }}</h1> --}}
@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">Study in {{ $country->name }}</h1>
    </div>


    <section class="service_section">
        <div class="container">

            <div class="projcard-container">


                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">
                        {{-- <img class="projcard-img" src="{{ asset('uploads/country/' . $country->image) }}" /> --}}
                        @foreach (json_decode($country->image) as $image)
                            <img class="projcard-img" src="{{ asset('uploads/country/' . $image) }}" />
                        @endforeach
                        <div class="projcard-textbox">
                            <div class="projcard-title">{{ $country->name }}</div>
                            <!-- {{-- <div class="projcard-subtitle">This explains the card in more detail</div> --}} -->
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">{{ $country->content }}</div>


                            <a href="#">
                                <button class="button third m-auto">Read More &nbsp;&nbsp;<i
                                        class="fa-solid fa-arrow-right"></i></button>
                            </a>



                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection
