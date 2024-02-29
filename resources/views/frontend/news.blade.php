<!-- news.blade.php -->
@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ __('News') }}</h1>
    </div>

    <div class="container">
        <div class="projcard-container">
            @foreach ($newsPosts as $post)
                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox row">
                        <!-- Display news post content here -->
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination links if needed -->
        {{ $newsPosts->links() }}
    </div>
@endsection
