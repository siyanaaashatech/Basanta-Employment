@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('Blogs') }}</h1>
    </div>

    <div class="container">
        <div class="projcard-container">
            @foreach ($blogpostcategories as $blogpostcategory)
                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">

                        @if ($blogpostcategory->image)
                            <img src="{{ asset($blogpostcategory->image) }}" class="projcard-img" alt="">
                        @else
                            <img src="{{ asset('image/girl.jpg') }}" class=" projcard-img" alt="">
                        @endif

                        <div class=" col-lg-6 col-sm-12">
                            <img class="projcard-img"
                                src="{{ asset('uploads/blogpostcategory/' . $blogpostcategory->image) }}" />
                        </div>

                        <div class="projcard-textbox">
                            <div class="projcard-title">{{ $blogpostcategory->title }}</div>
                            {{-- <div class="projcard-subtitle">This explains the card in more detail</div> --}}
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">
                                {{ Str::limit(strip_tags($blogpostcategory->content), 350) }}
                            </div>
                            {{-- <div class="projcard-tagbox"> --}}

                            <a href="{{ route('SingleBlogpostcategory', ['id' => $blogpostcategory->id]) }}">
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
