<section class="u-align-center u-clearfix u-grey-5 u-section-11" id="sec-be4d">
    <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <h1 class="u-text u-text-custom-color-1 u-text-default u-text-1">{{ __('Contact') }}</h1>

        <div class="u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
            <!-- Display success message if set -->
            <div id="successMessage"></div>

            <form action="{{ route('Contact.store') }}" method="POST"
                class="u-clearfix u-form-spacing-20 u-form-vertical u-inner-form" style="padding: 10px"
                enctype="multipart/form-data" id="quick_contact">
                @csrf

                <div class="u-form-group u-form-name u-label-none">
                    <label for="name-3b9a" class="u-label">Name</label>
                    <input type="text" placeholder="Enter your Name" id="name-3b9a" name="name"
                        class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-1"
                        required="">
                </div>

                <div class="u-form-email u-form-group u-label-none">
                    <label for="email-3b9a" class="u-label">Email</label>
                    <input type="email" placeholder="Enter a valid email address" id="email-3b9a" name="email"
                        class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-2"
                        required="">
                </div>

                <div class="u-form-group u-form-phone u-label-none u-form-group-3">
                    <label for="phone-5a50" class="u-label">Phone</label>
                    <input type="tel"
                        pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                        placeholder="Enter your phone (e.g. +14155552675)" id="phone-5a50" name="phone"
                        class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-3"
                        required="">
                </div>

                <div class="u-form-group u-form-message u-label-none">
                    <label for="message-3b9a" class="u-label">Message</label>
                    <textarea placeholder="Enter your message" rows="4" cols="50" id="message-3b9a" name="message"
                        class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-input-4"
                        required=""></textarea>
                </div>

                <!-- Add reCAPTCHA field -->
                <div class="u-form-group">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                </div>

                <!-- Add an ID to your submit button for easier access in JavaScript -->
                <input type="submit" value="submit" id="submitBtn"
                    class="u-active-custom-color-2 u-border-2 u-border-active-white u-border-custom-color-1 u-border-hover-white u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-hover-custom-color-2 u-radius-50 u-btn-1">
            </form>
        </div>

        {{-- <div class="u-grey-light-2 u-map u-map-1">
            <div class="embed-responsive">
                <iframe class="embed-responsive-item" src="{{ $sitesetting->google_maps }}"
                    data-map="JTdCJTIyYWRkcmVzcyUyMiUzQSUyMk1hbmhhdHRhbiUyQyUyME5ldyUyMFlvcmslMjIlMkMlMjJ6b29tJTIyJTNBMTAlMkMlMjJ0eXBlSWQlMjIlM0ElMjJyb2FkJTIyJTJDJTIybGFuZyUyMiUzQW51bGwlMkMlMjJhcGlLZXklMjIlM0FudWxsJTJDJTIybWFya2VycyUyMiUzQSU1QiU1RCU3RA=="></iframe>
            </div>
        </div> --}}


        <!-- Include the reCAPTCHA script -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            // fetch('{{ route('Contact.store') }}', {
            //         method: 'POST',
            //         body: formData,
            //         headers: {
            //             'X-Requested-With': 'XMLHttpRequest',
            //             'Accept': 'application/json',
            //         },
            //     })
            //     .then(response => response.json())
            //     .then(data => {
            //         if (data.success) {
            //             console.log('Form submitted successfully!');
            //             document.getElementById('successMessage').innerText = 'Form submitted successfully!';
            //             document.getElementById('quick_contact').reset();
            //         } else {
            //             console.error(data.error);
            //         }
            //     })
            //     .catch(error => {
            //         console.error('Error:', error);
            //     })
            //     .finally(() => {
            //         document.getElementById('submitBtn').disabled = false;
            //     });
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
