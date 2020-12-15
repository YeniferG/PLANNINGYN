<div class="row">
    <div class="col s12">
        <h5>Registrar Usuario</h5>
    </div>
</div>
<form action="<?= getUrlControllerMethod("Usuario","registrar") ?>" method="POST" class="col s12">
    <div class="row">
        <div class="input-field col s6">
            <input required name="nombre" id="nombre" type="text" class="validate">
            <label for="nombre">Nombres</label>
        </div>
        <div class="input-field col s6">
            <input required name="apellidos" id="apellidos" type="text" class="validate">
            <label for="apellidos">Apellidos</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input required name="identificacion" id="identificacion" type="text" class="validate">
            <label for="identificacion">Identificacion</label>
        </div>
        <div class="input-field col s6">
                <input required name="correo" id="correo" type="text" class="validate">
                <label for="correo">Correo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input required name="clave" id="clave" type="text" class="validate">
            <label for="clave">Clave</label>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <input class="btn waves-effect waves-light" type="submit" value="Registrar">
        </div>
    </div>
</form>