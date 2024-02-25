@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ $course->title }}</h1>
    </div>

    <section class="single_page">
        <div class="container">
            <h1 class="single_title"><span>{{ $course->title }}</span></h1>
            <article class="single_page">
                <img src="{{ asset('uploads/course/' . $course->image) }}" alt="Category Image" class="singleImage">
                <div>{!! $course->description !!}</div>
            </article>
        </div>
    </section>

    {{-- <section class="related-posts">
        <div class="container">
            <h2>Related Posts</h2>
            <ul>
                @foreach ($relatedPosts as $relatedPost)
                    <li>
                        <a href="{{ route('singlePost', ['slug' => $relatedPost->slug]) }}">{{ $relatedPost->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section> --}}
@endsection
