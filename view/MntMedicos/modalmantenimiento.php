<?php
require_once("../../config/conexion.php");
require_once("../../models/Especialidad.php");
$especialidad = new Especialidad();
$datos = $especialidad->get_especialidad();
?>

<div class="modal fade" id="modalmantenimiento" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="usuario_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdltitulo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="medico_id" name="medico_id">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required />
                        </div>
                        <div class="col mb-0">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" required />
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="especialidad" class="form-label">Especialidad</label>
                                <select class="form-select" id="especialidad" name="especialidad" aria-label="Default select example" required>
                                    <option selected="">Especialidad</option>
                                    <?php foreach ($datos as $especialidad) { ?>
                                        <option value="<?php echo $especialidad['nombre']; ?>"><?php echo $especialidad['nombre']; ?></option>
                                    <?php }; ?>

                                </select>
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