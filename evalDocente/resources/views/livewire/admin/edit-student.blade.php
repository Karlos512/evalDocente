<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                Editar Alumno
            </h5>
        </div>

        <div class="card-body">

            <form wire:submit.prevent="update">

                <div class="mb-3">
                    <label>Nombre</label>

                    <input
                        type="text"
                        class="form-control"
                        wire:model="username"
                    >

                    @error('username')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>

                    <input
                        type="email"
                        class="form-control"
                        wire:model="email"
                    >
                </div>

                <div class="mb-3">
                    <label>Matrícula</label>

                    <input
                        type="text"
                        class="form-control"
                        wire:model="matricula"
                    >
                </div>

                <button class="btn btn-success">
                    <i class="bi bi-save-fill"></i>
                    Guardar
                </button>

            </form>

        </div>
    </div>
</div>