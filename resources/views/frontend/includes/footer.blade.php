{{-- For Footer --}}



<style>
    /* For Footer */

    :root {
        --darkerblue: #001B3A;
        --blue: #133972;
        --darkblue: #142149;
        --orange: #ea550e;
        --white: #fff;
        --gray: #808080;
        --charcoal: #36454F;
        --lightgray: #D3D3D3;
        --black: #333;
        --red: #f00c0c;
        --bluegray: #7393B3;

    }

    ul {
        margin: 0px;
        padding: 0px;
    }

    .footer-section {
        background: var(--darkerblue);
        position: relative;
    }

    .footer-cta {
        border-bottom: 1px solid #373636;
    }

    .single-cta i {
        color: #ff5e14;
        font-size: 30px;
        float: left;
        margin-top: 20px;
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
        color: #757575;
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
        max-width: 200px;
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
        font-size: 16px;
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

    .instagram-bg {
        background: var(--orange);
    }

    .youtube-bg {
        background: var(--red);
    }

    .footer-widget-heading h3 {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 40px;
        position: relative;
    }

    .footer-widget-heading h3::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -15px;
        height: 2px;
        width: 50px;
        background: #ff5e14;
    }

    .footer-widget ul li {
        display: inline-block;
        float: left;
        width: 50%;
        margin-bottom: 12px;
    }

    .footer-widget ul li a:hover {
        color: #ff5e14;
    }

    .footer-widget ul li a {
        color: #878787;
        text-transform: capitalize;
    }

    .footer-widget iframe {
        height: 350px;
        width: 100%;
    }

    .subscribe-form {
        position: relative;
        overflow: hidden;
    }

    .subscribe-form input {
        width: 100%;
        padding: 14px 28px;
        background: var(--bluegray);
        border: 1px solid #2E2E2E;
        color: #fff;
        border-radius: 5px;
    }

    .subscribe-form button {
        position: absolute;
        right: 0;
        background: #ff5e14;
        padding: 14px 20px;
        border: 1px solid #ff5e14;
        top: 0;
        border-radius: 0 5px 5px 0;
    }

    .subscribe-form button i {
        color: #fff;
        font-size: 22px;
        transform: rotate(-6deg);
    }

    .copyright-area {
        background: var(--darkblue);
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
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Find us</h4>
                            {{-- <span>{{ $sitesetting->office_address }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            {{-- <span>{{ $sitesetting->office_contact }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            {{-- <span>{{ $sitesetting->office_mail }}</span> --}}
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
                            {{-- <a href="{{ route('index') }}">
                                <img src="{{ asset('uploads/sitesetting/' . $sitesetting->side_logo) }}"
                                    class="img-fluid" alt="aashatechlogo">
                            </a> --}}
                        </div>
                        <div class="footer-text">
                            <p>
                                {{-- {{ Str::substr($about->description, 0, 300) }}... --}}

                            </p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            {{-- <a href="{{ $sitesetting->face_link }}" target="_blank"><i
                                    class="fa fa-facebook facebook-bg" aria-hidden="true"></i></a>
                            <a href="{{ $sitesetting->insta_link }}" target="_blank"><i
                                    class="fa fa-instagram instagram-bg" aria-hidden="true"></i></a>
                            <a href="{{ $sitesetting->social_link }}" target="_blank"><i
                                    class="fa fa-youtube-play youtube-bg" aria-hidden="true"></i></a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">

                        {{-- <iframe src="{{ $sitesetting->f_page }}" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Subscribe</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                        </div>
                        <div class="subscribe-form">
                            {{-- <form action="{{ route('Subscriber.store') }}" method="POST" name="form"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" placeholder="Email Address" name="email">
                                <button>
                                    <input type="submit" hidden>
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                            </form> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2018, All Right Reserved <a href="https://aashatech.com">Aasha Tech</a></p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                            {{-- <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('Service') }}">Services</a></li>
                            <li><a href="{{ route('Allprojects') }}">Projects</a></li> --}}
                            <li><a href="#">Blogs</a></li>
                            {{-- <li><a href="{{ url('contactpage') }}">Contact</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}">
