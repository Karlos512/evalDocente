<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Registrar Nuevo Alumno</h5>
                </div>
                <div class="card-body p-4">

                    <form wire:submit="saveStudent">

                        <div class="row">
                            <!-- Nombre Completo -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Nombre Completo</label>
                                <input type="text" wire:model="name" class="form-control" placeholder="Ej. Juan Pérez García">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Correo Electrónico -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Correo Institucional</label>
                                <input type="email" wire:model="email" class="form-control" placeholder="usuario@escuela.edu">
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Contraseña Temporal</label>
                                <input type="password" wire:model="password" class="form-control" placeholder="Mínimo 8 caracteres">
                                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Selección de Semestre -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Semestre</label>
                                <select class="form-select" wire:model="semestre">
                                    <option value="" selected disabled>Selecciona semestre...</option>
                                    @foreach($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                                @error('semestre') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Selección de Grupo -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Grupo</label>
                                <select class="form-select" wire:model="grupo">
                                    <option value="" selected disabled>Selecciona grupo...</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @error('grupo') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                            <!-- Botón con estado de carga automático de Livewire 3 -->
                            <button type="submit" class="btn btn-primary px-5">
                                <span wire:loading.remove>Guardar Alumno</span>
                                <span wire:loading>Procesando...</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
