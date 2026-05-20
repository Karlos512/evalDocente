{{-- <div class="container py-4">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-link-45deg text-primary me-2"></i>Lista de Grupos
            </h5>
            <a href="{{ route('nuevo-grupo') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nueva Grupo
            </a>
        </div>
{{-
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                Lista de Grupos
            </h5> -}}
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
                        <th>Grupo</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($grupos as $g)
                        <tr>
                            <td>{{ $g->id }}</td>

                            <td>{{ $g->name }}</td>

                            <td>
                               <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="editGroup({{ $g->id }})"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <button
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $g->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar este grupo?') || event.stopImmediatePropagation()"
                                >
                                  <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                No hay grupos registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="mt-3">
                {{ $grupos->links() }}
            </div>

        </div>
    </div>
</div> --}}

<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-link-45deg text-primary me-2"></i>Lista de Grupos
            </h5>
            <a href="{{ route('nuevo-grupo') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nuevo Grupo
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
                            placeholder="Buscar por grupo..."
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
                            <th>Grupo</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($grupos as $grupo)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $grupo->id ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-1">
                                        {{ $grupo->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="text-end">

                                    <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="editGroup({{ $grupo->id }})"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                    <button
                                        wire:click="delete({{ $grupo->id }})"
                                        wire:confirm="¿Estás seguro de que deseas eliminar este grupo?"
                                        class="btn btn-outline-danger btn-sm rounded-circle"
                                        title="Eliminar Grupo"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x display-6 d-block mb-2"></i>
                                    No se encontraron grupos que coincidan con la búsqueda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $grupos->links() }}
            </div>
        </div>
    </div>


</div>

