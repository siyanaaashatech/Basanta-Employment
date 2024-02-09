@extends('frontend.layouts.master')

@section('content')

    <body class="u-body u-xl-mode" data-lang="en">




        <section class="u-align-center u-clearfix u-section-1" id="contact-form-section">
            <div class="u-clearfix u-sheet u-sheet-1">
                <h2>Contact Us</h2>

                {{-- Iterate over contacts and display them --}}
                @if ($contacts->count() > 0)
                    <ul class="contact-list">
                        @foreach ($contacts as $contact)
                            <li>
                                <h3>{{ $contact->name }}</h3>
                                <p>Email: {{ $contact->email }}</p>
                                <p>Message: {{ $contact->message }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No contacts found.</p>
                @endif
            </div>
        </section>

    </body>
    @include('frontend/includes/contact')
@stop
