{{-- <div class="container py-4">
    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                Lista de Preguntas
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
                        <th>Pregunta</th>
                        <th>Categoria</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($preguntas as $pregunta)
                        <tr>
                            <td>{{ $pregunta->id }}</td>

                            <td>{{ $pregunta->question_text }}</td>

                            <td>{{ $pregunta->category }}</td>


                            <td>
                                <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="editQuestion({{ $pregunta->id }})"
                                >
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <button
                                    class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $pregunta->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar esta pregunta?') || event.stopImmediatePropagation()"
                                >
                                  <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                No hay preguntas registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="mt-3">
                {{ $preguntas->links() }}
            </div>

        </div>
    </div>
</div>
 --}}


{{-- --------------------------------------------------------------- --}}
<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 text-dark">
                <i class="bi bi-link-45deg text-primary me-2"></i>Lista de Preguntas
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

            <a href="{{ route('nueva-pregunta') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nuevo Pregunta
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
                            placeholder="Buscar por pregunta o categoria..."
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
                                <tr>
                                    <th>ID</th>
                                    <th>Pregunta</th>
                                    <th>Categoria</th>
                                    <th width="120">Acciones</th>
                                </tr>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($preguntas as $pregunta)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $pregunta->id ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $pregunta->question_text ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-center">
                                        {{ $pregunta->category ?? 'N/A' }}
                                    </span>
                                </td>

                                <td class="text-center">

                                    <button
                                    class="btn btn-primary btn-sm me-1"
                                    wire:click="editQuestion({{ $pregunta->id }})"
                                    >
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>

                                    <button
                                        class="btn btn-danger btn-sm"
                                        wire:click="delete({{ $pregunta->id }})"
                                        onclick="confirm('¿Seguro que deseas eliminar esta pregunta?') || event.stopImmediatePropagation()"
                                    >
                                    <i class="bi bi-trash-fill"></i>
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x display-6 d-block mb-2"></i>
                                    No se encontraron preguntas que coincidan con la búsqueda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $preguntas->links() }}
            </div>
        </div>
    </div>


</div>
