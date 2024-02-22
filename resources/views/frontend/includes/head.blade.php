<head>
    <?php
    use App\Models\Favicon;
    // $favicon = Favicon::first();
    ?>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Trademark Education Consultancy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">



    <meta name="author" content="BibekGuragain">
    <meta name="generator" content="Trademark Education Consultancy">



    <title>{{ config('app.name', 'Laravel') }}</title>




    <!-- Google reCAPTCHA -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    


    {{-- {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch',
    ]) !!} --}}

    <!-- Other scripts and callbacks as needed -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">





    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
