@extends('layouts.provider')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card welcome-card">
                <div class="header-accent"></div>
                <div class="card-body p-5 text-center">

                    <div class="icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3z"/>
                        </svg>
                    </div>

                    <h1 class="h3 mb-3 fw-bold">Evaluación de Desempeño</h1>
                    <p class="text-muted mb-4">
                        Alumno_Nombre, Bienvenido al proceso de Evaluación Docente, un ejercicio fundamental para fortalecer la calidad educativa y promover la mejora continua. Su opinión es invaluable, ya que contribuye a identificar áreas de oportunidad y reconocer las buenas prácticas en la enseñanza. Le invitamos a participar con responsabilidad, objetividad y compromiso, considerando que sus respuestas serán un insumo clave para el desarrollo académico de nuestra comunidad.
                    </p>

                    <div class="text-start bg-light p-4 rounded-3 mb-4">
                        <h6 class="fw-bold mb-3">Instrucciones:</h6>
                        <ul class="medium text-secondary mb-0">
                            <li>Periodo de Evaluación: SEDU_(Enero/Junio Periodo 2_2026)</li>
                            <li>Semestre</li>
                            <li>La evaluación consta de <strong>15 preguntas</strong>.</li>
                            <li>Cada pregunta mostrara una serie de emojis respresentando <strong>"Totalmente en desacuerdo, En desacuerdo, Indiferente, De acuerdo, Totalmente de acuerdo"</strong> respectivamente de izquierda a derecha, al pulsar tu respuesta pasara en automatico a la siguiente pregunta.</li>
                            <li>Asegúrate de tener una conexión estable a internet.</li>
                            <li>Una vez finalizada, no podrás modificar tus respuestas.</li>
                            <li>Tiempo estimado: <strong>10 minutos</strong>.</li>
                        </ul>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="/" class="btn btn-link btn-sm text-decoration-none">Acepto Aviso de Privacidad</a>
                        <a href="{{ route('evaluacion') }}" class="btn btn-primary btn-lg shadow-sm">
                            Comenzar Evaluación
                        </a>
                    </div>

                </div>
                <div class="card-footer bg-white border-0 py-3 text-center">
                    {{-- <small class="text-muted">ID de Sesión: {{ session()->getId() }}</small> --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
{{-- </body>
</html> --}}
