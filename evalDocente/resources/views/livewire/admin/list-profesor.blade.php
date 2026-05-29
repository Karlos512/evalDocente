{{-- <div class="container py-4">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                Lista de Profesores
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
                        <th>Profesor</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($profesores as $p)
                        <tr>
                            <td>{{ $p->id }}</td>

                            <td>{{ $p->name }}</td>

                            <td>
                                <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="editarProfesor({{ $p->id }})"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <button
                                    class="btn btn-warning btn-sm"
                                    title="Suspender profesor"
                                    wire:click="suspender({{ $p->id }})"
                                    onclick="confirm('¿Seguro que deseas suspender este profesor?') || event.stopImmediatePropagation()"
                                >
                                    <i class="bi bi-person-x-fill"></i>
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
                {{ $profesores->links() }}
            </div>

        </div>
    </div>
</div> --}}


<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-link-45deg text-primary me-2"></i>Lista de Profesores
            </h5>

            {{--  --}}
            <div class="d-inline-block">
                <input type="file" id="csvImportInput" wire:model="archivoCsv" accept=".csv" class="d-none">

                <button type="button" class="btn btn-success btn-sm shadow-sm" onclick="document.getElementById('csvImportInput').click()">
                    <i class="bi bi-file-earmark-spreadsheet-fill me-1"></i> Importar desde CSV
                </button>

                <span wire:loading wire:target="archivoCsv" class="text-success small ms-2">
                    <div class="spinner-border spinner-border-sm" role="status"></div> Procesando archivo...
                </span>
            </div>

            @if (session()->has('csv_success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('csv_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('csv_error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('csv_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{--  --}}

            <a href="{{ route('nuevo-profesor') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nuevo Profesor
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
                            placeholder="Buscar por profesor..."
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
                            <th>Profesor</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($profesores as $profesor)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $profesor->id ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $profesor->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="text-end">

                                    <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="editarProfesor({{ $profesor->id }})"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <button
                                    class="btn btn-warning btn-sm"
                                    title="Suspender profesor"
                                    wire:click="suspender({{ $profesor->id }})"
                                    onclick="confirm('¿Seguro que deseas suspender este profesor?') || event.stopImmediatePropagation()"
                                >
                                    <i class="bi bi-person-x-fill"></i>
                                </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x display-6 d-block mb-2"></i>
                                    No se encontraron profesores que coincidan con la búsqueda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $profesores->links() }}
            </div>
        </div>
    </div>


</div>

