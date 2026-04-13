{{-- <div> --}}
{{-- </div> --}}
@extends('layouts.provider')
@section('content')

    <div class="thank-you-card">
        <div class="check-icon">✓</div>
        <h1 class="fw-bold mb-3">¡Evaluación Finalizada!</h1>
        <p class="text-muted fs-5 mb-4">
            Muchas gracias por tu tiempo. La información proporcionada será considerada de manera responsable y confidencial para la toma de decisiones académicas. Su compromiso y colaboración son esenciales para el desarrollo de nuestra comunidad educativa.
        </p>

        <hr class="my-4" style="opacity: 0.1;">

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('logout') }}" class="btn btn-return shadow-sm">
                Finalizar y Salir
            </a>
        </div>

        <p class="mt-4 mb-0 text-secondary small">
            © {{ date('Y') }} SEDU - Sistema de Evaluación Docente UMARISTA
        </p>
    </div>

@endsection
