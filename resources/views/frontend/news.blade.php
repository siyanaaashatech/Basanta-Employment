@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>About Us</h1>
        @foreach ($about as $about)
            <p>{{ $about->content }}</p>
        @endforeach
        {{-- <div class="about-content">
            <p>{{ $about->content }}</p>
        </div> --}}
    </div>
@endsection
