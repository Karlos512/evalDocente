<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Registrar Nueva Materia</h5>
                </div>
                <div class="card-body p-4">

                    <form wire:submit="saveMateria">

                        <div class="row">
                            <!-- MATERIA -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Nombre Materia</label>
                                <input type="text" wire:model="name" class="form-control" placeholder="Fisica">   <!--cambuiar variañe-->
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div> 

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <span wire:loading.remove>Guardar Materia</span>
                                <span wire:loading>Procesando...</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
