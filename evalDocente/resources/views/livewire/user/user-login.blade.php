<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-login my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">
                       <strong>LOGIN</strong>
                    </h5>

                        <div class="form-floating mb-3">
                            <input type="text"  wire:model="usuario" class="form-control" id="floatingInput" placeholder="20152735" required>
                            <label for="floatingInput">Usuario / Matricula</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password"  wire:model="password" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
                            <label for="floatingPassword">Contraseña</label>
                        </div>

                        <div class="form-check mb-3">
                            
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold"  wire:click="submitForm" type="submit">
                                Entrar
                            </button>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
