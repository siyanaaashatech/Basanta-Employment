{{-- For Footer --}}


<!-- Footer -->
<div class="footer">
    <div class="container py-5">
        <div class="elements row text-white">
            <div class="box col">
                <ul>
                    <h4>Quick Links</h4>
                    @foreach ($counsellingPosts as $post)
                        <li><a href="{{ route('singlePost', ['slug' => $post->slug]) }}">{{ $post->title }}</a></li>
                    @endforeach
                    <li><a
                            href="{{ route('singleCategory', ['slug' => $newsCategory->slug]) }}">{{ $newsCategory->title }}</a>
                    </li>
                </ul>
            </div>
            <div class="box col">
                <ul>
                    <h4>Living Abroad</h4>
                    @foreach ($livingAbroadPosts as $post)
                        <li>
                            <a class="dropdown-item" href="{{ route('singlePost', ['slug' => $post->slug]) }}">
                                {{ $post->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="box col">
                <ul>
                    <h4>Services</h4>
                    @foreach ($services as $service)
                        <li><a href="{{ route('SingleService', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
                        </li>
                    @endforeach


                </ul>
            </div>
            <div class="box col">
                <ul>
                    <h4>Trending Courses</h4>
                    @foreach ($courses as $course)
                        <li><a href="{{ route('singleCourse', ['slug' => $course->slug]) }}">{{ $course->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Foot -->
<div class="boko text-white p-3">
    <div class="container text-center">
        <div class="foot row justify-content-between">
            <div class="box1 col-sm-6 col-md-6">
                <p class="ftext">Trademark Education Consultancy. All rights reserved</p>
            </div>
            <div class="box2 col-md-6 col-sm-12">
                <div class="footlogo row justify-content-center">

                    <div class="fb col"><a href="{{ $sitesetting->facebook_link }}" target="_blank"><i class="fa-brands fa-facebook"></i></a></div>
                    {{-- <div class="tw col"><a href=""><i class="fa-brands fa-twitter"></i></a></div> --}}
                    <div class="li col"><a href="{{ $sitesetting->linkedin_link }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a></div>
                    <div class="in col"><a href="{{ $sitesetting->instagram_link }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></div>
                    {{-- <div class="yo col"><a href=""><i class="fa-brands fa-youtube"></i></a></div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
