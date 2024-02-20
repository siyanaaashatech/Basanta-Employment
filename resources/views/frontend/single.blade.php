@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">Study in {{ $country->name }}</h1>
    </div>



    <section class="sample_page">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-7 col-sm-12 order-1 order-md-1 sample_page_image">
                    @if (count(json_decode($country->image)) > 0)
                        @foreach (json_decode($country->image) as $image)
                            <img class="col-lg-8 col-md-7 col-sm-12 order-1 order-md-1 sample_page_image"
                                src="{{ $image }}" alt="Country Image">
                        @endforeach
                    @else
                        <!-- Display an icon if no images are available -->
                        <i class="fa-solid fa-image" style="font-size: 100px;"></i>
                    @endif
                    <div class="sample_page_content">
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
                        {{ $trimmedContent }}
                    </div>
                </div>
                {{-- <div class="col-lg-12 col-md-12 col-sm-12 order-3 order-md-2 sample_page_content">
                    {{ $trimmedContent }}
                </div> --}}

                <div class="col-lg-3 col-md-4 col-sm-6 order-2 order-md-3 sample_page_list">
                    <h3 class="">Recommended Countries</h3>
                    <ul>
                        @foreach ($recommendedCountries as $recommendedCountry)
                            <li>
                                <a href="{{ route('singleCountry', ['slug' => $recommendedCountry->slug]) }}">
                                    Study in {{ $recommendedCountry->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
