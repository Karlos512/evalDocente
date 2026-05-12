<div class="container py-5">

    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Registrar Nueva Pregunta</h5>
                </div>
                <div class="card-body p-4">

                    <form wire:submit="saveQuestion">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Pregunta</label>
                                <input type="text" wire:model="name" class="form-control" placeholder="Escribe aqui la pregunta">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
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
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <span wire:loading.remove>Guardar Pregunta</span>
                                <span wire:loading>Procesando...</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
