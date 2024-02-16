@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">Our Team</h1>
    </div>

    <section class="single_page">
        <div class="container">

            <div class="row mt-3">


                <!-- use  foreach loop from here -->
                <div class="col-md-3">
                    <div class="card team_card mt-2 mb-2">

                        <img src="Imageofateam" class="card-img-top image" alt="">

                        <div class="card-body">

                            <span class="team_name">Name</span><br>
                            <span class="team_position">Position</span><br>
                            <span class="team_email">Email</span><br>
                            <span class="team_contact">Contact</span>

                        </div>
                    </div>
                </div>

                <!-- to here @endforeach -->

            </div>




        </div>

    </section>
@endsection
