@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">About Us</h1>
    </div>



    <section class="single_page">
        <div class="container">


            <h1 class="cat_title">Photo Gallery</h1>



            <div class="row">

                <!--Use @foreach here -->

                <div class="col-md-6 mb-3">
                    <a href="{{ route('single_image') }}">
                        <div class="accordion">
                            <ul>

                                <!-- @foreach ($image->img as $imgUrl)
    -->
                                <li tabindex="{{ $loop->iteration }}"
                                    style=" background-image: url('{{ asset($imgUrl) }}');">

                                </li>
                                <!--
    @endforeach -->

                            </ul>

                        </div>
                    </a>
                </div>
                <!-- end here @endforeach -->
            </div>



        </div>
    </section>
@endsection
