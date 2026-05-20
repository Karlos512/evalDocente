{{-- <div class="container py-4">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                Lista de Materias
            </h5>
        </div>

        <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Materia</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($materias as $materia)
                        <tr>
                            <td>{{ $materia->id }}</td>

                            <td>{{ $materia->name }}</td>

                            <td>
                                <button
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $materia->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar esta materia?') || event.stopImmediatePropagation()"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                No hay materias registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="mt-3">
                {{ $materias->links() }}
            </div>

        </div>
    </div>
</div> --}}


<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-link-45deg text-primary me-2"></i>Lista de Materias
            </h5>
            <a href="{{ route('nueva-materia') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nueva Materia
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
                            placeholder="Buscar por materia..."
                            wire:model.live="search"
                        >
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light text-secondary small text-uppercase">
                        <tr>
                            <th>ID</th>
                            <th>Materia</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($materias as $materia)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $materia->id ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $materia->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="text-center">

                                <button
                                        wire:click="delete({{ $materia->id }})"
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
                                    No se encontraron materias que coincidan con la búsqueda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $materias->links() }}
            </div>
        </div>
    </div>


</div>
