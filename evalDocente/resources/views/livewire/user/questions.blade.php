{{-- El contenedor raíz lleva un wire:key dinámico indispensable para que Livewire detecte el cambio de pregunta y no se congele --}}
<div class="container py-5" >

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom-0 text-center text-sm-start">
            <span class="text-muted small text-uppercase fw-bold tracking-wider">
                <i class="bi bi-tag-fill text-primary me-2"></i> {{ $preguntas[$indicePregunta]->category ?? 'Evaluación Docente' }}
            </span>
        </div>

        <div class="card-body p-4 p-md-5 text-center">

                @php
                    $bgBanner = $indiceAsignacion === 0 ? 'bg-light border-secondary-subtle' : 'bg-primary-subtle border-primary';
                    $textProfesor = $indiceAsignacion === 0 ? 'text-dark' : 'text-primary-emphasis';
                @endphp

            <div class="p-4 mb-4 rounded-3 border bg-gradient shadow-xs position-relative overflow-hidden {{ $bgBanner }}"
                 style="max-width: 650px; margin: 0 auto; transition: all 0.3s ease;">

                <div class="row align-items-center">
                    <div class="col-12">
                        <span class="badge bg-primary text-uppercase px-3 py-1.5 rounded-pill mb-2 tracking-wider" style="font-size: 0.7rem;">
                            Evaluando actualmente a:
                        </span>

                        <h3 class="fw-bold mb-1 fs-4">
                            {{ $asignaciones[$indiceAsignacion]->profesor->name }}
                        </h3>

                        <div class="d-flex justify-content-center align-items-center gap-1 text-secondary mt-2">
                            <i class="bi bi-journal-bookmark-fill small"></i>
                            <span class="fw-semibold text-uppercase small tracking-wide" style="font-size: 0.8rem;">
                                Asignatura: {{ $asignaciones[$indiceAsignacion]->materia->name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <p class="fs-4 fw-medium text-dark my-4 px-2 px-md-5">
                {{ $indicePregunta + 1 }}.- {{ $preguntas[$indicePregunta]->question_text }}
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3 gap-sm-4 mt-5">

                <div class="d-flex flex-row flex-sm-column align-items-center gap-3 gap-sm-2 p-3 p-sm-2 w-100 w-sm-auto border rounded border-sm-0 bg-white shadow-sm"
                     style="cursor: pointer; transition: transform 0.2s;"
                     onmouseover="this.style.transform='scale(1.05)'"
                     onmouseout="this.style.transform='scale(1)'"
                     wire:click="guardarRespuesta(1)"
                     wire:key="btn-opt-1-{{ $preguntas[$indicePregunta]->id }}">
                    <img src="{{ asset('images/emojis/c1.png') }}" alt="Totalmente En Desacuerdo" style="width: 55px; height: 55px; object-fit: contain;">
                    <span class="small fw-semibold text-secondary text-sm-center">Totalmente en desacuerdo</span>
                </div>

                <div class="d-flex flex-row flex-sm-column align-items-center gap-3 gap-sm-2 p-3 p-sm-2 w-100 w-sm-auto border rounded border-sm-0 bg-white shadow-sm"
                     style="cursor: pointer; transition: transform 0.2s;"
                     onmouseover="this.style.transform='scale(1.05)'"
                     onmouseout="this.style.transform='scale(1)'"
                     wire:click="guardarRespuesta(2)"
                     wire:key="btn-opt-2-{{ $preguntas[$indicePregunta]->id }}">
                    <img src="{{ asset('images/emojis/c2.png') }}" alt="En desacuerdo" style="width: 55px; height: 55px; object-fit: contain;">
                    <span class="small fw-semibold text-secondary text-sm-center">En desacuerdo</span>
                </div>

                <div class="d-flex flex-row flex-sm-column align-items-center gap-3 gap-sm-2 p-3 p-sm-2 w-100 w-sm-auto border rounded border-sm-0 bg-white shadow-sm"
                     style="cursor: pointer; transition: transform 0.2s;"
                     onmouseover="this.style.transform='scale(1.05)'"
                     onmouseout="this.style.transform='scale(1)'"
                     wire:click="guardarRespuesta(3)"
                     wire:key="btn-opt-3-{{ $preguntas[$indicePregunta]->id }}">
                    <img src="{{ asset('images/emojis/c3.png') }}" alt="Indiferente" style="width: 55px; height: 55px; object-fit: contain;">
                    <span class="small fw-semibold text-secondary text-sm-center">Indiferente</span>
                </div>

                <div class="d-flex flex-row flex-sm-column align-items-center gap-3 gap-sm-2 p-3 p-sm-2 w-100 w-sm-auto border rounded border-sm-0 bg-white shadow-sm"
                     style="cursor: pointer; transition: transform 0.2s;"
                     onmouseover="this.style.transform='scale(1.05)'"
                     onmouseout="this.style.transform='scale(1)'"
                     wire:click="guardarRespuesta(4)"
                     wire:key="btn-opt-4-{{ $preguntas[$indicePregunta]->id }}">
                    <img src="{{ asset('images/emojis/c4.png') }}" alt="De acuerdo" style="width: 55px; height: 55px; object-fit: contain;">
                    <span class="small fw-semibold text-secondary text-sm-center">De acuerdo</span>
                </div>

                <div class="d-flex flex-row flex-sm-column align-items-center gap-3 gap-sm-2 p-3 p-sm-2 w-100 w-sm-auto border rounded border-sm-0 bg-white shadow-sm"
                     style="cursor: pointer; transition: transform 0.2s;"
                     onmouseover="this.style.transform='scale(1.05)'"
                     onmouseout="this.style.transform='scale(1)'"
                     wire:click="guardarRespuesta(5)"
                     wire:key="btn-opt-5-{{ $preguntas[$indicePregunta]->id }}">
                    <img src="{{ asset('images/emojis/c5.png') }}" alt="Totalmente de Acuerdo" style="width: 55px; height: 55px; object-fit: contain;">
                    <span class="small fw-semibold text-secondary text-sm-center">Totalmente de acuerdo</span>
                </div>

            </div>
        </div>

        <div class="card-footer bg-light py-3 text-muted small text-center d-flex flex-column flex-sm-row justify-content-sm-between align-items-center gap-2 px-4">
            <div>
                <i class="bi bi-patch-question me-1"></i> Pregunta <strong>{{ $indicePregunta + 1 }}</strong> de {{ count($preguntas) }}
            </div>
            <div class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill fw-semibold border">
                <i class="bi bi-people-fill me-1 text-primary"></i> Docente <strong>{{ $indiceAsignacion + 1 }}</strong> de {{ count($asignaciones) }} asignados
            </div>
        </div>
    </div>

</div>
