@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ $service->title }}</h1>
    </div>
    <section class="single_page">
        <div class="container">
            <!-- {{-- <h3 class="single_title"></h3> --}}
        <h1 class="single_title"><span>{{ $service->title }}</span></h1> -->
            <article class="service_card row gap-5">
                <div class="single_page_image  col-lg-8 col-sm-12 shadow-lg bg-body-tertiary rounded order-lg-1 order-sm-1">
                    <!-- {{-- <img src="https://placehold.it/200x200"> --}} -->
                    <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Post Image" class="singleImage">
                </div>
                <div
                    class="service_about col-lg-3 col-sm-12 shadow-lg bg-body-tertiary rounded order-lg-2 order-sm-3 order-xs-3">
                    <h2 class="service_title text-center">Title</h2>
                    <ol type="1">
                        <h4>
                            <li>one</li>
                        </h4>
                        <h4>
                            <li>Two</li>
                        </h4>
                        <h4>
                            <li>Three</li>
                        </h4>
                        <h4>
                            <li>Four</li>
                        </h4>
                        <h4>
                            <li>Five</li>
                        </h4>
                    </ol>
                </div>

                <div class="service_doc col-lg-12 col-sm-12 shadow-lg bg-body-tertiary rounded order-lg-3 order-sm-2">
                    {!! $service->description !!}

                </div>
            </article>
        </div>
    </section>
@endsection
