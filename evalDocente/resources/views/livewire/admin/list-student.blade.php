{{-- <div class="container py-4">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                Lista de Alumnos
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
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Semestre</th>
                        <th>Grupo</th>
                        <th>Matricula</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->id }}</td>

                            <td>{{ $alumno->username }}</td>

                            <td>{{ $alumno->email }}</td>

                            <td>{{ $alumno->semester_id }}</td>

                            <td>{{ $alumno->group_id }}</td>

                            <td>{{ $alumno->matricula }}</td>


                            <td>
                                <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="edit({{ $alumno->id }})"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <button
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $alumno->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar este alumno?') || event.stopImmediatePropagation()"
                                >
                                  <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                No hay alumnos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="mt-3">
                {{ $alumnos->links() }}
            </div>

        </div>
    </div>
</div> --}}


{{-- --------------------------------------------------------------- --}}
<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-link-45deg text-primary me-2"></i>Lista de Akumnos
            </h5>
            <a href="{{ route('nuevo-alumno') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nuevo Alumno
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
                            placeholder="Buscar por alumno..."
                            wire:model.live="search"
                        >
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light text-secondary small text-uppercase">
                        <tr>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Semestre</th>
                                <th>Grupo</th>
                                <th>Matricula</th>
                                <th width="120">Acciones</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alumnos as $alumno)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $alumno->id ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $alumno->username ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $alumno->email ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $alumno->semester->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $alumno->group->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $alumno->matricula ?? 'N/A' }}
                                    </span>
                                </td>

                                <td class="text-center">

                                <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="edit({{ $alumno->id }})"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <button
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $alumno->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar este alumno?') || event.stopImmediatePropagation()"
                                >
                                  <i class="bi bi-trash-fill"></i>
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
                {{ $alumnos->links() }}
            </div>
        </div>
    </div>


</div>
