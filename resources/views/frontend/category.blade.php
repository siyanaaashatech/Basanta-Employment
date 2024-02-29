@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ $category->title }}</h1>
    </div>

    <section class="sample_page">
        <div class="container">
            <div class="row">
                <div class="projcard-container">
                    <h1 class="single_title"><span>{{ $category->title }}</span></h1>
                    @foreach ($posts as $post)
                        <div class="projcard projcard-blue">
                            <div class="projcard-innerbox row">

                                @if ($post->image)
                                    <img src="{{ asset($post->image) }}" class="projcard-img" alt="">
                                @else
                                    <img src="{{ asset('image/girl.jpg') }}" class=" projcard-img" alt="">
                                @endif

                                <div class=" col-lg-6 col-sm-12">
                                    <img class="projcard-img" src="{{ asset('uploads/post/' . $post->image) }}" />
                                </div>

                                <div class=" col-lg-6 col-sm-12">
                                    <div class="projcard-textbox">
                                        <div class="projcard-title">{{ $post->title }}</div>
                                        <div class="projcard-bar"></div>
                                        <div class="projcard-description">
                                            {{ Str::limit(strip_tags($post->description), 350) }}
                                        </div>
                                        <a href="{{ route('singlePost', ['slug' => $post->slug]) }}">
                                            <button class="btn bg-primary text-white">Read More &nbsp;&nbsp;<i
                                                    class="fa-solid fa-arrow-right"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 order-2 order-md-2 sample_page_list mt-2 mb-2 p-4">
                    <h2>Related Categories</h2>
                    <ul>
                        @foreach ($relatedCategories as $relatedCategory)
                            <li>
                                <a href="{{ route('singleCategory', ['slug' => $relatedCategory->slug]) }}">
                                    {{ $relatedCategory->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
