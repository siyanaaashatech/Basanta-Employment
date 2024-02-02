<!DOCTYPE html>
<html lang="en">
@include('backend.includes.head')

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>

            @include('backend.includes.sidebar')

            {{-- navbar --}}
            <div class="content">

                @include('backend.includes.navbar')

                @include('sweetalert::alert')


                @yield('content')


                @include('backend.includes.footer')
            </div>

        </div>
    </main>

    {{-- @include('backend.includes.customsidebar') --}}
    @include('backend.includes.scripts')

    @yield('scripts')

</body>

</html>
