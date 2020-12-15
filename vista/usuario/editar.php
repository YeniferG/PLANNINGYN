<div class="row">
    <div class="col s12">
        <h5>Editar Usuario</h5>
    </div>
</div>
<form action="<?= getUrlControllerMethod("Usuario","actualizar") ?>" method="POST" class="col s12">
    <input type="hidden" name="idUsuarioActualizar" value="<?= $data["usuario"]->getId() ?>">
    <div class="row">
        <div class="input-field col s6">
            <input required name="nombre" value="<?= $data["usuario"]->getNombre() ?>" id="nombre" type="text" class="validate">
            <label for="nombre">Nombres</label>
        </div>
        <div class="input-field col s6">
            <input required name="apellidos" value="<?= $data["usuario"]->getApellido() ?>" id="apellidos" type="text" class="validate">
            <label for="apellidos">Apellidos</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input required name="identificacion" value="<?= $data["usuario"]->getIdentificacion() ?>" id="identificacion" type="text" class="validate">
            <label for="identificacion">Identificacion</label>
        </div>
        <div class="input-field col s6">
                <input required name="correo" value="<?= $data["usuario"]->getCorreo() ?>" id="correo" type="text" class="validate">
                <label for="correo">Correo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input required name="clave" value="<?= $data["usuario"]->getClave() ?>" id="clave" type="text" class="validate">
            <label for="clave">Clave</label>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <input  class="btn waves-effect waves-light" type="submit" value="Actualizar">
        </div>
    </div>
</form>