<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white p-3">
            <h5 class="mb-0"><i class="bi bi-link-45deg me-2"></i>Nueva Asignación Académica</h5>
        </div>
        <div class="card-body p-4">
            <form wire:submit="save">
                <div class="row g-4">
                    <!-- Bloque: Quién enseña -->
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light">
                            <label class="form-label fw-bold text-primary"><i class="bi bi-person-badge me-1"></i> Profesor</label>
                            <select wire:model="teacher_id" class="form-select @error('teacher_id') is-invalid @enderror">
                                <option value="">Seleccionar profesor...</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Bloque: Qué enseña -->
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light">
                            <label class="form-label fw-bold text-primary"><i class="bi bi-book me-1"></i> Materia</label>
                            <select wire:model="subject_id" class="form-select @error('subject_id') is-invalid @enderror">
                                <option value="">Seleccionar materia...</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('subject_id') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Bloque: A quiénes (Ubicación) -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Semestre</label>
                        <select wire:model="semester_id" class="form-select @error('semester_id') is-invalid @enderror">
                            <option value="">Seleccionar semestre...</option>
                            @foreach($semesters as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                        @error('semester_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Grupo</label>
                        <select wire:model="group_id" class="form-select @error('group_id') is-invalid @enderror">
                            <option value="">Seleccionar grupo...</option>
                            @foreach($groups as $g)
                                <option value="{{ $g->id }}">{{ $g->name }}</option>
                            @endforeach
                        </select>
                        @error('group_id') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-between align-items-center">
                    {{-- <div class="text-muted small">
                        <i class="bi bi-info-circle"></i> Esta asignación permitirá que los alumnos del grupo seleccionado vean la evaluación de este profesor.
                    </div> --}}
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                            <span wire:loading.remove>Crear Vínculo</span>
                            <span wire:loading class="spinner-border spinner-border-sm"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
