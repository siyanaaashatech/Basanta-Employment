<!-- Header -->
<div class="header">
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <div class="image">
                    @if ($sitesetting->main_logo)
                        <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" alt="Main Logo"
                            height="100">
                    @else
                        <img src="{{ asset('image/header-image.png') }}" alt="" height="100">
                    @endif
                    <div class="c-name">
                        <h3>
                            <span>
                                @if (app()->getLocale() == 'ne')
                                    {{ $sitesetting->office_name_ne }}
                                @else
                                    {{ $sitesetting->office_name }}
                                @endif
                            </span>
                            {{-- {{ $sitesetting->office_name }}</h3> --}}
                    </div>
                    {{-- <div class="slogon">
                        <h6>{{ $sitesetting->slogan }}</h6>
                    </div> --}}
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
                            {{ trans('messages.Introduction') }}

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('About') }}"> {{ trans('messages.AboutUs') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('Team') }}"> {{ trans('messages.OurTeams') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('Service') }}">
                                    {{ trans('messages.Services') }}
                                </a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('Demand') }}">
                                    {{ trans('messages.Demands') }}
                                </a>
                            </li> 
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ trans('messages.WorkAbroad') }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($countries as $country)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('singleCountry', ['slug' => ucfirst($country->slug)]) }}">
                                        @if (app()->getLocale() == 'ne')
                                        {{ $country->name_ne }}
                                    @else
                                        {{ $country->name }}
                                    @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ trans('messages.Employment') }}

                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($workcategories as $workcategory)
                                <li><a class="dropdown-item"
                                        href="{{ route('singleworkCategory', ['slug' => $workcategory->slug]) }}">
                                        @if (app()->getLocale() == 'ne')
                              {{ $workcategory->title_ne }}
                               @else
                             {{ $workcategory->title }}
                        @endif
                                    </a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ trans('messages.Gallery') }}

                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('Gallery') }}">
                                    {{ trans('messages.PhotoGallery') }} </a></li>
                            <li><a class="dropdown-item" href="{{ route('Video') }}">
                                    {{ trans('messages.VideoGallery') }} </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('Testimonial') }}">
                            {{ trans('messages.Reviews') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('Blogpostcategory') }}">
                            {{ trans('messages.Blogs') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('Contact') }}">
                            {{ trans('messages.Contact') }} </a>
                    </li>
                </ul>

                <span class="en_ne">
                    <a class="btn_en {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                        href="{{ url()->current() }}?locale=en">en</a>
                    <a class="btn_en {{ app()->getLocale() === 'ne' ? 'active' : '' }}"
                        href="{{ url()->current() }}?locale=ne">ne</a>
                </span>



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

    // Make the navbar logo and navbar big when the site opens and when scrolled make it small like now and with the logo add Company name and slogan.
    // window.addEventListener('scroll', function() {
    //     var a = window.scrollY;
    //     if (a > 0) {

    //       document.querySelector('.header').classList.add('nav-small');
    //     } else {
    //       document.querySelector('.header').classList.remove('nav-small');

    //     }
    // });


    window.addEventListener('scroll', function() {
    var scrollY = window.scrollY;
    var threshold = 0; // Adjust this value as needed
    var header = document.querySelector('.header');

    if (scrollY > threshold) {
        header.classList.add('nav-small');
        header.classList.add('sticky');
    } else {
        header.classList.remove('nav-small');
        header.classList.remove('sticky');
    }
});
</script>

<style>
</style>
