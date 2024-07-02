@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ trans('messages.OurDemands') }}</h1>
    </div>

    <section class="multi_post">
        <div class="container">
            <div class="multi_poster row justify-content-center gap-5">

                @foreach ($demands as $demand)
                    <div class="card col-lg-4">
                        <a href="{{ route('SingleDemand', ['id' => $demand->id]) }}">
                        <div class="multi_post_image">
                            @if ($demand->image)
                                <img src="{{ asset('uploads/demands/' . $demand->image) }}" class="card-img-top"
                                    alt="Demand Image">
                            @else
                                <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8"
                                    class="card-img-top" alt="Post Image">
                            @endif
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ trans('messages.' . $demand->country->name) }}</h5>
                            <p class="card-text">
                                {{ $demand->from_date }} - {{ $demand->to_date }} <br />
                                {{ trans('messages.Vacancy') }}:
                                <span>
                                    {{ $demand->vacancy }}
            
                                </span>
                                {!! $demand->content !!}
                            </p>
                            {{-- <a href="{{ route('SingleDemand', ['slug' => $demand->slug]) }}">
                                <button class="btn">Read More &nbsp;&nbsp;<i
                                        class="fa-solid fa-arrow-right"></i></button> </a> --}}
                        </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
