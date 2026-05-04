{{-- <div>

</div> --}}

            <div class="card text-center">

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
                  {{-- Selecciona la opcion que mas se adecue a tu opinion, se maneja una puntuación de 1 a 5, siendo 1 la calificación mas baja y 5 la mas alta, de izquierda a derecha --}}
                </div>
              </div>


        {{-- </div>
    </main> --}}
