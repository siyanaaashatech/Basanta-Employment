@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">
            Our Blogs
        </h1>
    </div>




    <section class="blog_section">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <figure class="snip1527">
                        <div class="image">
                            <img src="" />
                        </div>
                        <figcaption>
                            <h3>Title of the Post</h3>
                            <p>
                                Our current array of services includes rescue operations, heli skiing, adventure flights,
                                aerial filming, photography, and versatile sling operations for both cargo and human
                                transport, all executed with the highest standards.Annapurna Helicopters is unwavering in
                                its commitment to building a brand synonymous with comfort, safety, and top-notch service.
                                Whether it&#039;s the cleanliness of our aircraft, the quality of our seats, or the
                                hospitality of our staff, we are resolute in our pursuit of excellence
                            </p>
                        </figcaption>
                        <a href=""></a>
                    </figure>
                </div>
                @endforeach

            </div>





        </div>
    </section>


    <script>
        $(".hover").mouseleave(
            function() {
                $(this).removeClass("hover");
            }
        );
    </script>
@endsection
