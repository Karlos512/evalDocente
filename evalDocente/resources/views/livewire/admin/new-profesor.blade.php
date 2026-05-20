<div class="container py-4">
    <div class="mb-3">
        <a href="{{ route('lista-profesores') }}" class="btn btn-link link-secondary text-decoration-none p-0" wire:navigate>
            <i class="bi bi-arrow-left me-1"></i> Volver al listado
        </a>
    </div>

    <div class="card shadow-sm border-0" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header bg-white py-3 border-bottom-0">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-person-plus text-primary me-2"></i>Registrar Nuevo Profesor
            </h5>
        </div>

        <div class="card-body p-4">
            <form wire:submit.prevent="guardar">

                <div class="mb-4">
                    <label for="name" class="form-label small fw-bold text-secondary text-uppercase">Nombre Completo del Docente</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-person"></i>
                        </span>
                        <input
                            type="text"
                            id="name"
                            class="form-control bg-light border-start-0 ps-0 @error('name') is-invalid @enderror"
                            placeholder="Ej. Dr. Pedro Rojas Guzman"
                            wire:model="name"
                        >
                        @error('name')
                            <div class="invalid-feedback ps-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold text-secondary text-uppercase d-block">Estado Inicial</label>
                    <div class="form-check form-switch mt-2">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            role="switch"
                            id="is_active"
                            wire:model="is_active"
                            true-value="1"
                            false-value="0"
                        >
                        <label class="form-check-label small text-muted" for="is_active">
                            Permitir que este profesor sea asignado a materias inmediatamente
                        </label>
                    </div>
                </div>

                <hr class="my-4" style="opacity: 0.1;">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('lista-profesores') }}" class="btn btn-light px-4" wire:navigate>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="bi bi-save me-1"></i> Guardar Profesor
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
