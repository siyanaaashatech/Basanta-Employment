@extends('frontend.layouts.master')

@section('content')
    <section class="banner ">
        <div class="container-fluid">
            <div class="row g-4 align-items-center">
                {{-- <div class="col-lg-4 text-center pt-5 order-lg-1 order-md-2 order-sm-2 order-xs-2"> 
                        <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" width="250px" height="150px"
                            alt="" />
                        <h3>{{ $sitesetting->office_name }}</h3>
                        <p>{{ $sitesetting->slogan }}</p>
                        <a href="{{ route('Contact') }}"><button class="btn">CONTACT US</button></a>
                </div> 

                <div class="col-lg-12 "> --}}
                    
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($coverImages as $key => $coverImage)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2000">
                                <img src="{{ asset('uploads/coverimage/' . $coverImage->image) }}" class="d-block banners-imgs"
                                    width="100%" height="550px" alt="Cover Image" />
                                <div class="carousel-caption d-none d-md-block w-100">
                                    <h2>{{ $coverImage->title }}</h2>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                    
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>






    <section class="country py-4">
        <div class="container swiper p-4">
            <div class="slide-container">
                <div class="card-wrapper swiper-wrapper">
                    @foreach ($demands as $demand)
                   
                        <div class="card swiper-slide text-center ">
                            <a href="{{ route('SingleDemand',['id' => $demand->id]) }}">
                            <div class="img-box">
                               
                                <img class="" src="{{ asset('uploads/demands/' . $demand->image) }}" alt="" />
                           
                            </div>
                            <div class="profile-details">
                                <h3 class="pb-2">{{ trans('messages.' . $demand->country->name) }}</h3>
                                <h6>
                                    {{ $demand->from_date }} - {{ $demand->to_date }} <br />
                                    {{ trans('messages.Vacancy') }}:
                                    <span>
                                        {{ $demand->vacancy }}

                                    </span>
                                </h6>
                            </div>
                        </a>
                        </div>
                  
                    @endforeach
                </div>
            </div>
        </div>
    </section>



<section class="about-us">
  <div class="container">
      <div class="container-box">
          <div class="left position-relative">
              <div class="img position-relative">
                  <img src="{{ asset('uploads/about/' . $about->image) }}" alt="">
              </div>
              <div class="cr-1 position-absolute bottom-0 start-0"></div>
          </div>
          <div class="right  position-relative">
              <div class="cr-2 position-absolute top-0 end-0"></div>
              <div class="content ">
                  <div class="right-box">
                      <h2 class="section_title">{{ trans('messages.' . ucfirst($about->title)) }}
                        
                     </h2>
                      <p>{{ trans('messages.AboutDescription') }}</p>
                      <a href="{{ route('About') }}" class="btn">{{ trans('messages.ReadMore') }}<i
                            class="fa-solid fa-arrow-right mx-2"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
