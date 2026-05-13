<div class="container py-4">
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
</div>