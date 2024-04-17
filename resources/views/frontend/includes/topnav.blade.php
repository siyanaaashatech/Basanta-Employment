<section class="topheader">
    <div class="container">

        <div class="row">




            <div class="col-md-6 text-left col-sm-12">
                <div class="footer-social-icon">
                    <a href="{{ $sitesetting->facebook_link }}" target="_blank"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a>
                    <a href="{{ $sitesetting->instagram_link }}" target="_blank"><i class="fa-brands fa-instagram " aria-hidden="true"></i></a>
                    <a href="{{ $sitesetting->linkedin_link }}" target="_blank"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
                    <a href="{{ $sitesetting->snapchat_link }}" target="_blank"><i class="fa-brands fa-square-snapchat"></i></a>

                </div>

            </div>


         <div class="col-md-6 col-sm-12 top_right">
                
                <p class="mt-3">{{ $sitesetting->office_contact }}</p>

                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search..." required />
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

            

        </div>
</section>