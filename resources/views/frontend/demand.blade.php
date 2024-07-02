@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ trans('messages.' . $demand->country->name) }}</h1>
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
                            @if (app()->getLocale() == 'ne')
                                {{ $demand->vacancy_ne }}
                            @else
                                {{ $demand->vacancy }}
                            @endif
                        </span>
                        <!-- Apply button linked to the apply route -->
                        <a href="{{ route('apply', ['id' => $demand->id]) }}" class="apply-btn">{{ trans('messages.Apply') }}</a>
                    </h6>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 order-2 order-md-3 sample_page_content">
                    {!! $demand->content !!}
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 order-3 order-md-2 sample_page_list mt-2 mb-2 p-4">
                    <h3 class="">{{ trans('messages.Demands') }}</h3>
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

    <!-- Custom CSS -->
    <style>
        .apply-btn {
            background-color: rgba(99, 2, 2, 0.8);
            color: whitesmoke;
            border: 1px solid black;
            padding: 5px 10px;
            cursor: pointer;
            margin-left: 10px;
            border-radius: 5px;
            text-decoration: none; 
            display: inline-block; 
        }

        .apply-btn:hover {
            background-color: grey;
            color: whitesmoke;
        }
    </style>
@endsection
