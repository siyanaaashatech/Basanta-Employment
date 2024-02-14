@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __($category->title) }}</h1>
    </div>

    <section class="single_page">
        <div class="container">
            <h1 class="cat_title">{{ __($post->title) }}</h1>
            <img class="single_page_image col-md-12 my-3" src="{{ $post->firstImagePath }}" alt="Post Image">

            <div style="font-size:20px;">




                {{-- {{ $strippedContent }} --}}

                @php
                    $strippedContent = strip_tags($post->content);
                    // $wordChunks = array_chunk(str_word_count($strippedContent, 1), 100);
                    $wordChunks = array_chunk(mb_split('\s+', $strippedContent), 200);
                    $images = json_decode($post->image);
                    $remainingImages = array_slice($images, 1);
                    $imageDisplayed = false;

                @endphp




                @foreach ($wordChunks as $index => $wordChunk)
                    {!! implode(' ', $wordChunk) !!}

                    @if (!$imageDisplayed && $index < count($remainingImages))
                        <div class="post-images my-3">
                            <img class="whole_image" src="{{ asset('uploads/posts/' . $remainingImages[$index]) }}"
                                alt="Post Image">
                        </div>
                        @php $imageDisplayed = true; @endphp
                    @endif
                @endforeach

                @foreach (array_slice($remainingImages, $imageDisplayed ? 1 : 0) as $image)
                    <div class="post-images my-3">
                        <img class="whole_image" src="{{ asset('uploads/posts/' . $image) }}" alt="Post Image">
                    </div>
                @endforeach







            </div>




        </div>
    </section>
@endsection
