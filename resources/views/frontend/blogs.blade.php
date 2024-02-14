@extends('frontend.layouts.master')

@section('content')
    <h1>Blog Post</h1>

    @foreach ($blogs as $blog)
        <h3 class="blog-title">{{ $blog->title }}</h3>
        <p class="blog-description">{{ $blog->description }}</p>
        {{-- <img src="{{ $blog->img }}" alt=""> --}}
    @endforeach
@endsection
