@extends('frontend.layouts.master')

@section('content')
    @include('frontend/includes/page_header')

    <section class="u-align-center u-clearfix u-grey-5 u-section-11" id="sec-be4d">
        <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
            <h1 class="u-text u-text-custom-color-1 u-text-default u-text-1">{{ __('Contact Us') }}</h1>
            <div class="u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
                <form action="{{ route('Contact.store') }}" method="POST" class="u-form-vertical" style="padding: 10px"
                    id="quick_contact">
                    @csrf
                    <input type="text" placeholder="Enter your Name" name="name" required="" class="u-input">
                    <input type="email" placeholder="Enter a valid email address" name="email" required=""
                        class="u-input">
                    <input type="tel" placeholder="Enter your phone" name="phone_no" required="" class="u-input">
                    <textarea placeholder="Enter your message" rows="4" name="message" required="" class="u-input"></textarea>
                    <input type="submit" value="Submit" class="u-btn-submit">
                </form>
            </div>
        </div>
    </section>
@endsection
