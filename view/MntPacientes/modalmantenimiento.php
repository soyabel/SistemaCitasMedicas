<div class="modal fade" id="modalmantenimiento" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="usuario_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Editar Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="paciente_id" name="paciente_id">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required/>
                        </div>
                        <div class="col mb-0">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" required/>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" id="correo" name="correo" class="form-control" required/>
                        </div>
                        <div class="col mb-0">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>