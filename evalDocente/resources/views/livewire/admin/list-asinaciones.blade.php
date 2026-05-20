<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-link-45deg text-primary me-2"></i>Control de Asignaciones
            </h5>
            <a href="{{ route('asignar') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nueva Asignación
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6 col-lg-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted">
                            <i class="bi bi-search"></i>
                        </span>
                        <input
                            type="text"
                            class="form-control bg-light border-start-0 ps-0"
                            placeholder="Buscar por profesor o materia..."
                            wire:model.live="search"
                        >
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light text-secondary small text-uppercase">
                        <tr>
                            <th>Profesor</th>
                            <th>Materia</th>
                            <th class="text-center">Semestre</th>
                            <th class="text-center">Grupo</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($asignaciones as $asignacion)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $asignacion->profesor->name ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-1">
                                        {{ $asignacion->materia->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    {{ $asignacion->semester->name ?? 'N/A' }}
                                </td>
                                <td class="text-center text-uppercase fw-semibold text-muted">
                                    {{ $asignacion->group->name ?? 'N/A' }}
                                </td>
                                <td class="text-end">
                                    <button
                                        wire:click="deleteAssignment({{ $asignacion->id }})"
                                        wire:confirm="¿Estás seguro de que deseas eliminar esta asignación?"
                                        class="btn btn-outline-danger btn-sm rounded-circle"
                                        title="Eliminar Asignación"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x display-6 d-block mb-2"></i>
                                    No se encontraron asignaciones que coincidan con la búsqueda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $asignaciones->links() }}
            </div>
        </div>
    </div>


</div>

