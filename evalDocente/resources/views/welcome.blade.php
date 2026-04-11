@extends('layouts.provider')
@section('content')
{{-- <body class=""> --}}
    {{-- @auth --}}
    {{-- @if (Route::currentRouteName() != "login")
    @include('partials.navbar')
    @endif --}}
    {{-- @endauth --}}

    {{-- <main class="">
        <div class="scroll-smooth"> --}}
        <center>
            <div class="card text-center">
                <div class="card-header text-end">
                  1/20
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <strong>Profesor:</strong> Pedro Rojas Guzman
                        <strong>Materia:</strong> Matematicas Aplicadas
                    </h5>
                  <p class="card-text">Explica de manera puntual y clara.</p>

                  <div class="options">
                    <img src="{{asset('images/emojis/c1.png')}}" alt="Pesimo" style="cursor: pointer">
                    <img src="{{asset('images/emojis/c2.png')}}" alt="Pesimo" style="cursor: pointer">
                    <img src="{{asset('images/emojis/c3.png')}}" alt="Pesimo" style="cursor: pointer">
                    <img src="{{asset('images/emojis/c4.png')}}" alt="Pesimo" style="cursor: pointer">
                    <img src="{{asset('images/emojis/c5.png')}}" alt="Pesimo" style="cursor: pointer">
                  </div>


                </div>
                <div class="card-footer text-muted text-xs">
                  Selecciona la opcion que mas se adecue a tu opinion, se maneja una puntuación de 1 a 5, siendo 1 la calificación mas baja y 5 la mas alta, de izquierda a derecha
                </div>
              </div>
        </center>


        {{-- </div>
    </main> --}}


@endsection
