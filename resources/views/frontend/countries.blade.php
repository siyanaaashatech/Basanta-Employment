@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('Countries') }}</h1>
    </div>

    <div class="container">
        @foreach ($serviceHead as $serviceHead)
            <?php
            
            // Get the raw content and strip all tags
            $strippedContent = strip_tags($serviceHead->content);
            
            // Decode HTML entities to handle double encoding
            $decodedContent = htmlspecialchars_decode($strippedContent);
            
            // Escape HTML entities
            $escapedContent = htmlspecialchars($decodedContent);
            
            // Take a substring of the escaped content
            $trimmedContent = substr($escapedContent, 0);
            ?>


            <p class="text-center mt-3">{{ $trimmedContent }}</p>
        @endforeach



        <div class="projcard-container">
            @foreach ($services as $service)
                <?php
                $maxLength = 600; // Set your desired maximum length
                
                // Get the raw content and strip all tags
                $strippedContent = strip_tags($service->description);
                
                // Decode HTML entities to handle double encoding
                $decodedContent = htmlspecialchars_decode($strippedContent);
                
                // Escape HTML entities
                $escapedContent = htmlspecialchars($decodedContent);
                
                // Take a substring of the escaped content
                $trimmedContent = substr($escapedContent, 0, $maxLength);
                ?>





                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">

                        @if ($service->image)
                            <img src="{{ asset($service->image) }}" class="projcard-img" alt="">
                        @else
                            <img src="{{ asset('image/girl.jpg') }}" class=" projcard-img" alt="">
                        @endif


                        <img class="projcard-img" src="{{ asset('uploads/service/' . $service->image) }}" />
                        <div class="projcard-textbox">
                            <div class="projcard-title">{{ $service->title }}</div>
                            {{-- <div class="projcard-subtitle">This explains the card in more detail</div> --}}
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">{{ $trimmedContent }}...</div>
                            {{-- <div class="projcard-tagbox"> --}}

                            <a href="{{ route('SingleService', $service->id) }}">
                                <button class="button bg-primary third m-auto">Read More &nbsp;&nbsp;<i
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
