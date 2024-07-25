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
                      
                </div> 

                <div class="col-lg-12 "> --}}
                    
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($coverImages as $key => $coverImage)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2000">
                                <img src="{{ asset('uploads/coverimage/' . $coverImage->image) }}" class="d-block banners-imgs"
                                    width="100%" height="550px" alt="Cover Image" />
                                <div class="carousel-caption d-md-block ">
                                    <span>
                                        @if (app()->getLocale() == 'ne')
                                        {{ $coverImage->title_ne }}
                                    @else
                                        <h1 class="herosectiontitle">{{ $coverImage->title }}</h1>
                                        <p>Check if there is a typo in typo  -solutions.com.</p>
                                        <a href="#"><button class="btn">READ MORE</button></a>
                                    @endif
                                    </span>
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

    <section class="country py-4 ">
        <div class="container swiper p-4">
            <div class="slide-container">
                <div class="card-wrapper swiper-wrapper">
                    @foreach ($demands as $demand)
                        <div class="card swiper-slide text-center d-flex flex-column">
                            <a href="{{ route('SingleDemand', ['id' => $demand->id]) }}" class="flex-grow-1 d-flex flex-column">
                                <div class="img-box">
                                    <img class="" src="{{ asset('uploads/demands/' . $demand->image) }}" alt="" />
                                </div>
                                <div class="profile-details flex-grow-1">
                                    <h3 class="pb-2">
                                        <span>
                                            @if (app()->getLocale() == 'ne')
                                                {{ $demand->country->name_ne }}
                                            @else
                                                {{ $demand->country->name }}
                                            @endif
                                        </span>
                                    </h3>
                                    <h6>
                                        {{ $demand->from_date }} <span class="to">to</span> {{ $demand->to_date }} <br />
                                        
                                        </h6>
                                        <span class="my-1">
                                        {{ trans('messages.Vacancy') }}:
                                            @if (app()->getLocale() == 'ne')
                                                {{ $demand->vacancy_ne }}
                                            @else
                                                {{ $demand->vacancy }}
                                            @endif
                                        </span>
                                   
                                </div>
                            </a>
                            <div class="apply-button  mt-2">
                                <a href="{{ route('apply', ['id' => $demand->id]) }}" class="apply-btn">
                                    {{ 'Apply now' }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    

 <!-- ceo message -->
<section class="about-us my-5 ">
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
                      <p>
                        {{-- {{ trans('messages.AboutDescription') }} --}}
                        <div class="col-lg-9 col-md-9 col-sm-9 order-2 order-md-2 sample_page_content">
                            {!! app()->getLocale() === 'ne' ? $about->description_ne : $about->description !!}
                        </div>
                    </p>
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
    <section class="experience py-4 my-5">
        <div class="container w-90 justify-content-center">
            <h2 class="text-center pb-3 section_title">{{ trans('messages.SeviceSectionTitle') }}</h2>
            <div class="row py-4 g-4">
                @foreach ($services as $service)
                    <div class="col-lg-3 col-md-3 Ebox-wrap">
                        <a href="{{ route('SingleService', ['slug' => $service->slug]) }}">
                            <div class="Ebox1  pt-3 px-3 d-flex flex-column  ">
                            <h3 class="text-center"></h3>
                                <h6 class=" Ebox-text text-justify"><span>
                                    @if (app()->getLocale() == 'ne')
                                  
                                        {{ $service->title_ne }}
                                        <p>{!! $service->description_ne !!}</p>
                                    @else
                                        {{ $service->title }}
                                        <p>{!! $service->description_ne !!}</p>
                                    @endif
                                </span></h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- CEO Message -->
    <section class="ceomessage py-5">
        <div class="container w-90 d-flex justify-content-center">
            <div class="row d-flex justify-content-center align-items-center w-60">
                @if(isset($message) && $message)
                    <div class="col-md-5">
                        @if($message->image)
                            <img src="{{ asset('uploads/message/' . $message->image) }}" alt="{{ $message->title }}" class="">
                        @else
                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image" class="">
                        @endif
                    </div>
                    
                    <div class="col-md-5 m-box py-2 animated-image">
                        <h1 class="ceopositionmes">CEO MESSAGE</h1>
                        <p class="d-flex text-justify">
                            @if (app()->getLocale() == 'ne')
                                {{ $message->title_ne }}
                                <p>{!! $message->description_ne !!}</p>
                            @else
                                {{ $message->title }}
                                <p>{!! $message->description !!}</p>
                            @endif
                        </p>
                    </div>
                @else
                    <div class="col-md-12">
                        <p>No CEO message available at this time.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>


<!-- our client -->
<section class="container">
    <div class="client-section d-flex flex-column align-items-center">
        <h2 class="text-center pb-3 section_title">{{ trans('messages.client') }}</h2>
        <div class="row">
            @if(isset($clients) && $clients->count() > 0)
                @foreach($clients as $client)
                    <div class="client-img col-md-3">
                        @if($client->image)
                            <img src="{{ asset('uploads/client/' . $client->image) }}" alt="{{ $client->name }}" />
                        @else
                            <img src="{{ asset('image/default-client.png') }}" alt="Default Client Image" />
                        @endif
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <p>No clients available at this time.</p>
                </div>
            @endif
        </div>
    </div>
</section>


<section class="experience py-2 my-5 clientsay">
    <div class="container">
        <h2 class="text-center pb-2 section_title">{{ trans('messages.clientsay') }}</h2>
        <div class="row py-2 g-4">
            @if(isset($clientMessages) && $clientMessages->count() > 0)
                @foreach($clientMessages as $clientMessage)
                    <div class="col-lg-3 col-md-3 Ebox-wrap">
                        <div class="Ebox1 clientcard pt-3 px-3 d-flex flex-column position-relative">
                            <!-- Adjusted positioning for the icon -->
                            <div class="clientcard-icon position-absolute top-2 left-4">
                                <i class="fas fa-heart heart-icon"></i>
                            </div>
                            
                            {{-- @if($clientMessage->image)
                                <img src="{{ asset('uploads/client/' . $clientMessage->image) }}" alt="{{ $clientMessage->name }}" class="img-fluid mb-3">
                            @else
                                <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image" class="img-fluid mb-3">
                            @endif --}}

                            <p class="d-flex text-justify messagefromclient my-4">
                                @if (app()->getLocale() == 'ne')
                                    {!! $clientMessage->message_ne !!}
                                @else
                                    {!! $clientMessage->message !!}
                                @endif
                            </p>
                            <h4 class="whosaidit">@if (app()->getLocale() == 'ne')
                                {{ $clientMessage->name_ne }}
                            @else
                                {{ $clientMessage->name }}
                            @endif</h4>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <p>No client messages available at this time.</p>
                </div>
            @endif
        </div>
    </div>
</section>


    <!-- Get in touch -->
    <!-- <section class="Find-country">
        <div class="container py-5">
            <div class="row d-flex align-items-center find-count-row">
             <div class="col">
        
             </div>
                
            </div>
        </div>
    </section> -->


<!-- 
    {{-- <section class="guiding py-5">
        <div class="container">
            <h2 class="text-center section_title pb-3">{{ trans('messages.Our') }} {{ trans('messages.' . ucfirst($firstCategory->title)) }}</h2>
            <div class="row">

                {{-- @foreach ($posts as $post) --}}
                    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-3 guiding_box">
                  
                            <div class="d-flex gap-4 align-items-center">
                                <div class="guiding-img">
                                    <img src="{{ asset('image/transparency.png') }}">
                                </div>

                                <div>
                                    <h3 class="pt-3 pb-2">{{ trans('messages.post_title_1' ) }}</h3>
                                    <h5>
                                       
                                        {{ trans('messages.post_1')}}

                                  
                                    </h5>
                                </div>
                            </div>
                      
                    </div> --}}


                  
                    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-3 guiding_box">
                    
                            <div class="d-flex gap-4 align-items-center">
                                <div class="guiding-img">
                                    <img src="{{ asset('image/adptability.png') }}">
                                </div>

                                <div>
                                    <h3 class="pt-3 pb-2">{{ trans('messages.post_title_2' ) }}</h3>
                                    <h5>
                                       
                                        {{ trans('messages.post_2')}}

                                      
                                    </h5>
                                </div>
                            </div>

                    </div>


                  
                    <div class="col-lg-4 col-md-6 col-sm-6 pt-3 guiding_box">
                 
                            <div class="d-flex gap-4 align-items-center">
                                <div class="guiding-img">
                                    <img src="{{ asset('image/integrity.png') }}">
                                </div>

                                <div>
                                    <h3 class="pt-3 pb-2">{{ trans('messages.post_title_3' ) }}</h3>
                                    <h5>
                                       
                                        {{ trans('messages.post_3')}}

                                       
                                    </h5>
                                </div>
                            </div>
        
                    </div>


                  
                  
                    <div class="col-lg-4 col-md-6 col-sm-6 pt-3 guiding_box">
       
                            <div class="d-flex gap-4 align-items-center">
                                <div class="guiding-img">
                                    <img src="{{ asset('image/clientfocus.png') }}">
                                </div>

                                <div>
                                    <h3 class="pt-3 pb-2">{{ trans('messages.post_title_4' ) }}</h3>
                                    <h5>
                                       
                                        {{ trans('messages.post_4')}}

                                       
                                    </h5>
                                </div>
                            </div>
         
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 pt-3 guiding_box">
                   
                            <div class="d-flex gap-4 align-items-center">
                                <div class="guiding-img">
                                    <img src="{{ asset('image/clientdevelop.png') }}">
                                </div>

                                <div>
                                    <h3 class="pt-3 pb-2">{{ trans('messages.post_title_5' ) }}</h3>
                                    <h5>
                                       
                                        {{ trans('messages.post_5')}}

                                       
                                    </h5>
                                </div>
                            </div>
               
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 pt-3 guiding_box">
         
                            <div class="d-flex gap-4 align-items-center">
                                <div class="guiding-img">
                                    <img src="{{ asset('image/ethical.png') }}">
                                </div>

                                <div>
                                    <h3 class="pt-3 pb-2">{{ trans('messages.post_title_6' ) }}</h3>
                                    <h5>
                                       
                                        {{ trans('messages.post_6')}}

                                       
                                    </h5>
                                </div>
                            </div>
                     
                    </div>
 --}} 

                  
                {{-- @endforeach --}}

            </div>
        </div>
    </section> -->

    <!-- <section class="testimonial">
        <div class="container swiper mySwiper">
            <h2 class="text-center section_title pb-3">{{ trans('messages.Testimonials') }}</h2>
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide px-5">
                        <a href="{{ route('Testimonial') }}">
                            <h5 class="text-center pt-3">
                              <span>
                                    @if (app()->getLocale() == 'ne')
                                    {{ $testimonial->description_ne }}
                                @else
                                    {{ $testimonial->description }}
                                @endif
                                </span>
                            </h5>
                            <div class=" text-center text-img">
                                <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                    alt="Testimonial Image" style="width: 100px;">
                                    <h3><span>
                                        @if (app()->getLocale() == 'ne')
                                        {{ $testimonial->name_ne }}
                                    @else
                                        {{ $testimonial->name }}
                                    @endif
                                    </span></h3>
                                    <h5><span>
                                        @if (app()->getLocale() == 'ne')
                                        {{ $testimonial->company->title_ne }}
                                    @else
                                        {{ $testimonial->company->title }}
                                    @endif
                                    </span></h5>
                                    <h6>
                                        @if (app()->getLocale() == 'ne')
                                            {{ $testimonial->work_category ? $testimonial->work_category->title_ne : 'Default Title' }}
                                        @else
                                            {{ $testimonial->work_category ? $testimonial->work_category->title : 'Default Title' }}
                                        @endif
                                    </h6>
                                    
                                    
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next arrow"></div>
            <div class="swiper-button-prev arrow"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section> -->






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

                    <form id="contactForm" method="POST" action="{{ route('Contact.store') }}">
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

                               <div class="pt-5 mb-5">
                                <button class="btn">SUBMIT</button>
                            </div>
                    
                           </form>
                       </div>          
                    </form>

                    <script>
                        function submitForm() {
                            var form = document.getElementById('contactForm');
                            var formData = new FormData(form);
                
                            fetch(form.action, {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Show success message
                                    alert('Your message has been submitted successfully!');
                                    // Optionally clear form fields
                                    form.reset();
                                } else {
                                    // Handle errors if needed
                                    alert('Submission failed. Please check your input and try again.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred. Please try again later.');
                            });
                        }
                    </script>

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
            {{-- <h2 class="text-center section_title pb-3">{{ trans('messages.Blogs') }}</h2> --}}
            <div class="row g-4">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-4">
                    <a href="{{ route('SingleBlogpostcategory', ['slug' => $blog->slug]) }}">
                        <div class="Ebox1">
                            <div class="E-B-img">
                                <img src="{{ asset('uploads/blogpostcategory/' . $blog->image) }}" alt="">
                            </div>
                            <h3 class="text-center pt-3">
                                @if (app()->getLocale() == 'ne')
                                {{ $blog->title_ne }}
                                @else
                                {{ $blog->title }}
                                @endif
                            </h3>
                            <p class="text-center pt-2">
                                @if (app()->getLocale() == 'ne')
                                {!! $blog->content_ne !!}
                                @else
                                {!! $blog->content !!}
                                @endif
                            </p>
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

{{-- <section class="banner">
    <div class="container-fluid">
        <div class="row g-4 align-items-center">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- First Carousel Item -->
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="./image/herosection.png" class="d-block w-100" alt="First slide">
                        <div class="carousel-caption d-flex flex-column ">
                            <h1>basanta International </h1>
                            <h1>working  <span>since 2018</span></h1>
                            <p>Check if there is a typo in typo -solutions.com.</p>
                            <a href="#" class="btn my-3 ">READ MORE </a>
                        </div>
                    </div>
                    <!-- Second Carousel Item -->
                    <div class="carousel-item" data-bs-interval="3000 row">
                        <img src="./image/herosection.png" class="d-block w-100" alt="second slide">
                        <div class="carousel-caption d-flex flex-column ">
                            <h1>SUPPly more </h1>
                            <h1>then <span>20k member</span></h1>
                            <p>Check if there is a typo in typo  -solutions.com.</p>
                            <a href="#" class="btn my-3">READ MORE</a>
                        </div>
                    </div>
                </div>
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
  </section> --}}
