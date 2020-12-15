<div class="row">
    <div class="col s8">
        <table>
            <thead>
                <tr>
                    <th>Fecha vencimiento</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Prioridad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data["listaTareas"] as $tarea){ ?>
                <tr>
                    <td><?= $tarea->getFechaVencimiento() ?></td>
                    <td><?= $tarea->getDescripcion() ?></td>
                    <td><?= $tarea->getEstado() ?></td>
                    <td><?= $tarea->getPrioridad() ?></td>
                    <td>
                        <div class="row">
                            <form class="push-s1" action="<?= getUrlControllerMethod("Tarea","editar") ?>" method="post">
                                <button class="btn waves-effect waves-light green accent-4">Editar</button>
                                <input type="hidden" name="idActualizar" value="<?= $tarea->getId() ?>">
                            </form>
                            <form style="padding-left: 10px;" action="<?= getUrlControllerMethod("Tarea","eliminar") ?>" method="post">
                                <input type="hidden" name="id" value="<?= $tarea->getId() ?>">
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
<a class="waves-effect waves-light btn" href="<?= getUrlControllerMethod("Tarea","registro") ?>"><i class="material-icons left">cloud</i>Nuevo</a>