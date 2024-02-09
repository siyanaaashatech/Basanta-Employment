<section class="u-align-center u-clearfix u-grey-5 u-section-11" id="sec-be4d">
    <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <h1 class="u-text u-text-custom-color-1 u-text-default u-text-1">{{ __('Contact') }}</h1>

        <div class="u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
            <form action="{{ route('Contact.store') }}" method="POST" class="u-form-vertical" style="padding: 10px"
                id="quick_contact">
                @csrf

                <input type="text" placeholder="Enter your Name" name="name" required="" class="u-input">
                <input type="email" placeholder="Enter a valid email address" name="email" required=""
                    class="u-input">
                <input type="tel" placeholder="Enter your phone (e.g. +14155552675)" name="phone_no" required=""
                    class="u-input">
                <textarea placeholder="Enter your message" rows="4" name="message" required="" class="u-input"></textarea>

                <!-- reCAPTCHA placeholder -->
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>

                <input type="submit" value="Submit" class="u-btn-submit">
            </form>
        </div>

        <!-- Success Message Placeholder -->
        <div id="successMessage" style="display:none;">Your message has been sent successfully!</div>

        <!-- Include the reCAPTCHA script -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('quick_contact').addEventListener('submit', function(event) {
                    event.preventDefault();
                    document.getElementById('submitBtn').disabled =
                    true; // Ensure you have an ID 'submitBtn' on your submit input/button

                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                            action: 'submit'
                        }).then(function(token) {
                            var formData = new FormData(document.getElementById(
                                'quick_contact'));
                            formData.append('g-recaptcha-response',
                            token); // Append reCAPTCHA response to formData

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
                                        document.getElementById('successMessage').style
                                            .display = 'block';
                                        document.getElementById('quick_contact')
                                    .reset(); // Reset form
                                    } else {
                                        // Handle server validation error
                                        console.error(data.error);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                })
                                .finally(() => {
                                    grecaptcha.reset();
                                    document.getElementById('submitBtn').disabled = false;
                                });
                        });
                    });
                });
            });
        </script>
    </div>
</section>
