<div class="row">
    <div class="col s12">
        <h5>Registrar tarea</h5>
    </div>
</div>
<form action="<?= getUrlControllerMethod("Tarea","registrar") ?>" method="POST" class="col s12">
    <div class="row">
        <div class="input-field col s6">
            <input required name="fecha_vencimiento" id="fecha_vencimiento" type="text" class="validate">
            <label for="fecha_vencimiento">Fecha Vencimiento</label>
        </div>
        <div class="input-field col s6">
            <input required name="descripcion" id="descripcion" type="text" class="validate">
            <label for="descripcion">Descripcion</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <select name="estado">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="pausa">En Pausa</option>
                <option value="proceso">En Proceso</option>
                <option value="finalizado">Finalizado</option>
            </select>
            <label>Estado</label>
        </div>
        <div class="input-field col s6">
            <select name="prioridad">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="baja">Baja</option>
                <option value="media">Media</option>
                <option value="alta">Alta</option>
            </select>
            <label>Prioridad</label>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <input class="btn waves-effect waves-light" type="submit" value="Registrar">
        </div>
    </div>
</form>