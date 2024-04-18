<!-- Header -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <div class="image">
                    @if ($sitesetting->main_logo)
                        <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" alt="Main Logo"
                            height="50">
                    @else
                        <img src="{{ asset('image/header-image.png') }}" alt="" height="50">
                    @endif
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
                           {{trans('messages.Introduction')}} 
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('About') }}"> {{trans('messages.About Us')}} </a></li>
                            <li><a class="dropdown-item" href="{{ route('Team') }}"> {{trans('messages.Our Teams')}} </a></li>
                            <li><a class="dropdown-item" href="{{ route('Service') }}"> {{trans('messages.Services')}} </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                           {{trans('messages.WorkAbroad')}} 
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($countries as $country)
                       <li>
                      <a class="dropdown-item" href="{{ route('singleCountry', ['slug' => $country->slug]) }}">
                     {{ trans('messages.' . $country->slug) }}
                  </a>
               </li>
@endforeach 
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{trans('messages.Employment')}} 
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($workcategories as $workcategory)
                                <li><a class="dropdown-item"
                                        href="{{ route('singleworkCategory', ['slug' => $workcategory->slug]) }}">
                                        {{ $workcategory->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- Remove the "Living Abroad" dropdown section -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{trans('messages.Gallery')}} 
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('Gallery') }}">
                                {{trans('messages.Photo Gallery')}} </a></li>
                            <li><a class="dropdown-item" href="{{ route('Video') }}">
                                {{trans('messages.Video Gallery')}} </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('Testimonial') }}"> {{trans('messages.Reviews')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('Blogpostcategory') }}"> {{trans('messages.Blogs')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('Contact') }}"> {{trans('messages.Contact')}} </a>
                    </li>
                </ul>
                <!-- Language Switcher -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ url()->current()}}?locale=en">English</a></li>
                        <li><a class="dropdown-item" href="{{ url()->current()}}?locale=ne">नेपाली</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
{{-- Highlight the active/current (pressed) button --}}
<script>
    const navLinks = document.querySelectorAll('.nav-link');
    const currentURL = window.location.href.split('#')[0];
    navLinks.forEach(link => {
        if (link.nextElementSibling && link.nextElementSibling.classList.contains('dropdown-menu')) {
            const subLinks = link.nextElementSibling.querySelectorAll('.dropdown-item');
            subLinks.forEach(subLink => {
                if (subLink.href && subLink.href.split('#')[0] === currentURL) {
                    link.classList.add('active');
                    subLink.classList.add('active');
                    return;
                }
            });
        } else {
            if (link.href && link.href.split('#')[0] === currentURL) {
                link.classList.add('active');
            }
        }
        link.addEventListener('click', () => {
            navLinks.forEach(otherLink => otherLink.classList.remove('active'));
            link.classList.add('active');
        });
    });
</script>




