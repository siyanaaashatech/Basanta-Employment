{{-- For Footer --}}



<style>
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

ul {
    margin: 0px;
    padding: 0px;
}

.footer-section {
    background: rgba(99, 2, 2, 0.8);
    position: relative;
    box-shadow: rgba(33, 37, 109, 0.15);
    padding: 5px 0; /* Further adjusted padding to decrease footer size */
}

.footer-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top;
    opacity: 0.3;
}

.footer-cta {
    border-bottom: 1px solid #373636;
    padding: 5px 0; /* Further adjusted padding to decrease footer size */
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
    padding: 10px 0; /* Further adjusted padding to decrease footer size */
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
    margin-bottom: 5px; /* Further adjusted margin to decrease footer size */
}

.footer-logo img {
    max-width: 130px;
}

.footer-text p {
    margin-bottom: 5px; /* Further adjusted margin to decrease footer size */
    font-size: 14px;
    color: #7e7e7e;
    line-height: 28px;
}

.footer-social-icon i {
    height: 40px;
    width: 40px;
    text-align: center;
    line-height: 38px;
    border-radius: 50%;
}

.footer-social-icon .social-buttons .social-button__inner {
    margin-left: 5px;
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
    margin-bottom: 8px; /* Further adjusted margin to decrease footer size */
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
    background: rgba(99, 2, 2, 0.8);
    padding: 5px 0; /* Further adjusted padding to decrease footer size */
    margin-top: 0px; /* Adjusted margin to fix gap */
    margin-bottom: 0px;
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
                            <h4>{{ trans('messages.FindUs') }}</h4>
                            <span>@if (!empty($sitesetting->office_address))
                                @php
                                    $officeAddresses = json_decode($sitesetting->office_address, true);
                                @endphp
                                @if (is_array($officeAddresses))
                                    @foreach ($officeAddresses as $address)
                                        {{ $address }} <br>
                                    @endforeach
                                @else
                                @if (app()->getLocale() == 'ne')
                                {{ $sitesetting->office_address_ne }}
                            @else
                                {{ $sitesetting->office_address }}
                            @endif  <br>
                                @endif
                            @endif</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30 mt-3">
                    <div class="single-cta">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>{{ trans('messages.CallUs') }}</h4>
                            <span>
                                @if (!empty($sitesetting->office_contact))
                                @php
                                    $officeContacts = json_decode($sitesetting->office_contact, true);
                                @endphp
                                @if (is_array($officeContacts))
                                    @foreach ($officeContacts as $contact)
                                        {{ $contact }} <br>
                                    @endforeach
                                @else
                                <span>
                                    @if (app()->getLocale() == 'ne')
                                        {{ $sitesetting->office_contact_ne }}
                                    @else
                                        {{ $sitesetting->office_contact }}
                                    @endif
                                </span> <br>
                                @endif
                            @endif
                                </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30 mt-3">
                    <div class="single-cta">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <div class="cta-text">
                            <h4>{{ trans('messages.MailUs') }}</h4>
                            <span>  
                                @if (!empty($sitesetting->office_email))
                                @php
                                    $officeEmails = json_decode($sitesetting->office_email, true);
                                @endphp
                                @if (is_array($officeEmails))
                                    @foreach ($officeEmails as $email)
                                        {{ $email }} <br>
                                    @endforeach
                                @else
                                    {{ $sitesetting->office_email }} <br>
                                @endif
                            @endif</span>
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
                                {{-- {{ Str::limit(trans('messages.AboutDescription'), 300) }} --}}

                            </p>
                        </div>

                        <div class="footer-social-icon">
                            <h4 class="text-light pt-4 pb-2">{{ trans('messages.FollowUs') }}</h4>
                            <div class="social-buttons">
                            <a href="{{ $sitesetting->facebook_link }}"
                        class="social-buttons__button social-button social-button--facebook" aria-label="Facebook">
                        <span class="social-button__inner">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                    </a>
                    <a href="{{ $sitesetting->linkedin_link }}"
                        class="social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn">
                        <span class="social-button__inner">
                            <i class="fab fa-linkedin-in"></i>
                        </span>
                    </a>
                    <a href="{{ $sitesetting->instagram_link }}" target="_blank"
                        class="social-buttons__button social-button social-button--instagram" aria-label="InstaGram">
                        <span class="social-button__inner">
                            <i class="fab fa-instagram"></i>
                        </span>
                    </a>
                    <a href="{{ $sitesetting->snapchat_link }}" target="_blank"
                        class="social-buttons__button social-button social-button--snapchat" aria-label="Snapchat">
                        <span class="social-button__inner">
                        <i class="fa-brands fa-snapchat"></i>
                        </span>
                    </a>
                    </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 mt-3">
                    <div class="footer-widget">

                        <div class="footer-widget-heading">
                            <h3>{{ trans('messages.ExperienceInProviding') }}</h3>
                        </div>
                        <ul>
                        
                            @foreach ($services as $service)
                                <li><a
                                        href="{{ route('SingleService', ['slug' => $service->slug]) }}"><span>
                                            @if (app()->getLocale() == 'ne')
                                                {{ $service->title_ne }}
                                            @else
                                                {{ $service->title }}
                                            @endif
                                        </span></a>
                                </li>
                            @endforeach 


                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50 mt-3">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>{{ trans('messages.ImportantLinks') }}</h3>
                        </div>
                        <ul class="quicknepal_link">


                            @foreach ($categories as $category)
                                <li><a
                                        href="{{ route('singleCategory', ['slug' => $category->slug]) }}">{{ trans('messages.' .($category->title)) }}</a>
                                </li>
                            @endforeach

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
