<!DOCTYPE html>
<html lang="en">
<head>
    <?php
use App\Models\Favicon;
    $favicon = Favicon::first();
?>
    @include('backend.includes.head')

</head>
<body>

   <main class="main" id="top">
        <div class="container" data-layout="container">
          <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
              var container = document.querySelector('[data-layout]');
              container.classList.remove('container');
              container.classList.add('container-fluid');
            }
          </script>

     @include('backend.includes.sidebar')



          <div class="content">
            @include('backend.includes.navbar')
            @yield('content')



           @include('backend.includes.footer')
          </div>

        </div>
      </main>

   @include('backend.includes.customsidebar')

   @include('backend.includes.scripts')
</body>
</html>
