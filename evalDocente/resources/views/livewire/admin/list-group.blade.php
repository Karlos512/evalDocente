<div class="container py-4">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                Lista de Grupos
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
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $g->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar esta materia?') || event.stopImmediatePropagation()"
                                >
                                    Eliminar
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
</div>
