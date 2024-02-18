@extends('frontend.layouts.master')
{{-- @dd($favicon); --}}



@section('content')
    <!-- Banner -->
    <div class="banner">
        <div class="contain row">
            <div class="box1 col-lg-5 col-md-6 col-sm-12">
                <div class="text-white">
                    <h2><b>WANT TO STUDY ABROAD?</b></h2>
                    <h5><b>Institutions We Represent from</b></h5>
                    <h3><b>
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
                    <h3 class="lastword">Next Intake- February2020</b></h3>
                </div>
            </div>
            <div class="box2 col-lg-4 col-md-6 col-sm-12">
                <div class="position-relative">

                    @foreach ($countries as $country)
                    @if ($loop->index < 3) <!-- Loop for the first three countries -->
                        <div class="image{{ $loop->index + 1 }} position-absolute" style="height: 300px; width: 150px;">
                            @php
                                $images = json_decode($country->image);
                                $firstImage = isset($images[0]) ? $images[0] : null;
                            @endphp
            
                            @if ($firstImage)
                                <img src="{{ $firstImage }}" alt="Country Image" style="width: 100%; object-fit:cover; object-position:center; height:100%">
                            @else
                                <img src="{{ asset('image/slide1.jpg') }}" alt="Country Image" style="width: 100%; object-fit:cover; object-position:center; height:100%">
                            @endif
                        </div>
                    @endif
                @endforeach

                </div>
            </div>
            <div class="box3 col-lg-3 col-md-6 col-sm-12">
                <div class="position-relative">
                    {{-- @foreach ($countries as $country)
                        <div class="image{{ $loop->index + 1 }} position-absolute" style="height: 300px; width: 150px;">
                            @foreach (json_decode($country->image) as $image)
                                <img src="{{ $image }}" alt="Country Image 4"
                                    style="width: 100%; object-fit:cover; object-position:center; height:100%">
                            @endforeach
                        </div>
                    @endforeach
                    @foreach ($countries as $country)
                        <div class="image{{ $loop->index + 1 }} position-absolute" style="height: 300px; width: 150px;">
                            @foreach (json_decode($country->image) as $image)
                                <img src="{{ $image }}" alt="Country Image 5"
                                    style="width: 100%; object-fit:cover; object-position:center; height:100%">
                            @endforeach
                        </div>
                    @endforeach --}}



                    

                    @foreach ($countries as $country)
                    @if ($loop->index >= 3 && $loop->index < 5) <!-- Loop for the next two countries -->
                        <div class="image{{ $loop->index + 1 }} position-absolute" style="height: 300px; width: 150px;">
                            @php
                                $images = json_decode($country->image);
                                $firstImage = isset($images[0]) ? $images[0] : null;
                            @endphp
            
                            @if ($firstImage)
                                <img src="{{ asset($firstImage) }}" alt="Country Image" style="width: 100%; object-fit:cover; object-position:center; height:100%">
                            @else
                                <img src="{{ asset('image/slide1.jpg') }}" alt="Country Image" style="width: 100%; object-fit:cover; object-position:center; height:100%">
                            @endif
                        </div>
                    @endif
                @endforeach


                </div>
            </div>
        </div>
    </div>



    <!-- flotbox -->
    <section class="secondSection">
        <div class="contain container">
            <div class="flexbox row justify-content-center m-0 column-gap-4 gap-4">
                @foreach ($blogs as $blog)
                    <div class="card col-lg-4" style="max-width: 325px;">
                        <div class="row">
                            <div class="col-4">
                                <img src="/image/card3.avif" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <p class="card-text">{{ $blog->content }}</p>
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
                                        <h2>{{ $service->title }}</h2>
                                        <h4>{!! nl2br(e($service->description)) !!}</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                <div class="text-center"><button class="btn bg-primary text-white  m-5">View all Services</button></div>
            </div>
    </section>
    <!-- Slider -->
    <div class="container my-5">
        <div class="slider row">
            <div class="word col-md-6">
                <div class="text">
                    <h2>
                        <p>Your Choice- Your Destination</p>
                    </h2>
                    <p class="text-primary"> Most preferred destinations in the world</p>
                    <p>We represent colleges in Australia,UK, USA, Thailand, India, Switzerland & Japan. However
                        sucessfully
                        enrolling a syudent at the college of his/her choice is not as simple as we made out at the vey
                        outset.
                    </p>
                </div>
                <button class="btn bg-primary text-white ">SEE ALL COUNTRIES</button>
            </div>
            <div class="container-fluid col-md-6 col-sm-12">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($countries as $key => $country)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <div class="image">
                                    @foreach (json_decode($country->image) as $image)
                                        <img src="{{ asset($image) }}" class="d-block w-100" alt="">
                                    @endforeach
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $country->name }}</h5>





                                    <?php
                                    $maxLength = 200; // Set your desired maximum length
                                    
                                    // Get the raw content and strip all tags
                                    $strippedContent = strip_tags($country->content);
                                    
                                    // Decode HTML entities to handle double encoding
                                    $decodedContent = htmlspecialchars_decode($strippedContent);
                                    
                                    // Escape HTML entities
                                    $escapedContent = htmlspecialchars($decodedContent);
                                    
                                    // Take a substring of the escaped content
                                    $trimmedContent = substr($escapedContent, 0, $maxLength);
                                    ?>

                                    <p>{{ $trimmedContent }}</p>
                                </div>
                            </div>
                        @endforeach
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
                <div class="back">
                    <img src="{{asset('image/back.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Enroll -->

    <div class="enroll" row
        style="background-image: url('{{ asset('image/convo.avif') }}'); background-size: cover; background-position: center;">
        <div class="col-md-5 mx-5">
            <div class="empty">.</div>
            <div class="text mx-5 text-white">
                <h2>A leading university for international students</h2>
                <b> Calling All Artists K-12. Use your creativity to help sustain our world!</b>
                <h5>We are committed to helping international students make the most of their time in Australia by
                    providing quality education, guidance and support.</h5>
            </div>

            <div class="butt d-flex">
                <div class="text-center my-5 mx-3"><button class="btn bg-primary text-white ">Enroll Now</button>
                </div>
                <div class="text-center my-5 mx-1"><button class="btn bg-primary text-white ">Learn More</button>
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
                                <button class="btn bg-primary text-white">{{ $course->title }}</button>
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
                        <div class="carousel-item row {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                            <div class="col-lg-6 col-md-6">
                                <div class="image">

                                    @if ($testimonial->image)
                                        
                                            <img src="{{ asset($testimonial->image) }}" class="d-block w-100" alt="">

                                    @else
                                    <img src="{{ asset('image/girl.jpg') }}" class="d-block w-100" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6"></div>
                            <div class="carousel-caption">
                                <div class="text-start text-dark">
                                    {{ $testimonial->description }}
                                </div>
                                <div class="text-start text-dark">
                                    <h2>{{ $testimonial->name }}</h2>
                                    <p>{{ $testimonial->university->title }} ({{ $testimonial->course->title }})</p>
                                    <button class="bg-primary text-white text-center"> VIEW ALL -</button>
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
