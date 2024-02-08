<head>
    <?php
    use App\Models\Favicon;
    // $favicon = Favicon::first();
    ?>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>




    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('venobox/dist/venobox.min.css') }}" type="text/css" media="screen" />




    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" href="{{ asset('css/images/favicon.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/' . $favicon->apple_touch_icon) }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('uploads/favicon/' . $favicon->favicon_thirtyTwo) }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('uploads/favicon/' . $favicon->favicon_sixteen) }}">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}"> --}}
    <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->file) }}">
    <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->favicon_ico) }}">

    <!-- CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('css/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('css/plugins/slick/slick.css') }}">

    <link rel="stylesheet" href="{{ asset('css/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('css/plugins/colorbox/colorbox.css') }}">
    <!-- Lightbox -->
    <link rel="stylesheet" href="{{ asset('dist/css/lightbox.css') }}">

    <!-- Google reCAPTCHA -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    {{-- {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch',
    ]) !!} --}}

    <!-- Other scripts and callbacks as needed -->




    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RDTXSELLCL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-RDTXSELLCL');
    </script>



    <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" "="" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/custom.js') }}" "="" defer=""></script>
    <!-- Styles -->




    <link href="{{ asset('css/aasha.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>
