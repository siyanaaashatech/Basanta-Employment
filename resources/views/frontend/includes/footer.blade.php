


{{-- For Footer --}}
<footer class="footer-section">
    <div class="container pt-5">
        <div class="footer-cta pb-3">
            <div class="row">
                <div class="col-xl-4 col-md-4">
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
                <div class="col-xl-4 col-md-4 ">
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
                <div class="col-xl-4 col-md-4 ">
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
        <div class="footer-content pt-4 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}"
                                    class="img-fluid" alt="aashatechlogo">
                            </a>
                        </div>
                        <div class="footer-text pt-3">
                            <p>
                                 {{ Str::limit(trans('messages.AboutDescription'), 310) }}

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
            <div class="row text-center py-1">

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
