<div class="container py-4">
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
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $p->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar este profesor?') || event.stopImmediatePropagation()"
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
                {{ $profesores->links() }}
            </div>

        </div>
    </div>
</div>
