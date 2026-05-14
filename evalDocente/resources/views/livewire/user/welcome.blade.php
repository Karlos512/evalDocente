<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card welcome-card">
                <div class="header-accent"></div>
                <div class="card-body p-5 text-rigth">

                    <div class="icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3z"/>
                        </svg>
                    </div>

                    <center><h1 class="h3 mb-3 fw-bold">¡Bienvenido a tu espacio de transformación académica!</h1></center>
                    <p class="text-muted mb-4">
                       <strong>{{ auth()->user()->username }}. </strong><br>
                        Es un verdadero gusto saludarte y darte la bienvenida al proceso de Evaluación Docente, un pilar fundamental para potenciar la excelencia de nuestra comunidad. Este no es solo un formulario; es una herramienta poderosa para construir activamente el futuro de nuestra educación y elevar juntos nuestros estándares de enseñanza en la UMA.
                    </p>

                    <div class="text-start bg-light p-4 rounded-3 mb-4">
                        <h6 class="fw-bold mb-3">Instrucciones:</h6>
                        <ul class="medium text-secondary mb-0">
                            <li>Periodo de Evaluación: SEDU_(Enero/Junio Periodo 2_2026)</li>
                            <li>{{ auth()->user()->semester->name }}</li>
                            {{-- <li>La evaluación consta de <strong>15 preguntas</strong>.</li> --}}
                            <li>Cada pregunta mostrara una serie de emojis respresentando <strong>"Totalmente en desacuerdo, En desacuerdo, Indiferente, De acuerdo, Totalmente de acuerdo"</strong> respectivamente de izquierda a derecha, al pulsar tu respuesta pasara en automatico a la siguiente pregunta.</li>
                            <li><strong>Dedicación:</strong> Se estima un tiempo aproximado de <strong>30 minutos</strong> para completar la Evaluación Docente.</li>
                            <li><strong>Continuidad:</strong> Es fundamental finalizar el proceso en su totalidad. Si necesitas una pausa, el sistema guardará tu progreso automáticamente; no obstante, la evaluación solo se considerará válida una vez enviada formalmente.</li>
                            <li><strong>Confidencialidad:</strong> Tu participación es estrictamente anónima. Los resultados se compartirán con el cuerpo docente exclusivamente tras el cierre del periodo de evaluación, garantizando la transparencia del proceso.</li>
                        </ul>
                    </div>

                    <div class="d-grid gap-2 text-xs">
                        <span>
                            <strong>Nota:</strong> Te solicitamos leer con detenimiento cada enunciado y seleccionar la opción que proyecte con mayor fidelidad el desempeño de tus profesores.
                        </span>
                    </div>

                    {{-- --------------- inicio ---------------------------}}

                    <div class="p-4 rounded-3 mb-4 border" style="background-color: #f8fafc;">
                        <h6 class="fw-bold mb-3"><i class="bi bi-shield-check me-2 text-primary"></i>Consentimiento Legal</h6>

                        <div class="form-check mb-2">
                            <input class="form-check-input shadow-sm" type="checkbox" id="terms" wire:model.live="aceptaTerminos">
                            <label class="form-check-label small text-secondary" for="terms">
                                He leído y acepto los <a href="#" class="text-decoration-none fw-bold">Términos y Condiciones</a> de uso del sistema.
                            </label>
                        </div>

                        <div class="form-check mb-0">
                            <input class="form-check-input shadow-sm" type="checkbox" id="privacy" wire:model.live="aceptaPrivacidad">
                            <label class="form-check-label small text-secondary" for="privacy">
                                Acepto el <a href="#" class="text-decoration-none fw-bold">Aviso de Privacidad</a> para el manejo de mis datos académicos.
                            </label>
                        </div>
                    </div>

                    <!-- Botón de Acción -->
                    <div class="d-grid gap-2">
                        <button
                            wire:click="comenzar"
                            class="btn btn-primary btn-lg shadow-sm {{ (!$aceptaTerminos || !$aceptaPrivacidad) ? 'disabled' : '' }}"
                            {{ (!$aceptaTerminos || !$aceptaPrivacidad) ? 'disabled' : '' }}>
                            <i class="bi bi-play-fill me-1"></i> Comenzar Evaluación
                        </button>
                        <small class="text-center text-muted mt-2" style="font-size: 0.75rem;">
                            Es obligatorio aceptar ambos campos para continuar.
                        </small>
                    </div>

                    {{-- --------------- fin ------------------------------}}

                    {{-- <div class="d-grid gap-2">
                        <a href="/" class="btn btn-link btn-sm text-decoration-none">Acepto Aviso de Privacidad</a>
                        <a href="{{ route('evaluacion') }}" class="btn btn-primary btn-lg shadow-sm">
                            Comenzar Evaluación
                        </a>
                    </div> --}}

                </div>
                <div class="card-footer bg-white border-0 py-3 text-center">
                    {{-- <small class="text-muted">ID de Sesión: {{ session()->getId() }}</small> --}}
                </div>
            </div>
        </div>
    </div>
</div>
