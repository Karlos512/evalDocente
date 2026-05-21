<div class="container py-4">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3 text-dark">
                <i class="bi bi-bar-chart-line text-primary me-2"></i>Reporte de Rendimiento Docente
            </h5>
            <p class="text-muted small mb-4">
                Selecciona un profesor de la lista para evaluar sus estadísticas globales y el desglose de puntajes agrupados por las categorías de tus preguntas.
            </p>

            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <label class="form-label small fw-bold text-secondary text-uppercase">Profesor a Evaluar</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-person-badge"></i>
                        </span>
                        <select class="form-select bg-light border-start-0 ps-0 py-2 shadow-sm fw-medium text-dark" wire:model.live="profesorSeleccionado">
                            <option value="">-- Selecciona un docente --</option>
                            @foreach($profesores as $profe)
                                <option value="{{ $profe->id }}">{{ $profe->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($profesorSeleccionado)
        <div class="row g-4 animate__animated animate__fadeIn">

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 h-100 bg-dark text-white p-4 d-flex flex-column justify-content-center text-center position-relative overflow-hidden" style="min-height: 250px;">
                    <div class="position-absolute text-secondary opacity-10" style="right: -20px; bottom: -20px; font-size: 8rem;">
                        <i class="bi bi-award"></i>
                    </div>

                    <h6 class="text-uppercase tracking-wider opacity-75 small fw-bold mb-2 text-info">Puntaje General</h6>
                    <h1 class="display-1 fw-bold mb-2">
                        {{ number_format($promedioGeneral, 1) }}
                    </h1>

                    <div class="mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star-fill {{ $i <= round($promedioGeneral) ? 'text-warning' : 'text-secondary opacity-20' }} fs-4 mx-1"></i>
                        @endfor
                    </div>

                    <p class="small mb-0 text-muted">
                        Basado en un total de <span class="text-white fw-bold">{{ $totalEvaluaciones }}</span> respuestas registradas.
                    </p>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm border-0 h-100 p-4">
                    <h6 class="fw-bold text-dark mb-4 text-uppercase small text-secondary d-flex align-items-center">
                        <i class="bi bi-grid-3x3-gap text-primary me-2"></i>Desglose Analítico por Dimensión
                    </h6>

                    @forelse($estadisticas as $stat)
                        @php
                            // Convertir el score (escala 1-5) a porcentaje matemático para la barra de Bootstrap
                            $porcentajeBarra = ($stat->promedio / 5) * 100;

                            // Semáforo de colores inteligente según el promedio obtenido
                            if ($stat->promedio >= 4.0) {
                                $colorBarra = 'bg-success';
                            } elseif ($stat->promedio >= 3.0) {
                                $colorBarra = 'bg-warning text-dark';
                            } else {
                                $colorBarra = 'bg-danger';
                            }
                        @endphp

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-semibold text-dark text-capitalize small">
                                    {{ $stat->category }}
                                </span>
                                <span class="badge bg-light text-dark border fw-bold shadow-sm">
                                    {{ number_format($stat->promedio, 2) }} / 5.00
                                </span>
                            </div>

                            <div class="progress rounded-pill shadow-sm" style="height: 12px; background-color: #f0f2f5;">
                                <div class="progress-bar {{ $colorBarra }} progress-bar-striped progress-bar-animated"
                                     role="progressbar"
                                     style="width: {{ $porcentajeBarra }}%; transition: width 0.6s ease;"
                                     aria-valuenow="{{ $stat->promedio }}"
                                     aria-valuemin="1"
                                     aria-valuemax="5">
                                </div>
                            </div>
                            <div class="text-end mt-1">
                                <small class="text-muted" style="font-size: 0.75rem;">
                                    {{ $stat->total_preguntas }} respuestas en esta área
                                </small>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 my-auto text-muted">
                            <i class="bi bi-clipboard-x display-5 d-block mb-2 text-warning opacity-75"></i>
                            <h6 class="fw-bold text-dark">Sin datos disponibles</h6>
                            <p class="small mb-0 px-4">Este docente no cuenta con registros de respuestas en la tabla de evaluaciones actuales.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    @else
        <div class="card shadow-sm border-0 py-5 text-center text-muted bg-white">
            <div class="card-body py-4">
                <i class="bi bi-graph-up-arrow display-4 d-block mb-3 text-secondary opacity-25"></i>
                <h6 class="fw-semibold text-secondary">Panel de control en espera</h6>
                <p class="small mb-0 text-muted px-5">Por favor, selecciona un profesor del menú desplegable para procesar las métricas de rendimiento académico.</p>
            </div>
        </div>
    @endif
</div>
