@extends('frontend.layouts.master')

@section('content')
    <section class="contact_form">
        <div class="container">
            <h1 class="cat_title">
                Contact Us
            </h1>
            <div class="row mt-3">
                {{-- <div class="col-md-6 cform_left">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d113044.53605690929!2d85.26660755724599!3d27.697465314449445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d27.6986812!2d85.34900499999999!4m5!1s0x39eb19c077e257b1%3A0xe92e2047692bea14!2sShree%20Binayak%20Marg%209%2C%20Kathmandu%2044600!3m2!1d27.6975294!2d85.34893389999999!5e0!3m2!1sen!2snp!4v1703018704663!5m2!1sen!2snp"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div> --}}
                <div class="col-md-6 cform_left">
                    <iframe src="{{ $googleMapsLink }}" width="100%" height="450" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-md-6 cform_right">
                    <form action="{{ route('Contact.store') }}" method="POST"
                        class="u-clearfix u-form-spacing-20 u-form-vertical u-inner-form" style="padding: 10px"
                        enctype="multipart/form-data" id="quick_contact">
                        @csrf

                        @if (Session::has('successMessage'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <!-- Name -->
                        <div class="u-form-group u-form-name u-label-none">
                            <label for="name-3b9a" class="u-label">Name</label>
                            <input type="text" placeholder="Enter your Name" id="name-3b9a" name="name"
                                class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-1"
                                required="">
                        </div>

                        <!-- Email -->
                        <div class="u-form-email u-form-group u-label-none">
                            <label for="email-3b9a" class="u-label">Email</label>
                            <input type="email" placeholder="Enter a valid email address" id="email-3b9a" name="email"
                                class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-2"
                                required="">
                        </div>

                        <!-- Phone -->
                        <div class="u-form-group u-form-phone u-label-none u-form-group-3">
                            <label for="phone-5a50" class="u-label">Phone</label>
                            <input type="tel"
                                pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                placeholder="Enter your phone (e.g. +14155552675)" id="phone-5a50" name="phone_no"
                                class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-3"
                                required="">
                        </div>

                        <!-- Message -->
                        <div class="u-form-group u-form-message u-label-none">
                            <label for="message-3b9a" class="u-label">Message</label>
                            <textarea placeholder="Enter your message" rows="4" cols="50" id="message-3b9a" name="message"
                                class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-4"
                                required=""></textarea>
                        </div>

                        <!-- Add reCAPTCHA field -->
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>




                        <input type="submit" value="Submit" id="submitBtn"
                            class="u-active-custom-color-2 u-border-2 u-border-active-white u-border-custom-color-1 u-border-hover-white u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-hover-custom-color-2 u-radius-50 u-btn-1">
                    </form>
                </div>
                {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <script>
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
                </script>

            </div>
    </section>
@endsection
