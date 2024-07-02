@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title"> {{ trans('messages.Blogs') }} </h1>
    </div>

    <section class="multi_post">
        <div class="container">
            <div class="multi_poster row justify-content-center row-gap-5 gap-5">
                @foreach ($blogpostcategories as $blogpostcategory)
                    <div class="card col-lg-3">
                        <a href="{{ route('SingleBlogpostcategory', ['slug' => $blogpostcategory->slug]) }}">
                            <div class="multi_post_image">
                                @if ($blogpostcategory->image)
                                    <img src="{{ asset('uploads/blogpostcategory/' . $blogpostcategory->image) }}"
                                        class="card-img-top" alt="Services Image">
                                @else
                                    <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8"
                                        class="card-img-top" alt="Services Image">
                                @endif
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ app()->getLocale() === 'ne' ? $blogpostcategory->title_ne : $blogpostcategory->title }}
                                </h5>

                                <p class="card-text pb-4">
                                    {{ app()->getLocale() === 'ne' ? Str::limit(strip_tags($blogpostcategory->content_ne), 250) : Str::limit(strip_tags($blogpostcategory->content), 250) }}
                                </p>
                                <a href="{{ route('SingleBlogpostcategory', ['slug' => $blogpostcategory->slug]) }}">
                                    <button class="btn text-white">{{ trans('messages.ReadMore') }} &nbsp;&nbsp;<i
                                            class="fa-solid fa-arrow-right"></i></button>
                                </a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
