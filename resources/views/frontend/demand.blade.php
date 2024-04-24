@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ $demand->country->name }}</h1>
    </div>
    <section class="sample_page">
        <div class="container">
          
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 order-1 order-md-1">
                    <img src="{{ asset('uploads/demands/' . $demand->image) }}" alt="Demand Image" class="sample_page_image">
                    <h6>
                        {{ $demand->from_date }} - {{ $demand->to_date }} <br />
                        {{ trans('messages.Vacancy') }}:
                        <span>
                            {{ $demand->vacancy }}
    
                        </span>
                    </h6>
                </div>

               
         

                <div class="col-lg-12 col-md-12 col-sm-12 order-2 order-md-3 sample_page_content">
                
                    {!! $demand->content !!}
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 order-3 order-md-2 sample_page_list mt-2 mb-2 p-4">
                    <h3 class="">Demands</h3>
                    <ul>
                        @foreach ($listdemands as $demand)
                            <li>
                                <a href="{{ route('SingleDemand', ['id' => $demand->id]) }}">
                                    {{ trans('messages.' . $demand->country->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>


            </div>




        </div>
    </section>
@endsection
