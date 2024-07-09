@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ trans('messages.AboutUs') }}</h1>
    </div>

    <section class="sample_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 order-1 order-md-1">
                    @if ($about->image)
                        <img class="sample_page_image" src="{{ asset('uploads/about/' . $about->image) }}" alt="About Image">
                    @else
                        <p>No about information available</p>
                    @endif
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 order-2 order-md-3 sample_page_content">
                    {!! app()->getLocale() === 'ne' ? $about->content_ne : $about->content !!}
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 order-3 order-md-2 sample_page_list mt-2 mb-2 p-4">
                    <h3 class="">{{ trans('messages.ExperienceInProviding') }}</h3>
                    <ul>
                        @foreach ($listservices as $service)
                            <li>
                                <a href="{{ route('SingleService', ['slug' => $service->slug]) }}">
                                    <span>
                                        @if (app()->getLocale() == 'ne')
                                            {{ $service->title_ne }}
                                        @else
                                            {{ $service->title }}
                                        @endif
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
