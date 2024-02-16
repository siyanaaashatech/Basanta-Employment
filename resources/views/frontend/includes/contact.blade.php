@extends('frontend.layouts.master')

@section('content')
    @include('frontend/includes/page_header')



    <section class="contact_form">
        <div class="container">
            <h1 class="cat_title">
                Contact Us
            </h1>
            <div class="row mt-3">
                <div class="col-md-6 cform_left">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d113044.53605690929!2d85.26660755724599!3d27.697465314449445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d27.6986812!2d85.34900499999999!4m5!1s0x39eb19c077e257b1%3A0xe92e2047692bea14!2sShree%20Binayak%20Marg%209%2C%20Kathmandu%2044600!3m2!1d27.6975294!2d85.34893389999999!5e0!3m2!1sen!2snp!4v1703018704663!5m2!1sen!2snp"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>


                <!-- @if (session('success'))
    -->
                <div class="alert alert-success">
                    <!-- {{ session('success') }} -->
                </div>
                <!--
    @endif -->

                <div class="col-md-6 cform_right">
                    <form id="quick_contact" class="form-horizontal" method="POST" role="form" action="">
                        <!-- @csrf -->
                        <div class="form-group">

                            <input type="text" class="form-control" id="name" placeholder="NAME" name="name"
                                value="" required>

                        </div>

                        <div class="form-group">

                            <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email"
                                value="" required>

                        </div>

                        <div class="form-group">


                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone No."
                                required>


                        </div>

                        <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>

                        <div class="form-group">
                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="button third">Submit</button>
                        </div>


                    </form>
                    <script>
                        function onSubmit(token) {
                            document.getElementById("quick_contact").submit();
                        }
                    </script>


                </div>
            </div>
        </div>
    </section>
@endsection
