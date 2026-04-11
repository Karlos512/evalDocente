<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>EVALUACIÓN DOCENTE</title> --}}
    <title>Evaluación - {{ config('app.name') }}</title>
    {{-- <link rel="shortcut icon" href="{{ asset('images/home/mini.png') }}" /> --}}
    <meta name="description" content="Evaluación Docente">

    {{---- METEADATA ---}}
    <meta property="og:title" content="Evalución Docente">
    <meta property="og:description" content="Evaluación Docente">
    <meta property="og:type" content="website">
    {{-- ------------ --}}

    {{-- Bootstrap and Jquery Styles--}}
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.structure.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- --------------- --}}

    @if(request()->path() == '/' || request()->path() == 'welcome' || request()->path() == 'evaluacion')
        <link href="{{ asset('css/cardlogin.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @endif




    {{-- <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-nav.css') }}" rel="stylesheet"> --}}

    {{-- <link href="{{ asset('css/hide.css') }}" rel="stylesheet"> --}}


    {{-- @auth
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formadmin.css') }}" rel="stylesheet">
    @endauth --}}

    {{-- @if (Auth::guest()) --}}

    {{-- --}}

    {{-- @else
    <link href="{{ asset('css/formuser.css') }}" rel="stylesheet">
    @endif --}}
    {{-- <link href="{{ asset('css/modal.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/form-elements.css') }}" rel="stylesheet"> --}}

</head>
