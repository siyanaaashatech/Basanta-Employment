@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('Testimonials') }}</h1>
    </div>

    <div class="container">
        <div class="projcard-container">
            @foreach ($testimonials as $testimonial)
                <?php
                $maxLength = 600; // Set your desired maximum length
                // Get the raw content and strip all tags
                $strippedContent = strip_tags($testimonial->description);
                // Decode HTML entities to handle double encoding
                $decodedContent = htmlspecialchars_decode($strippedContent);
                // Escape HTML entities
                $escapedContent = htmlspecialchars($decodedContent);
                // Take a substring of the escaped content
                $trimmedContent = substr($escapedContent, 0, $maxLength);
                ?>



                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">

                        @if ($testimonial->image)
                            <img src="{{ asset($testimonial->image) }}" class="projcard-img" alt="">
                        @else
                            <img src="{{ asset('image/girl.jpg') }}" class=" projcard-img" alt="">
                        @endif


                        <img class="projcard-img" src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" />
                        <div class="projcard-textbox">
                            <div class="projcard-title">{{ $testimonial->name }}</div>
                            <div class="projcard-title">{{ $testimonial->university->title }}
                                ({{ $testimonial->course->title }})
                            </div>
                            {{-- <div class="projcard-subtitle">This explains the card in more detail</div> --}}
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">{{ $trimmedContent }}...</div>
                            {{-- <div class="projcard-tagbox"> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
