<?php
require_once("../../config/conexion.php");
require_once("../../models/Especialidad.php");
$especialidad = new Especialidad();
$datos = $especialidad->get_especialidad();
?>
<!-- Large Modal -->
<div class="modal fade" id="modalmantenimiento" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Cita Médica</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
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
                            <label for="celular" class="form-label">Celular/WhatsApp</label>
                            <input type="text" id="celular" name="celular" class="form-control" required/>
                        </div>
                    </div>
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
                        <div class="col mb-0">
                            <label for="fechacita" class="form-label">Fecha de la Cita</label>
                            <input type="datetime-local" class="form-control" id="fechacita" name="fechacita"  required>
                        </div>
                    </div>
                </div>
            

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-primary" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Extra Large Modal -->