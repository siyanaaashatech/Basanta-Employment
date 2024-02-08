<header class="u-align-center-sm u-align-center-xs u-clearfix u-header u-sticky u-sticky-5894" id="sec-92d8">
    <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
        <a href="{{ route('index') }}" class="u-image u-logo u-image-1" data-image-width="1496" data-image-height="728"
            data-animation-duration="1000" data-animation-direction="">
            {{-- <img src="{{ url('uploads/sitesetting/' . $sitesetting->main_logo) }}" class="u-logo-image u-logo-image-1"> --}}
        </a>
        <nav class="u-align-left u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1rem; font-weight: 700;">
                <a class="u-button-style u-custom-active-color u-custom-color u-custom-hover-color u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-nav-link u-text-custom-color-1"
                    href="#">
                    <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style="">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-8a8f"></use>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="svg-8a8f" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;"
                        xml:space="preserve" class="u-svg-content">
                        <g>
                            <rect y="36" width="302" height="30"></rect>
                            <rect y="236" width="302" height="30"></rect>
                            <rect y="136" width="302" height="30"></rect>
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                    </svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
                    <li class="u-nav-item">
                        <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            href="{{ route('index') }}" style="padding: 10px 24px;">Home</a>
                    </li>




                    <li class="u-nav-item">
                        <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            {{-- href="{{ route('About') }}" style="padding: 10px 24px;">Introduction</a> --}}
                    </li>

                    <li class="u-nav-item">
                        <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            {{-- href="{{ route('Service') }}" style="padding: 10px 24px;">Services</a> --}}
                    </li>


                    {{-- For Drop Down --}}
                    {{-- <li class="u-nav-item"><a
                            class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            href="#" style="padding: 10px 24px;">Our Services</a>
                        <div class="u-nav-popup">
                            <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                @foreach ($services as $service)
                                    <li class="u-nav-item"><a href="{{ route('Servicesingle', $service->slug) }}"
                                            class="u-button-style u-nav-link u-white">{{ $service->title }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </li> --}}


                    <li class="u-nav-item">
                        <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            {{-- href="{{ route('Allprojects') }}" style="padding: 10px 24px;">Projects</a> --}}
                    </li>



                    <li class="u-nav-item"><a
                            class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            href="#" style="padding: 10px 24px;">Gallery</a>
                        <div class="u-nav-popup">
                            <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                <li class="u-nav-item">
                                    {{-- <a href="{{ route('Gallery') }}" class="u-button-style u-nav-link u-white">Image
                                        Gallery</a> --}}
                                </li>
                                <li class="u-nav-item">
                                    {{-- <a href="{{ route('Video') }}" class="u-button-style u-nav-link u-white">Video
                                        Gallery</a> --}}
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Start For careers --}}
                    <li class="u-nav-item"><a
                            class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            href="#" style="padding: 10px 24px;">Careers</a>
                        <div class="u-nav-popup">
                            <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                <li class="u-nav-item">
                                    {{-- <a href="{{ route('Careers') }}" class="u-button-style u-nav-link u-white">Current
                                        Opening</a> --}}
                                </li>
                            </ul>
                        </div>

                    </li>
                    {{-- End for careers --}}
                    <li class="u-nav-item">
                        <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            style="padding: 10px 31px 10px 24px;" href="#">Blogs</a>
                        <div class="u-nav-popup">
                            <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-3">

                                @foreach ($categories as $category)
                                    <li class="u-nav-item">
                                        {{-- <a href="{{ route('Category', $category->slug) }}" --}}
                                            class="u-button-style u-nav-link u-white">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </li>


                    <li class="u-nav-item">
                        <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                            href="{{ url('contactpage') }}" style="padding: 10px 24px;">Contact</a>
                    </li>

                </ul>
            </div>


            <div class="u-custom-menu u-nav-container-collapse">
                <div
                    class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-4">
                            <li class="u-nav-item">
                                <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                    {{-- href="{{ route('index') }}" style="padding: 10px 24px;">Home</a> --}}
                            </li>
                            <li class="u-nav-item">
                                <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                    {{-- href="{{ route('About') }}" style="padding: 10px 24px;">Introduction</a> --}}
                            </li>
                            <li class="u-nav-item">
                                <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                    {{-- href="{{ route('Service') }}" style="padding: 10px 24px;">Services</a> --}}
                            </li>
                            <li class="u-nav-item">
                                <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                    {{-- href="{{ route('Allprojects') }}" style="padding: 10px 24px;">Projects</a> --}}
                            </li>



                            <li class="u-nav-item"><a
                                    class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                    href="#" style="padding: 10px 24px;">Gallery</a>
                                <div class="u-nav-popup">
                                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                        <li class="u-nav-item">
                                            {{-- <a href="{{ route('Gallery') }}"
                                                class="u-button-style u-nav-link u-white">Image Gallery</a> --}}
                                        </li>
                                        <li class="u-nav-item">
                                            {{-- <a href="{{ route('Video') }}"
                                                class="u-button-style u-nav-link u-white">Video Gallery</a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="u-nav-item"><a
                                    class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                    href="#" style="padding: 10px 24px;">Blogs</a>
                                <div class="u-nav-popup">
                                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">


                                        @foreach ($categories as $category)
                                            <li class="u-nav-item">
                                                {{-- <a href="{{ route('Category', $category->slug) }}"
                                                    class="u-button-style u-nav-link u-white">
                                                    {{ $category->title }}
                                                </a> --}}
                                            </li>
                                        @endforeach



                                    </ul>
                                </div>
                            </li>


                            <li class="u-nav-item">
                                <a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-custom-color-1 u-text-hover-white"
                                    href="{{ url('contactpage') }}" style="padding: 10px 24px;">Contacts</a>
                            </li>




                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
    </div>
    <style class="u-sticky-style" data-style-id="5894">
        .u-sticky-fixed.u-sticky-5894,
        .u-body.u-sticky-fixed .u-sticky-5894 {
            box-shadow: 5px 5px 20px 0 rgba(0, 0, 0, 0.4) !important;
            background: #fff;
        }
    </style>
</header>


{{-- <section class="bot_nav">
  

  <nav class="navbar navbar-expand-lg">
    <div class="container">
     <a class="navbar-brand" href="{{ url('/') }}">
      {{-- <img class="logo" src="{{ url('uploads/sitesetting/' . $sitesetting->main_logo ?? '') }}" alt="logo"> --}}
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon">
          <i class="fa fa-bars" aria-hidden="true"></i>
         </span>
     </button>
     <div class="collapse navbar-collapse" id="main_nav">
     <ul class="navbar-nav mx-auto">
       <li class="nav-item active"> <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> </a> </li>

       <li class="nav-item">
        
        <a onclick="myFunction()" class="dropbtn nav-link">About Us</a>
   
        <div id="myDropdown" class="dropdown-content">
          <a href="{{ url('aboutus') }}">Introduction</a>
          <a href="{{ url('message') }}">Message fom Directors</a>
          <a href="{{ url('team') }}">Our Team</a>
        </div>
      </li>
       {{-- <li class="nav-item"> <a class="nav-link" href="{{ url('service') }}">Our Service</a> </li> --}}

     @foreach ($categories as $category)
      <li class="nav-item"><a class="nav-link" href="/single/{{ $category->id }}">{{ $category->title }}</a></li>
     @endforeach
   
     <li class="nav-item"> <a class="nav-link" href="{{ url('legaldocs') }}">Legal Documents</a> </li>

       <li class="nav-item"><a class="nav-link" href="{{ url('gallery') }}"> Gallery </a></li>
       <li class="nav-item"><a class="nav-link" href="{{ url('testimonials') }}"> Testimonials </a></li>
       <li class="nav-item"><a class="nav-link" href="{{ url('contactpage') }}"> Contact Us </a></li>
    
    
     </ul>
     </div> 
    </div> 
   </nav>









        

</section> --}}




{{-- <script>

  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  </script> --}}
