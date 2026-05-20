<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                Editar Pregunta
            </h5>
        </div>

        <div class="card-body">

            <form wire:submit.prevent="update">

                <div class="mb-3">
                    <label>Pregunta</label>

                    <input
                        type="text"
                        class="form-control"
                        wire:model="question_text"
                    >

                    @error('question_text')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Categoria</label>
                    <select class="form-select" wire:model="categoria">
                    <option value="" selected disabled>Selecciona categoria...</option>
                        @foreach($categorias as $c)
                            <option value="{{ $c }}">{{ $c }}</option>
                        @endforeach
                        </select>
                        @error('categoria') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-success">
                    <i class="bi bi-save-fill"></i>
                    Guardar
                </button>

            </form>

        </div>
    </div>
</div>