@extends('portal.layouts.master')

@section('content')
    @php
        $wordChunks = array_chunk(mb_split('\s+', $strippedContent), 200);
        $images = is_array($about->image) ? $about->image : json_decode($about->image);
        $remainingImages = array_slice($images, 1);
        $imageDisplayed = false;
    @endphp


    <div class="background">
        <h1 class="page_title">{{ __('About Us') }}</h1>
    </div>




    <section class="about-section">
        <div class="container">
            <div class="row clearfix">
                
                <!--Content Column-->
                <div class="content-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <div class="title">About Us</div>
                            <h2>{{ $about->title }}</h2>
                        </div>
                        <div class="text"> 
                            @foreach ($wordChunks as $index => $wordChunk)
                            {!! implode(' ', $wordChunk) !!}
        
                            @if (!$imageDisplayed && $index < count($remainingImages))
                                <div class="post-images my-3">
                                    <img class="page_second_image" src="{{ asset($remainingImages[$index]) }}"
                                        alt="Post Image">
                                </div>
                                @php $imageDisplayed = true; @endphp
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
                
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column " data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">


                            
                        @php
                        $images = json_decode($about->image, true);
                    @endphp
                    @if(is_array($images))
                        @foreach($images as $image)
                            @if(!empty($image))
                                <img src="{{ asset($image) }}" class="page_main_image">
                            @endif
                        @endforeach
                    @else
                    <img src="{{ asset($about->image) }}" class="page_main_image">
                    @endif
                           
                            {{-- <div class="overlay-box">
                                <div class="year-box"><span class="number">5</span>Years <br> Experience <br> Working</div>
                            </div> --}}
                        </div>
                    </div>
                </div>

               
                    @foreach (array_slice($remainingImages, $imageDisplayed ? 1 : 0) as $image)
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <img class="page_second_image" src="{{ asset($images[0]) }}" alt="Post Image">
                    </div>
                @endforeach
               

                
            </div>
        </div>
    </section>


    {{-- <section class="single_page">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    @if (is_array($about->image))
                        @foreach ($about->image as $image)
                            @if (!empty($image))
                                <img src="{{ asset($image) }}" class="page_main_image">
                            @break
                        @endif
                    @endforeach
                @else
                    <img src="{{ asset($about->image) }}" class="page_main_image">
                @endif
            </div>




            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4">
                @foreach ($wordChunks as $index => $wordChunk)
                    {!! implode(' ', $wordChunk) !!}

                    @if (!$imageDisplayed && $index < count($remainingImages))
                        <div class="post-images my-3">
                            <img class="page_second_image" src="{{ asset($remainingImages[$index]) }}"
                                alt="Post Image">
                        </div>
                        @php $imageDisplayed = true; @endphp
                    @endif
                @endforeach


                @foreach (array_slice($remainingImages, $imageDisplayed ? 1 : 0) as $image)
                    <div class="post-images my-3">
                        <img class="page_second_image" src="{{ asset($images[0]) }}" alt="Post Image">
                    </div>
                @endforeach
            </div>


            </div>



        </div>
    </section> --}}
{{-- 
<section class="mvc_section">
    <div class="container">
     
            <div class="row">
                
                @foreach ($mvcs as $mvc)
                <div class="col-md-6 row mt-2 mb-2">
                    <div class="col-md-6">
                        <h3>{{ __($mvc->title) }}</h3>
    
    
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('uploads/mvc/' . $mvc->image)}}" alt="" class="square_image">
                    </div>
                </div>
                @endforeach
    
   
       
    </div>
</section> --}}





@endsection
