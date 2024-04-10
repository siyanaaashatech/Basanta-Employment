<section class="topheader">
    <div class="container">

        <div class="row">




            <div class="col-md-6 text-left col-sm-12">


                <div class="social-buttons">
                    <a href="{{ $sitesetting->facebook_link }}"
                        class="social-buttons__button social-button social-button--facebook" aria-label="Facebook">
                        <span class="social-button__inner">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                    </a>
                    <a href="{{ $sitesetting->linkedin_link }}"
                        class="social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn">
                        <span class="social-button__inner">
                            <i class="fab fa-linkedin-in"></i>
                        </span>
                    </a>
                    <a href="{{ $sitesetting->instagram_link }}" target="_blank"
                        class="social-buttons__button social-button social-button--instagram" aria-label="InstaGram">
                        <span class="social-button__inner">
                            <i class="fab fa-instagram"></i>
                        </span>
                    </a>
  
                </div>


            </div>


            <div class="col-md-6 col-sm-12 top_right">
                
                <p class="mt-3">{{ $sitesetting->office_contact }}</p>

                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search..." required />
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                
            </div>

        </div>
</section>
