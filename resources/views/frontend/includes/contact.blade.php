@extends('frontend.layouts.master')


@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <style>
        .form-group {
            padding-bottom: 7px
        }

        .message-box {
            margin-bottom: 7px;
        }
    </style>

    <div class="background">
        <h1 class="page_title">{{ trans('messages.Contact') }}</h1>
    </div>

    <section class="contact_form">
        <div class="container">

            <div class="row mt-3 mb-3">
                {{-- <div class="col-md-6 cform_left">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d113044.53605690929!2d85.26660755724599!3d27.697465314449445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d27.6986812!2d85.34900499999999!4m5!1s0x39eb19c077e257b1%3A0xe92e2047692bea14!2sShree%20Binayak%20Marg%209%2C%20Kathmandu%2044600!3m2!1d27.6975294!2d85.34893389999999!5e0!3m2!1sen!2snp!4v1703018704663!5m2!1sen!2snp"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div> --}}

                
                <div class="col-md-6 cform_left">
                    <iframe src="{{ $googleMapsLink }}" width="100%" height="500" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-md-6 cform_right">
                    <form id="contactForm" class="form-horizontal" method="POST" role="form"
                        action="{{ route('Contact.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter a valid email address" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="phone_no" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" placeholder="Enter your phone number" value="{{ old('phone_no') }}">
                            @error('phone_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3" placeholder="Enter your message">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Add reCAPTCHA field -->
                         <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div> 
                        <input type="submit" value="Submit" id="submitBtn" class="btn">
                    </form>
                </div>
                {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                <!-- reCAPTCHA initialization -->
                <script type="text/javascript">
                    var onloadCallback = function() {
                        grecaptcha.render('html_element', {
                            'sitekey' : '6LdAPAoqAAAAADCgyV-AMkcB0Il2IkaZuAMlgjYx',
                            'callback': verifyCallback,
                            'expired-callback': recaptchaExpired
                        });
                    };

                    function verifyCallback(response) {
                        // If reCAPTCHA is ticked, enable form submission
                        document.getElementById("contactForm").submit();
                    }

                    function recaptchaExpired() {
                        // Handle expired reCAPTCHA here if needed
                    }

                    // Form submission with reCAPTCHA validation
                    document.getElementById("contactForm").addEventListener("submit", function(event) {
                        var response = grecaptcha.getResponse();
                        if(response.length == 0) { // reCAPTCHA not verified
                            event.preventDefault(); // Prevent form submission
                            alert("Please tick the reCAPTCHA box before submitting.");
                        }
                    });

                </script>
                 {{-- <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('quick_contact').addEventListener('submit', function(event) {
                            event.preventDefault();

                            // Disable submit button to prevent multiple clicks
                            document.getElementById('submitBtn').disabled = true;

                            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                action: 'submit'
                            }).then(function(token) {
                                document.getElementById('g-recaptcha-response').value = token;
                                var formData = new FormData(document.getElementById('quick_contact'));

                                fetch('{{ route('Contact.store') }}', {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-Requested-With': 'XMLHttpRequest',
                                            'Accept': 'application/json',
                                        },
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            console.log('Form submitted successfully!');
                                            document.getElementById('successMessage').innerText =
                                                'Form submitted successfully!';
                                        } else {
                                            console.error(data.error);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    })
                                    .finally(() => {
                                        // Reset the form
                                        document.getElementById('quick_contact').reset();

                                        // Reset reCAPTCHA
                                        grecaptcha.reset();

                                        // Enable submit button
                                        document.getElementById('submitBtn').disabled = false;
                                    });
                            });
                        });
                    });
                </script>  --}}

            </div>
    </section>
@endsection
