{{-- For Footer --}}



<style>
    /* For Footer */
    /* For Footer */

    .footer_serv {
        text-align: right;
    }

    .footer_serv h3 {
        color: white;
    }

    .footer_serv p {
        color: white;

    }

    /* FOr Footer */
    ul {
        margin: 0px;
        padding: 0px;
    }

    .footer-section {
        background-image: linear-gradient(rgb(3, 18, 51), rgb(25, 37, 78));
        /* background-color: var(--first); */
        /* background: url('../img/topnav.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center; */

        position: relative;
        /* box-shadow: rgba(33, 37, 109, 0.15); */


    }

    .footer-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background-image: url('../img/topnav.png'); */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top;
        opacity: 0.3;
        /* Adjust the opacity value as desired */
    }

    .footer-cta {
        border-bottom: 1px solid #373636;
    }

    .single-cta i {
        color: #fff;
        font-size: 30px;
        float: left;
        margin-top: 8px;
    }

    .cta-text {
        padding-left: 15px;
        display: inline-block;

    }

    .cta-text h4 {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 2px;

    }

    .cta-text span {
        color: #b5b4bb;
        font-size: 15px;
    }

    .footer-content {
        position: relative;
        z-index: 2;
    }

    .footer-pattern img {
        position: absolute;
        top: 0;
        left: 0;
        height: 330px;
        background-size: cover;
        background-position: 100% 100%;
    }

    .footer-logo {
        margin-bottom: 30px;
    }

    .footer-logo img {
        max-width: 130px;
    }

    .footer-text p {
        margin-bottom: 14px;
        font-size: 14px;
        color: #7e7e7e;
        line-height: 28px;
    }

    .footer-social-icon span {
        color: #fff;
        display: block;
        font-size: 20px;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 20px;
    }

    .footer-social-icon a {
        color: #fff;
        font-size: 20px;
        margin-right: 15px;
    }

    .footer-social-icon i {
        height: 40px;
        width: 40px;
        text-align: center;
        line-height: 38px;
        border-radius: 50%;

    }

    .facebook-bg {
        background: #3B5998;
    }

    .twitter-bg {
        background: #55ACEE;
    }

    .google-bg {
        background: #DD4B39;
    }

    .footer-widget-heading h3 {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 40px;
        position: relative;
        font-family: 'Mukta', sans-serif;
    }

    .footer-widget-heading h3::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -15px;
        height: 2px;
        width: 50px;
        background: #6a88ac;
    }

    .footer-widget ul li {
        display: inline-block;
        float: left;
        width: 50%;
        margin-bottom: 12px;
    }

    .footer-widget .quicknepal_link li {
        display: inline-block;

        width: 100%;
        margin-bottom: 12px;
    }

    .footer-widget ul li a:hover {
        font-weight: bold;
    }

    .footer-widget ul li a {
        color: #c7bfbf;
        text-transform: capitalize;
        text-decoration: none;
    }



    .copyright-area {
        background-image: linear-gradient(rgb(8, 28, 71), rgb(19, 32, 74));
        padding: 25px 0;
    }

    .copyright-text p {
        margin: 0;
        font-size: 14px;
        color: #878787;
    }

    .copyright-text p a {
        color: #ff5e14;
    }

    .footer-menu li {
        display: inline-block;
        margin-left: 20px;
    }

    .footer-menu li:hover a {
        color: #ff5e14;
    }

    .footer-menu li a {
        font-size: 14px;
        color: #878787;
    }
</style>

{{-- For Footer --}}
<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30 mt-3">
                    <div class="single-cta">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Find us</h4>
                            <span>{{ $sitesetting->office_address }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30 mt-3">
                    <div class="single-cta">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            <span>{{ $sitesetting->office_contact }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30 mt-3">
                    <div class="single-cta">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            <span>{{ $sitesetting->office_email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}"
                                    class="img-fluid" alt="aashatechlogo">
                            </a>
                        </div>
                        <div class="footer-text">
                            <p>
                                {{-- {{ Str::substr($about->description, 0, 300) }}... --}}

                            </p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href="{{ $sitesetting->facebook_link }}" target="_blank"><i class="fa-brands fa-facebook"
                                    aria-hidden="true"></i></a>
                            <a href="{{ $sitesetting->instagram_link }}" target="_blank"><i
                                    class="fa-brands fa-instagram " aria-hidden="true"></i></a>
                            <a href="{{ $sitesetting->linkedin_link }}" target="_blank"><i class="fa-brands fa-linkedin"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 mt-3">
                    <div class="footer-widget">

                        <div class="footer-widget-heading">
                            <h3>{{ __('Quick Links') }}</h3>
                        </div>
                        <ul>
                            {{-- @foreach ($counsellingPosts as $post)
                                <li><a
                                        href="{{ route('singlePost', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                </li>
                            @endforeach
                            <li><a
                                    href="{{ route('singleCategory', ['slug' => $newsCategory->slug]) }}">{{ $newsCategory->title }}</a>
                            </li>
                            @foreach ($livingAbroadPosts as $post)
                                <li><a href="{{ route('singlePost', ['slug' => $post->slug]) }}"
                                        target="_blank">{{ $post->title }}</a></li>
                            @endforeach
                            @foreach ($services as $service)
                                <li><a
                                        href="{{ route('SingleService', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
                                </li>
                            @endforeach --}}


                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50 mt-3">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>{{ __('Important links') }}</h3>
                        </div>
                        <ul class="quicknepal_link">


                            {{-- @foreach ($courses as $course)
                                <li><a
                                        href="{{ route('singleCourse', ['slug' => $course->slug]) }}">{{ $course->title }}</a>
                                </li>
                            @endforeach --}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row text-center">

                <div class="copyright-text">
                    <p>Copyright &copy; 2024, All Right Reserved {{ $sitesetting->office_name }}
                        <br>
                        <span class="text-center">Developed by <a href="https://aashatech.com">Aasha Tech</a></span>
                    </p>
                </div>


            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
