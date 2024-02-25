@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ $category->title }}</h1>
    </div>

    <section class="single_page">
        <div class="container">
            <h1 class="single_title"><span>{{ $category->title }}</span></h1>
        </div>
    </section>

    <section class="recommended-categories">
        <div class="container">
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
    </section>
@endsection
