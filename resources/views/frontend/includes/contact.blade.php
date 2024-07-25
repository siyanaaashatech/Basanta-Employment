<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <section class="container">
        <div class="d-flex flex-column justify-content-center my-5 row customconnectwithus">
            <span class="d-flex flex-column justify-content-center align-items-center containertitle">
                <h2 class="d-flex justify-content-center">{{ trans('messages.Contact') }}</h2>
                {{-- <img src="../uploads/coverimage/cover.png" alt="Banner Image" /> --}}
            </span>
            <div class="d-flex flex-column justify-content-center customconnectwithus row">
                <p class="my-4">
                    Are you prepared to enhance your skills, unlock new career opportunities, and achieve personal growth? Join our Professional Development and Training program, and connect with us to discover the empowering potential of targeted learning and career advancement.
                </p>

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

                <div class="customconnectwithus-innersection d-flex justify-content-between">
                    <div class="customconnectwithus-innersection-left col-md-5">
                        <form id="contactForm" class="form-horizontal" method="POST" action="{{ route('Contact.store') }}">
                            @csrf
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="NAME" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="EMAIL" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <label for="phone_no">Contact Number</label>
                                <input type="tel" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" placeholder="Phone No." name="phone_no" value="{{ old('phone_no') }}" required>
                                @error('phone_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <label for="message">Message</label>
                                <textarea class="form-control message-box @error('message') is-invalid @enderror" rows="4" placeholder="MESSAGE" name="message" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column my-1">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="customconnectwithus-innersection-right p-4 col-md-6">
                        <span>Feel free to connect with us through the contact details provided below for any type of inquiry or to establish a connection. We are here to assist you in a positive and helpful manner.</span>
                        <div class="customconnectwithus-innersection-right-ourdetail my-4 p-4">
                            <h6>Contact</h6>
                            <div class="py-2">
                                @if (!empty($sitesetting->office_contact))
                                    @php
                                        $officeContacts = json_decode($sitesetting->office_contact, true);
                                    @endphp
                                    @if (is_array($officeContacts))
                                        @foreach ($officeContacts as $contact)
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-phone"></i><span class="px-2">{{ $contact }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-phone"></i><span class="px-2">{{ $sitesetting->office_contact }}</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="py-2">
                                @if (!empty($sitesetting->office_email))
                                    @php
                                        $officeEmails = json_decode($sitesetting->office_email, true);
                                    @endphp
                                    @if (is_array($officeEmails))
                                        @foreach ($officeEmails as $email)
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-envelope"></i><span class="px-2">{{ $email }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-envelope"></i><span class="px-2">{{ $sitesetting->office_email }}</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="customconnectwithus-innersection-right-ourdetail my-3 p-4">
                            <h6>Address</h6>
                            <div class="py-2">
                                @if (!empty($sitesetting->office_address))
                                    @php
                                        $officeAddresses = json_decode($sitesetting->office_address, true);
                                    @endphp
                                    @if (is_array($officeAddresses))
                                        @foreach ($officeAddresses as $address)
                                            <div class="d-flex align-items-start">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span class="px-2">{{ $address }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex align-items-start">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <span class="px-2">{{ $sitesetting->office_address }}</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            var response = grecaptcha.getResponse();
            if(response.length === 0) { // reCAPTCHA not verified
                event.preventDefault(); // Prevent form submission
                alert("Please tick the reCAPTCHA box before submitting.");
            }
        });
    </script>
</body>
</html>
