@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ $blogpostcategory->title }}</h1>
    </div>

    <section class="single_page">


        <div class="container">
            {{-- <h3 class="single_title"></h3> --}}
            {{-- <h1 class="single_title"><span></span></h1> --}}
            <article class="single_page">
                {{-- <img src="https://placehold.it/200x200"> --}}
                <img src="{{ asset('uploads/blogpostcategory/' . $blogpostcategory->image) }}" alt="Post Image"
                    class="singleImage">

                <div>{!! $blogpostcategory->content !!}

                </div>
            </article>
        </div>
    </section>
@endsection
