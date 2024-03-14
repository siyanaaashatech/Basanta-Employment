@extends('frontend.layouts.master')
{{-- @dd($favicon); --}}



@section('content')


    <!-- Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="box1 col-lg-5 col-md-6 col-sm-12">
                    <div class="text-white">
                        <h2><b>WANT TO STUDY ABROAD?</b></h2>
                        <h5><b>Institutions We Represent from</b></h5>
                        <h3><b class="text-uppercase">
                                @foreach ($countries as $key => $country)
                                    {{ $country->name }}
                                    @if (!$loop->last)
                                        @if ($loop->remaining == 1)
                                            and
                                        @else
                                            ,
                                        @endif
                                    @endif
                                @endforeach
                            </b></h3>
                        <h3 class="lastword">"Explore Your Dreams"</b></h3>
                    </div>
                </div>



                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            @if (!$countries->isEmpty())
                                @foreach ($countries as $key => $country)
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"
                                        aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $key + 1 }}"></button>
                                @endforeach
                            @endif
                        </div>
                        <div class="carousel-inner">
                            @if (!$countries->isEmpty())
                                @foreach ($countries as $key => $country)
                                <a href="{{ route('singleCountry', ['slug' => $country->slug]) }}">

                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <div class="image">
                                            @if ($country->image)
                                                <img src="{{ asset('uploads/country/' . $country->image) }}"
                                                    class="d-block w-100" alt="{{ $country->name }}">
                                            @else
                                                <img src="{{ asset('image/default.jpg') }}" class="d-block w-100"
                                                    alt="Default Image">
                                            @endif
                                        </div>
                                        <div class="overlay"></div>
                                        <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $country->name }}</h5>
                                            <p>{{ Str::limit(strip_tags($country->content), 200) }}</p>
                                            {{-- <p>{{ $country->content ? Str::limit(strip_tags($country->content), 200) : 'No content available' }}
                                        </p> --}}
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- flotbox -->
    <section class="secondSection">
        <div class="contain container">
            <div class="flexbox row justify-content-center m-0 column-gap-4 gap-4">
                @foreach ($blogs as $blog)
                    <div class="card col-lg-4" style="max-width: 350px;">
                        <div class="row">
                            <div class="col-4">
                                <a href="{{ route('SingleBlogpostcategory', ['slug' => $blog->slug]) }}">
                                    <img src="{{ asset('uploads/blogpostcategory/' . $blog->image) }}"
                                        class="img-fluid rounded-start" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <p class="card-text">{{ Str::limit(strip_tags($blog->content), 90) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Services -->
        <div class="contain container">

            <div class="flexbox row justify-content-center m-0 column-gap-4 gap-4 container">
                <h1 class="text-white heading_title">Our Services</h1>
                @foreach ($services as $service)
                    <div class="col-lg-4 " style="max-width: 325px;">
                        <div class="box text-center">
                            <div class="circle-3 text-white">
                                <b>
                                    <p class="my-2">{{ $loop->iteration }}</p>
                                </b>
                            </div>
                            <div class="circle-1">
                                <div class="circle-2">
                                    <div class="text">

                                        <a href="{{ route('SingleService', ['slug' => $service->slug]) }}"
                                            class="text-decoration-none">
                                            <h2>{{ $service->title }}</h2>
                                        </a>

                                        <h4>{{ Str::limit(strip_tags($service->description), 170) }}</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    <a href="{{ route('Service') }}">
                        <button class="btn bg-primary text-white m-5">View all Services</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider -->
    <div class="container my-5">
        <div class="slider row">
            <div class="word col-lg-5">
                <div class="text">
                    <h2>
                        <p>
                            @if ($sliderPost)
                                <h2>{{ $sliderPost->title }}</h2>
                                <p>{{ Str::limit(strip_tags($sliderPost->description), 600) }}</p>
                            @else
                                <p>No slider post available</p>
                            @endif
                        </p>
                    </h2>
                </div>


                <a href="{{ route('Countries') }}">
                    <button class="btn bg-primary text-white mt-5">SEE ALL COUNTRIES</button>
                </a>



            </div>

            <div class="box2 col-lg-4 col-md-6 col-sm-12">
                <div class="position-relative">
                    @foreach ($countries->take(3) as $country)
                        @if ($country->image)
                            <a href="{{ route('singleCountry', ['slug' => $country->slug]) }}">
                                <div class="image{{ $loop->index + 1 }} position-absolute"
                                    style="height: 300px; width: 150px;">
                                    <img src="{{ asset('uploads/country/' . $country->image) }}" alt="Country Image"
                                        style="width: 100%; object-fit: cover; object-position: center; height: 100%">
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="box3 col-lg-3 col-md-6 col-sm-12">
                <div class="position-relative">
                    @foreach ($countries->slice(3, 2) as $country)
                        @if ($country->image)
                            <a href="{{ route('singleCountry', ['slug' => $country->slug]) }}">
                                <div class="image{{ $loop->index + 4 }} position-absolute"
                                    style="height: 300px; width: 150px;">
                                    <img src="{{ asset('uploads/country/' . $country->image) }}" alt="Country Image"
                                        style="width: 100%; object-fit: cover; object-position: center; height: 100%">
                                </div>
                            </a>
                        @endif
                    @endforeach

                    @if ($countries->count() < 5)
                        @foreach ($countries->slice(5 - $countries->count()) as $country)
                            @if ($country->image)
                                <a href="{{ route('singleCountry', ['slug' => $country->slug]) }}">
                                    <div class="image{{ $loop->index + 5 }} position-absolute"
                                        style="height: 300px; width: 150px;">
                                        <img src="{{ asset('uploads/country/' . $country->image) }}" alt="Country Image"
                                            style="width: 100%; object-fit: cover; object-position: center; height: 100%">
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>




        </div>
    </div>
    <!-- Enroll -->



    <div class="enroll"
        style="background-image: url('{{ asset('image/convo.avif') }}'); background-size: cover; background-position: center;">

        <div class="col-md-5 mx-5">
            <div class="empty">.</div>
            <div class="text mx-5 text-white">
                <p>
                    @if ($enrollPost)
                        <h2>{{ $enrollPost->title }}</h2>
                        <p>{{ Str::limit(strip_tags($enrollPost->description), 600) }}</p>
                        <!-- Add any other content or styling you need -->
                    @endif
                </p>
                {{-- <b> Calling All Artists K-12. Use your creativity to help sustain our world!</b> --}}
                {{-- @foreach ($categories as $category)
                    @if ($category->post)
                        <h2>{{ $category->post->title }}</h2>
                        <p>{{ Str::limit(strip_tags($category->post->description), 600) }}</p>
                        <!-- Add any other content or styling you need -->
                    @endif
                @endforeach --}}
            </div>

            <div class="butt d-flex">
                <div class="text-center my-5 mx-3">
                    <a href="{{ route('Contact') }}" class="btn bg-primary text-white">Contact Now</a>
                </div>

                <div class="text-center my-5 mx-1">
                    @if ($sliderPost)
                        <a href="{{ route('SinglePost', ['slug' => $sliderPost->slug]) }}"
                            class="btn bg-primary text-white">Read More</a>
                    @endif

                </div>

            </div>
        </div>
    </div>
    <!-- Logo -->

    {{-- <div class="text-center my-5">
        <h2>Institue we Represent</h2>
        <h5 class="text-primary">We work with some of the best educational institutions around the globe</h5>
    </div>
    <div class="container">
        <div class="logos row">
            <div class="logo col-lg-3 col-md-3 col-sm-6">
                <div class="image">
                    <img src="image/rmit.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="logo col-lg-3 col-md-3 col-sm-6">
                <div class="image">
                    <img src="image/boxhill.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="logo col-lg-3  col-md-3 col-sm-6">
                <div class="image">
                    <img src="image/victorian.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="logo col-lg-3 col-md-3 col-sm-6">
                <div class="image">
                    <img src="image/western.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="logo col-lg-3  col-md-3 col-sm-6">
                <div class="image">
                    <img src="image/australia.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="logo col-lg-3  col-md-3 col-sm-6">
                <div class="image">
                    <img src="image/icms.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="logo col-lg-3  col-md-3 col-sm-6">
                <div class="image">
                    <img src="image/educo.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="text-center my-4"><button class="btn bg-primary text-white ">View all Universities</button></div>

    </div> --}}


    <!-- Courses -->
    <div class="container">
        <div class="cources my-5">
            <h2 class="text-center">Popular courses for students like you</h2>
            <div class="subjects row">
                @foreach ($courses as $course)
                    <div class="subject1 col-md-4 col-sm-6">
                        <div
                            style="background-image: url('{{ asset('uploads/course/' . $course->image) }}'); background-size: cover; background-position: center; height: 200px;">
                            <div class="text-center">
                                <button class="btn bg-primary text-white">
                                    <a href="{{ route('singleCourse', ['slug' => $course->slug]) }}"
                                        class="text-decoration-none text-white">{{ $course->title }}
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Join -->
    <div class="join">
        <div class="text mt-5">
            <h2 class="text-center">Join students over 1000+ like you</h2>
        </div>
        <div class="students">
            <div id="carouselExampleDark" class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($testimonials as $testimonial)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}" data-bs-interval="10000">
                            <div class="row test_row">
                                <div class="col-lg-6 col-md-6">
                                    @if ($testimonial->image)
                                        <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                            class="d-block w-100 test_image" alt="">
                                    @else
                                        <img src="{{ asset('image/girl.jpg') }}" class=" d-block w-100 test_image"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="carousel-caption">
                                        <div class="text-start text-dark">
                                            <p>{{ $testimonial->description }}</p>
                                            <h2>{{ $testimonial->name }}</h2>
                                            <p>{{ $testimonial->university->title }} ({{ $testimonial->course->title }})
                                            </p>

                                        </div>
                                    </div>

                                </div>

                                <div class="text-center">
                                    <a href="{{ route('Testimonial') }}">
                                        <button class="btn bg-primary text-white m-5"> VIEW ALL</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>



                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>




        </div>
    </div>




@stop
