    <!-- Header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg container">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <div class="image">
                        <img src="{{ asset('image/header-image.png') }}" alt="" height="50">
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav m-auto navbar-nav-scroll" style="--bs-scroll-height: 500px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Introduction
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('About') }}">About us</a></li>
                                <li><a class="dropdown-item" href="{{ route('Team') }}">Our Teams</a></li>
                                <li><a class="dropdown-item" href="{{ route('Service') }}">Services</a></li>
                                {{-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Study Abroad
                            </a>

                            <ul class="dropdown-menu">
                                @foreach ($countries as $country)
                                    <li><a class="dropdown-item"
                                            href="{{ route('singleCountry', ['slug' => $country->slug]) }}">Study in
                                            {{ $country->name }}</a></li>
                                @endforeach
                            </ul>

                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Universities
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($universities as $university)
                                    <li><a class="dropdown-item"
                                            href="{{ route('singleUniversity', ['slug' => $university->slug]) }}">
                                            {{ $university->title }}</a></li>
                                @endforeach
                            </ul>
                        </li> --}}


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Courses
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($courses as $course)
                                    <li><a class="dropdown-item"
                                            href="{{ route('singleCourse', ['slug' => $course->slug]) }}">
                                            {{ $course->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Test Prepration
                            </a>

                            <ul class="dropdown-menu">
                                @foreach ($testPreparationPosts as $post)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('singlePost', ['slug' => $post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Living Abroad
                            </a>

                            <ul class="dropdown-menu">
                                @foreach ($livingAbroadPosts as $post)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('singlePost', ['slug' => $post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </li>

                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu">
                                
                                    <li><a class="dropdown-item"
                                            href="{{ route('Gallery') }}">
                                            Photo Gallery</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('Video') }}">
                                            Video Gallery</a></li>
                            
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('Testimonial') }}">Testimonials</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('Blogpostcategory') }}">Blogs</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('Contact') }}">Contact</a>
                        </li>

                

                    </ul>
                   
                </div>
            </div>
        </nav>
    </div>
