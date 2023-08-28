<?php
require_once("../../config/conexion.php");
require_once("../../models/Especialidad.php");
$especialidad = new Especialidad();
$datos = $especialidad->get_especialidad();
?>

<div class="modal fade" id="modalmantenimientoeditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="editar_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Editar Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="cita_id" name="cita_id">
                    <div class="row g-2">
                        <div class="col mb-0">
                        <label for="especialidad" class="form-label">Especialidad</label>
                            <select class="form-select" id="especialidad" name="especialidad" aria-label="Default select example" required>
                                <option selected="">Especialidad</option>    
                                    <?php foreach ($datos as $especialidad){?>
                                        <option value="<?php echo $especialidad['nombre']; ?>"><?php echo $especialidad['nombre']; ?></option>
                                    <?php } ; ?>     
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="estadocita" class="form-label">Estado de la cita</label>
                            <select class="form-select" id="estadocita" name="estadocita" aria-label="Default select example" required>
                                <option selected="">Estado</option>                               
                                <option value="1">Cancelo</option>                               
                                <option value="0">No Cancelo</option>                               
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="fechacita" class="form-label">Fecha de la Cita</label>
                            <input type="datetime-local" class="form-control" id="fechacita" name="fechacita" required>
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