</section>


    <!-- Experience -->
    {{-- <section class="experience py-4">
        <div class="container">
            <h2 class="text-center pb-3 section_title">MORE THAN 10 YEARS OF EXPERIENCE</h2>
            <div class="row py-4 g-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-4">
                        <a href="{{ route('SingleService', ['slug' => $service->slug]) }}">
                            <div class="Ebox1">
                                <div class="E-B-img">
                                    <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Service Image">
                                </div>
                                <h3 class="text-center pt-3">{{ $service->title }}</h3>
                            </div>
                    </div>
                @endforeach
            </div>

        </div>
        
    </section> --}}

    <!-- Experience -->
    <section class="experience py-4">
        <div class="container">
            <h2 class="text-center pb-3 section_title">{{ trans('messages.SeviceSectionTitle') }}</h2>
            <div class="row py-4 g-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-4 Ebox-wrap">
                        <a href="{{ route('SingleService', ['slug' => $service->slug]) }}">
                            <div class="Ebox1">
                                <div class="Ebox-img">
                                    <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Service Image">
                                </div>
                                <h3 class="text-center pt-3 Ebox-text">{{ trans('messages.' .($service->title)) }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Get in touch -->
    <section class="Find-country">
        <div class="container py-5">
            <div class="row d-flex align-items-center find-count-row">
                <div class="col-lg-8">
                    <h2 class="fw-bold">{{ trans('messages.BestCountry') }}</h2>
                    <h5 class="pt-3">{{ trans('messages.BestCountryLineOne') }}<br> {{ trans('messages.BestCountryLineTwo') }}
                    </h5>

                </div>
                <div class="col-lg-4 pt-4">
                    <a href="{{ route('Contact')}}" class="btn2">GET IN TOUCH</a>
                </div>
                
            </div>
        </div>
    </section>

    <section class="guiding py-5">
        <div class="container">
            <h2 class="text-center section_title pb-3">{{ trans('messages.Our') }} {{ trans('messages.' . ucfirst($firstCategory->title)) }}</h2>
            <div class="row">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6 pt-3">
                        <a href="{{ route('singlePost', ['slug' => $post->slug]) }}">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="guiding-img">
                                    <img src="{{ asset('uploads/post/' . $post->image) }}">
                                </div>

                                <div>
                                    <h3 class="pt-3 pb-2">{{ trans('messages.' . $post->title) }}</h3>
                                    <h5>
                                        {{ Str::limit(strip_tags($post->description), 100) }}...
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="container swiper mySwiper">
            <h2 class="text-center section_title pb-3">{{ trans('messages.Testimonials') }}</h2>
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide  p-5">
                        <a href="{{ route('Testimonial') }}">
                            <h5 class="text-center pt-3">{{ $testimonial->description }}</h5>
                            <div class=" text-center text-img">
                                <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                    alt="Testimonial Image" style="width: 100px;">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <h5>{{ $testimonial->company->title }}</h5>
                                    <h6>({{ $testimonial->work_category->title }})</h6>
                                    
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next arrow"></div>
            <div class="swiper-button-prev arrow"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>






    <section class="contact">
        <div class="container ">
            <h2 class="text-center section_title pb-3">{{ trans('messages.Contact') }}</h2>
            <div class="row g-4 contact-det">
                <div class="col-lg-6">
                <iframe src="{{ $sitesetting->google_maps_link }}" width="100%"  style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-6 pt-5">

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

                    <form id="contactForm" class="form-horizontal" method="POST" role="form" action="{{ route('Contact.store') }}">
                        @csrf
                        <div class="inp">
                            <input type="text" name="name" id="" placeholder="ENTER YOUR NAME">
                        </div>
                        <div class="inp">
                            <input type="email" name="email" id=""
                                placeholder="ENTER A VALID EMAIL ADDRESS">
                        </div>
                        <div class="inp">
                            <input type="tel" name="phone_no" id="" placeholder="ENTER YOUR PHONE NO.">
                        </div>
                        <div class="inp">
                            <textarea name="message" id="" rows="3" placeholder="ENTER YOUR MESSAGE"></textarea>
                        </div>
                               <!-- Add reCAPTCHA field -->
                               <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div> 

                               <div class="pt-5 mb-5">
                                <button class="btn">SUBMIT</button>
                            </div>
                    
                           </form>
                       </div>          
                    </form>

                    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <!-- reCAPTCHA initialization -->
                    <script type="text/javascript">
                        var onloadCallback = function() {
                            grecaptcha.render('html_element', {
                                'sitekey' : '6LdJRrspAAAAAMHgf6vvqik5fcTUD2ZKCZtG9Vaf',
                                'callback': verifyCallback,
                                'expired-callback': recaptchaExpired
                            });
                        };
    
                        function verifyCallback(response) {
                            // If reCAPTCHA is ticked, enable form submission
                            document.getElementById("lcontactForm").submit();
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
                </div>
            </div>
        </div>
    </section>



    <section class="blogs py-5">
        <div class="container">
            <h2 class="text-center section_title pb-3">{{ trans('messages.Blogs') }}</h2>
            <div class="row g-4">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-4">
                    <a href="{{ route('SingleBlogpostcategory', ['slug' => $blog->slug]) }}">
                        <div class="Ebox1">
                            <div class="E-B-img">
                                <img src="{{ asset('uploads/blogpostcategory/' . $blog->image) }}" alt="">
                            </div>
                            {{-- <h3 class="text-center pt-3">{{ trans('messages.' . $blog->title) }}</h3> --}}
                            <h3 class="text-center pt-3">{{ $blog->title}}</h3>

                        </div>
                    </a>
                </div>
            @endforeach
            
            </div>
        </div>
    </section>
@endsection






{{-- <!-- flotbox -->
<section class="secondSection">
    <div class="contain container">
        <div class="flexbox row justify-content-center m-0 column-gap-4 gap-4">
            @foreach ($blogs as $blog)
                <div class="card col-lg-4" style="max-width: 350px;">
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('SingleBlogpostcategory', ['slug' => $blog->slug]) }}">
<img src="{{ asset('uploads/blogpostcategory/' . $blog->image) }}" class="img-fluid rounded-start" alt="...">
</a>
</div>
<div class="col-8">
    <div class="card-body">
        <p class="card-text">{{ Str::limit(strip_tags($blog->content), 90) }}</p>
    </div>
</div>
</div>
</div>
@endforeach
</div>
</div>

<!-- Services -->
<div class="contain container">

    <div class="flexbox row justify-content-center m-0 column-gap-4 gap-4 container">
        <h1 class="text-white heading_title">Our Services</h1>
        @foreach ($services as $service)
        <div class="col-lg-4 " style="max-width: 325px;">
            <div class="box text-center">
                <div class="circle-3 text-white">
                    <b>
                        <p class="my-2">{{ $loop->iteration }}</p>
                    </b>
                </div>
                <div class="circle-1">
                    <div class="circle-2">
                        <div class="text">

                            <a href="{{ route('SingleService', ['slug' => $service->slug]) }}" class="text-decoration-none">
                                <h2>{{ $service->title }}</h2>
                            </a>

                            <h4>{{ Str::limit(strip_tags($service->description), 170) }}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
        <div class="text-center">
            <a href="{{ route('Service') }}">
                <button class="btn bg-primary text-white m-5">View all Services</button>
            </a>
        </div>
    </div>
</div>
</section>

<div class="join">
    <div class="text mt-5">
        <h2 class="text-center">Join students over 1000+ like you</h2>
    </div>
    <div class="students">
        <div id="carouselExampleDark" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($testimonials as $testimonial)
                <div class="carousel-item{{ $loop->first ? ' active' : '' }}" data-bs-interval="10000">
                    <div class="row test_row">
                        <div class="col-lg-6 col-md-6">
                            @if ($testimonial->image)
                            <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" class="d-block w-100 test_image" alt="">
                            @else
                            <img src="{{ asset('image/girl.jpg') }}" class=" d-block w-100 test_image" alt="">
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="carousel-caption">
                                <div class="text-start text-dark">
                                    <p>{{ $testimonial->description }}</p>
                                    <h2>{{ $testimonial->name }}</h2>
                                    <p>{{ $testimonial->university->title }} ({{ $testimonial->course->title }})
                                    </p>

                                </div>
                            </div>

                        </div>

                        <div class="text-center">
                            <a href="{{ route('Testimonial') }}">
                                <button class="btn bg-primary text-white m-5"> VIEW ALL</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">

                <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>




    </div>
</div>




@stop --}}
