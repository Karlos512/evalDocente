
            {{-- <div class="card text-center">

                <div class="card-header text-center">
                    <span>{{ $categoria }}</span>
                </div>
                <div class="card-body">
                    <h6 class="card-title">
                        <strong>Profesor:</strong> Pedro Rojas Guzman
                        <strong>Materia:</strong> Matematicas Aplicadas
                    </h6>
                  <p class="card-text">{{ $pregunta }} </p>

                  <div class="options">
                    @livewireScripts
                    <img src="{{asset('images/emojis/c1.png')}}" alt="Totalmente En Desacuerdo" class="btn-option" wire:click="saveScore(1,1,1)">
                    <img src="{{asset('images/emojis/c2.png')}}" alt="En desacuerdo" class="btn-option" wire:click="saveScore(1,1,2)">
                    <img src="{{asset('images/emojis/c3.png')}}" alt="Indiferente" class="btn-option" wire:click="saveScore(1,1,3)">
                    <img src="{{asset('images/emojis/c4.png')}}" alt="De acuerdo" class="btn-option" wire:click="saveScore(1,1,4)">
                    <img src="{{asset('images/emojis/c5.png')}}" alt="Totalmente de AcuerdoS" class="btn-option" wire:click="saveScore(1,1,5)">
                  </div>


                </div>
                <div class="card-footer text-muted text-xs">
                    <span>{{ $position }}/{{ $size }}</span>
                </div>
              </div> --}}

              <div class="card shadow-sm text-center">
                <div class="card-header bg-white py-3">
                    <span class="text-muted small text-uppercase fw-bold">Nivel de Enseñanza</span>
                </div>

                <div class="card-body p-5">
                    <!-- Datos dinámicos del profesor y materia -->
                    <h5 class="fw-bold mb-1">
                        Profesor: <span class="text-primary">{{ $asignaciones[$indiceAsignacion]->profesor->name }}</span>
                        Materia: <span class="text-secondary">{{ $asignaciones[$indiceAsignacion]->materia->name }}</span>
                    </h5>

                    <!-- Pregunta actual -->
                    {{-- <p class="fs-5 mt-4">
                        {{ $indicePregunta + 1 }}.- {{ $preguntas[$indicePregunta]->texto }}
                    </p> --}}

                    <p class="fs-5 mt-4">
                        {{ $indicePregunta + 1 }}.- {{ $preguntas[$indicePregunta]->question_text }}
                    </p>

                    <!-- Emojis con interacción Livewire -->
                    {{-- <div class="d-flex justify-content-center gap-4 mt-5">
                        <button wire:click="guardarRespuesta(1)" class="btn-emoji"><img src="emoji1.png" width="50"></button>
                        <button wire:click="guardarRespuesta(2)" class="btn-emoji"><img src="emoji2.png" width="50"></button>
                        <button wire:click="guardarRespuesta(3)" class="btn-emoji"><img src="emoji3.png" width="50"></button>
                        <button wire:click="guardarRespuesta(4)" class="btn-emoji"><img src="emoji4.png" width="50"></button>
                        <button wire:click="guardarRespuesta(5)" class="btn-emoji"><img src="emoji5.png" width="50"></button>
                    </div> --}}

                    <div class="options">
                        @livewireScripts
                        <img src="{{asset('images/emojis/c1.png')}}" alt="Totalmente En Desacuerdo" class="btn-option" wire:click="guardarRespuesta(1)">
                        <img src="{{asset('images/emojis/c2.png')}}" alt="En desacuerdo" class="btn-option" wire:click="guardarRespuesta(1)">
                        <img src="{{asset('images/emojis/c3.png')}}" alt="Indiferente" class="btn-option" wire:click="guardarRespuesta(1)">
                        <img src="{{asset('images/emojis/c4.png')}}" alt="De acuerdo" class="btn-option" wire:click="guardarRespuesta(1)">
                        <img src="{{asset('images/emojis/c5.png')}}" alt="Totalmente de AcuerdoS" class="btn-option" wire:click="guardarRespuesta(1)">
                      </div>
                </div>

                <div class="card-footer bg-light text-muted small">
                    Pregunta {{ $indicePregunta + 1 }} de {{ count($preguntas) }}
                    (Evaluando {{ $indiceAsignacion + 1 }} de {{ count($asignaciones) }} profesores)
                </div>
            </div>

