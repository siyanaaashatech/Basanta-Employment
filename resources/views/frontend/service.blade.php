@extends('frontend.layouts.master')

@section('content')


<div class="background">
    <h1 class="page_title">{{ __('Our Services') }}</h1>
  </div>

<section class="single_page">
    

  <div class="container">
    {{-- <h3 class="single_title"></h3> --}}
    <h1 class="single_title"><span>{{ $service->title }}</span></h1>
  <article class="single_page">
    {{-- <img src="https://placehold.it/200x200"> --}}
    <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Post Image" class="singleImage">
    
    <div>{!! $service->content !!}

    </div>
  </article>
</div>
</section>


@endsection
