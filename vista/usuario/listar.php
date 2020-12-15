<div class="row">
    <div class="col s8">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Identificacion</th>
                    <th>Correo</th>
                    <th>Clave</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data["usuarios"] as $usuario){ ?>
                <tr>
                    <td><?= $usuario->getId() ?></td>
                    <td><?= $usuario->getNombre() ?></td>
                    <td><?= $usuario->getApellido() ?></td>
                    <td><?= $usuario->getIdentificacion() ?></td>
                    <td><?= $usuario->getCorreo() ?></td>
                    <td><?= $usuario->getClave() ?></td>
                    <td>
                        <div class="row">
                            <form class="push-s1" action="<?= getUrlControllerMethod("Usuario","editar") ?>" method="post">
                                <button class="btn waves-effect waves-light green accent-4">Editar</button>
                                <input type="hidden" name="idActualizar" value="<?= $usuario->getId() ?>">
                            </form>
                            <form style="padding-left: 10px;" action="<?= getUrlControllerMethod("Usuario","eliminar") ?>" method="post">
                                <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                                <button type="submit" class="btn waves-effect waves-light red darken-3">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
<div class="col s12">
<a class="waves-effect  blue darken-3 btn-large" href="<?= getUrlControllerMethod("Usuario","registro") ?>">Nuevo</a>
</div>
</div>