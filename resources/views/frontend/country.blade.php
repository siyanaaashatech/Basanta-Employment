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
                        @foreach (json_decode($country->image) as $image)
                            <img class="projcard-img" src="{{ $image }}" alt="Country Image 1">
                        @endforeach
                        <div class="projcard-textbox">
                            <div class="projcard-title">{{ $country->name }}</div>
                            <!-- {{-- <div class="projcard-subtitle">This explains the card in more detail</div> --}} -->
                            <div class="projcard-bar"></div>


                            <?php
                            $maxLength = 300; // Set your desired maximum length
                            
                            // Get the raw content and strip all tags
                            $strippedContent = strip_tags($country->content);
                            
                            // Decode HTML entities to handle double encoding
                            $decodedContent = htmlspecialchars_decode($strippedContent);
                            
                            // Escape HTML entities
                            $escapedContent = htmlspecialchars($decodedContent);
                            
                            // Take a substring of the escaped content
                            $trimmedContent = substr($escapedContent, 0, $maxLength);
                            ?>

                            <div class="projcard-description">{{ $trimmedContent }}</div>


                            <a href="#">
                                <button class="button bg-primary third m-auto">Read More &nbsp;&nbsp;<i
                                        class="fa-solid fa-arrow-right"></i></button>
                            </a>



                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection
