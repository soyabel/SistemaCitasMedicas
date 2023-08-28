
<div class="modal fade" id="modalmantenimiento" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="usuario_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Nueva Especialidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">                       
                        <div class="col mb-0">
                            <label for="nombre" class="form-label">Especialidad</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required/>
                        </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" required/>
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