<style>
    @media screen and (min-width: 600px) {
        .mobile-break {
            display: none;
        }
    }
</style>

<section class="top_nav">
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-6 top_nav_first">
                <p class="top_nav_first_p">
                    {{-- <a href="{{ $sitesetting->face_link }}" target="_blank"> --}}
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    </a>
                    {{-- <a href="{{ $sitesetting->insta_link }}" target="_blank"> --}}
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    {{-- <a href="{{ $sitesetting->linked_link }}" target="_blank"> --}}
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                    </a>
                </p>
            </div>
            <div class="col-md-9 top_nav_second">
                <p class="top_nav_p">
                    <span class="top_nav_loc">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        {{-- {{ $sitesetting->office_address ?? '' }} --}}
                    </span>
                    <br class="mobile-break">

                    <span class="top_nav_loc">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        {{-- {{ $sitesetting->office_contact ?? '' }} --}}
                    </span>
                    <br class="mobile-break">
                    <span class="top_nav_loc">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        {{-- {{ $sitesetting->office_mail ?? '' }} --}}
                    </span>
                    <form action="{{ route('search') }}" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="Search..." required />
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <a href="{{ route('Contact') }}" class="btn bg-primary text-white">Apply Now</a>

                    <a class="nav-link m-3 fs-5" href="">9876543210</a>

                </p>
            </div>
        </div>


        {{-- <p class="top_nav_p">
           <span class="top_nav_loc">
           <i class="fa fa-map-marker" aria-hidden="true"></i>
               {{-- {{ $sitesetting->office_address ?? '' }} --}}
           </span> 
     
           <span class="top_nav_phone">
           <i class="fa fa-phone" aria-hidden="true"></i>
               {{-- Contact Us directly at  {{ $sitesetting->office_contact ?? '' }} --}}
           </span>
       </p> --}}

    </div>
</section>
